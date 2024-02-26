<script setup>
import { useForm, Link, usePage, Head } from "@inertiajs/vue3";
import { Inertia } from "@inertiajs/inertia";
import { ref, computed } from 'vue';
import Layout from '../../Layouts/Main';
import Footer from '../../Layouts/Footer';
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';

const page = usePage();
const props = defineProps({
    client: {
        type: Object,
        default: () => ({}),
    },
    tabs: {
        type: Object,
        default: () => ({}),
    },
    data: {
        type: Object,
        default: () => ({}),
    },
    movement: {
        type: Object,
        default: () => ({}),
    },
    mcategory: {
        type: Object,
        default: () => ({}),
    },
});

//remove hours, minutes, and seconds
var format_bdate = props.client.birth_date.split(" ");
var format_sdate = props.client.start_date.split(" ");
var name = props.client.name;
var program = props.client.program;
const today_date = new Date().toISOString().slice(0,10);

// TAB Head Section
const tab = useForm({
    client_id: props.client.id,
    name: 'asd',
    date: today_date,
});
const submitTab = () => {
    tab.post(route("training.addTab"));
    toast.success('Tab added succesfully!');
    tab.reset();
    $('#myModalTab').modal('hide');
};

// NOTE Section
// Note button clicked -> save the tab id
const note = useForm({
    tab_notes: '',
    tab_id: '',
    tab_client_id: ''
});
const showNotes = (tab) => {
    $('#myModalNote').modal('show');

    note.tab_notes = tab.tab_notes;
    note.tab_id = tab.id;
    note.tab_client_id = tab.client_id;
};
const updateNotes = () => {
    note.post(route("training.updateNotes"));
    toast.success('Notes updated succesfully!');
    $('#myModalNote').modal('hide');
};

// MOVEMENT Section
const tab_name = ref("");
const mov = useForm({
    date: today_date,
    category: [],
    movement: '',
    status: '',
    sets: '',
    t: '',
    wt: '',
    rest: '',
    reps1: '',
    reps2: '',
    reps3: '',
    reps4: '',
    reps5: '',
    reps6: '',
    tab_id: '',
    tab_client_id: ''
});
const showMovement = (tab) => {
    tab_name.value = tab.tab_name;
    mov.tab_id = tab.id;
    mov.tab_client_id = tab.client_id;
    $('#movementModal').modal('show');
};
const submitMovement = () => {
    mov.post(route("training.addMovement"));
    toast.success('Daily movement added succesfully!');
    $('#movementModal').modal('hide');
};
const editMovement = (tab, x) => {
    tab_name.value = tab.tab_name;
    mov.tab_id = tab.id;
    mov.tab_client_id = tab.client_id;
    $('#movementModal').modal('show');
};
</script>
<script>
function FormatDate(myDate) {
    const weekday = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
    let date = myDate.getDate();
    let month = myDate.getMonth() + 1;
    let year = myDate.getFullYear();
    let day = myDate.getDay();

    return weekday[day] + ", " + date + "/" + month + "/" + year;
}

$(document).ready(function() {
    // Movement dropdown
    $("#mov_category").change(function() {
        // Selected country id
        var category_id = $(this).val();

        // Empty movement plan
        $('#mov_plan').find('option').remove()

        if(category_id != '') {
            // Fetch movement plan options
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            var ajaxurl = 'mov';
            $.ajax({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url : ajaxurl,
                type: 'POST',
                data: {categories:category_id},
                dataType: 'json',
                success:function(response) {
                    var len = response.length;
                    $("#mov_plan").append("<option value=''>Please choose</option");
                    for(var i=0; i<len; i++) {
                        var id = response[i]['id'];
                        var name = response[i]['name'];
                        $("#mov_plan").append("<option value='"+id+'-'+name+"'>"+name+"</option");
                    }
                }
            });
        }
    });

    // Switchery
    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
    $('.js-switch').each(function() {
        new Switchery($(this)[0], $(this).data());
    });

    // For multiselect
    $(".select2").select2();
    $(".ajax").select2({
        ajax: {
            url: "https://api.github.com/search/repositories",
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    q: params.term, // search term
                    page: params.page
                };
            },
            processResults: function(data, params) {
                // parse the results into the format expected by Select2
                // since we are using custom formatting functions we do not need to
                // alter the remote JSON data, except to indicate that infinite
                // scrolling can be used
                params.page = params.page || 1;
                return {
                    results: data.items,
                    pagination: {
                        more: (params.page * 30) < data.total_count
                    }
                };
            },
            cache: true
        },
        escapeMarkup: function(markup) {
            return markup;
        }, // let our custom formatter work
        minimumInputLength: 1,
        templateResult: formatRepo, // omitted for brevity, see the source of this page
        templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
    });
});
</script>

<style>
</style>

<template>
    <Head title="Client" />
    <Layout>
        <div class="page-wrapper" id="page">
            <div class="container-fluid">
                <form @submit.prevent="submitMovement" class="form-material">
                    <div class="modal fade" id="movementModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document" style="max-width:1000px;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Add Daily Movement: {{ tab_name }}</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group col-4">
                                        <label>Date</label>
                                        <input type="date" v-model="mov.date" class="form-control" > 
                                    </div>
                                    <form class="row">
                                        <div class="form-group col-4">
                                            <label>Category</label>
                                            <select class="select2 m-b-10 select2-multiple custom-select form-control" id="mov_category" style="width: 100%" multiple="multiple" v-model="mov.category" data-placeholder="Choose">
                                                <option v-for="(mc, index) in mcategory" :key="mcategory.id" :value="mc.category_name">{{ mc.category_name }}</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-4">
                                            <label>Movement Plan</label>
                                            <select class="custom-select form-control pull-right" id="mov_plan" v-model="mov.movement" data-placeholder="Choose a movement">
                                            </select>
                                        </div>
                                        <div class="form-group col-3">
                                            <label>Status</label>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <input type="radio" id="good" value="Good" class="form-control" v-model="mov.status" />
                                                    <label for="good">Good</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="radio" id="medium" value="Medium" class="form-control" v-model="mov.status" />
                                                    <label for="medium">Medium</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="radio" id="bad" value="Bad" class="form-control" v-model="mov.status" />
                                                    <label for="bad">Bad</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6" >
                                            <label>Details</label> <br />
                                            <input type="text" class="form-control" placeholder="Sets" v-model="mov.sets" style="width:80px;margin-right:10px;">
                                            <input type="text" class="form-control" placeholder="T." v-model="mov.t" style="width:80px;margin-right:10px;">
                                            <input type="text" class="form-control" placeholder="Wt." v-model="mov.wt" style="width:80px;margin-right:10px;">
                                            <input type="text" class="form-control" placeholder="Rest" v-model="mov.rest" style="width:80px;margin-right:10px;">
                                        </div>
                                        <div class="col-6" >
                                            <label>Reps Achieved</label> <br />
                                            <input type="text" class="form-control" v-model="mov.reps1" style="width:60px;margin-right:5px;">
                                            <input type="text" class="form-control" v-model="mov.reps2" style="width:60px;margin-right:5px;">
                                            <input type="text" class="form-control" v-model="mov.reps3" style="width:60px;margin-right:5px;">
                                            <input type="text" class="form-control" v-model="mov.reps4" style="width:60px;margin-right:5px;">
                                            <input type="text" class="form-control" v-model="mov.reps5" style="width:60px;margin-right:5px;">
                                            <input type="text" class="form-control" v-model="mov.reps6" style="width:60px;margin-right:5px;">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="tab_id" v-model="mov.tab_id" id="tab_id" />
                                    <input type="hidden" name="tab_client_id" v-model="mov.tab_client_id" id="tab_client_id" />
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-info" :disabled="mov.processing" :class="{ 'opacity-25': mov.processing }"><i class="ti ti-plus"></i> Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <form @submit.prevent="submitTab" class="form-material">
                    <div class="modal fade" id="myModalTab" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Add Tab</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                </div>
                                <div class="modal-body">
                                    <form class="row">
                                        <div class="form-group col-12">
                                            <input type="text" v-model="tab.name" class="form-control" placeholder="Tab Name" > 
                                            <div v-if="tab.errors.name" class="text-sm text-red-600">
                                                {{ tab.errors.name }}
                                            </div>
                                        </div>
                                        <div class="form-group col-12">
                                            <input type="date" id="tab_date" v-model="tab.date" class="form-control" placeholder="mm/dd/yyyy"> 
                                            <div v-if="tab.errors.date" class="text-sm text-red-600">
                                                {{ tab.errors.date }}
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-info" :disabled="tab.processing" :class="{ 'opacity-25': tab.processing }"><i class="ti ti-plus"></i> Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <form id="form" @submit.prevent="updateNotes" class="form-material">
                    <div class="modal fade" id="myModalNote" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Notes </h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                </div>
                                <div class="modal-body">
                                    <form class="row">
                                        <div class="form-group col-12">
                                            <textarea name="tab_notes" id="tab_notes" v-model="note.tab_notes" rows="4" cols="50" class="form-control" placeholder="Type Notes Here..."></textarea>
                                            <input type="hidden" name="tab_id" v-model="note.tab_id" id="tab_id" />
                                            <input type="hidden" name="tab_client_id" v-model="note.tab_client_id" id="tab_client_id" />
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-info"><i class="ti ti-check"></i> Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="row page-titles">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block">
                                    <div class="m-r-20 align-self-center"><span class="lstick m-r-20"></span><img src="/assets/images/icon/staff.png" alt="Income" /></div>
                                    <div class="align-self-center">
                                        <h6 class="text-muted m-t-10 m-b-0"><strong>Start Date:</strong> {{ FormatDate(new Date(format_sdate[0])) }}</h6>
                                        <h2 class="m-t-0">{{ name }}</h2> <h6 class="text-muted m-t-10 m-b-0"><strong>Program:</strong> {{ program }}</h6>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item" v-for="(tab, index) in tabs" :key="tab.id"> 
                                        <a class="nav-link" data-toggle="tab" :href='"#"+tab.id' role="tab">
                                            <span class="hidden-sm-up"><i class="ti-home"></i></span> 
                                            <span class="hidden-xs-down">{{ tab.tab_name }}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item"> 
                                        <a class="nav-link" data-toggle="modal" href="#week3" data-target="#myModalTab">
                                            <span class="hidden-sm-up"><i class="ti-plus"></i></span> 
                                            <span class="hidden-xs-down"><i class="ti-plus"></i></span>
                                        </a> 
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content tabcontent-border">
                                    <div class="tab-pane p-20" v-for="(tab, index) in tabs" :key="tab.id" :id="tab.id" role="tabpanel">
                                        <div class="d-flex m-t-20 row">
                                            <div class="col-md-6">
                                                <h4 class="card-title"><span class="lstick"></span>{{ FormatDate(new Date((tab.tab_date.split(" "))[0])) }}</h4>
                                                <h6 class="card-subtitle">Notes: {{ tab.tab_notes }}</h6>
                                            </div>
                                            <div class="col-md-6 ml-auto">
                                                <button class="pull-right btn btn-success btn-rounded" id="movementBtn" @click.prevent="showMovement(tab)" data-toggle="modal" data-target="#movementModal">Add Movement Plan <i class="ti-plus"></i></button>
                                                <button class="pull-right btn btn-rounded btn-primary" id="noteButton" @click.prevent="showNotes(tab)">Notes <i class="ti-pencil"></i></button>
                                            </div>
                                        </div>
                                        <div class="table-responsive m-t-20">
                                            <table id="table_print" class="display nowrap table table-hover  table-bordered" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>Planned Movement</th>
                                                        <th>Status</th>
                                                        <th>Sets</th>
                                                        <th>T.</th>
                                                        <th>Wt.</th>
                                                        <th>Rest</th>
                                                        <th>Reps Achieved</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody v-for="(x, index) in data" :key="data.id">
                                                    <tr data-toggle="collapse" :data-target="'#sub'+index" class="accordion-toggle"  v-if="x.tab_id == tab.id">
                                                        <td><span class="label label-primary" v-if="x.subs=='Y'">subs</span> {{ x.movement_name }}</td>
                                                        <td>
                                                            <span class="label label-success label-rounded" v-if="x.status == 'Good'">{{x.status}}</span>
                                                            <span class="label label-danger label-rounded" v-if="x.status == 'Bad'">{{x.status}}</span>
                                                        </td>
                                                        <td>{{ x.sets }}</td>
                                                        <td>{{ x.t }}</td>
                                                        <td>{{ x.wt }}</td>
                                                        <td>{{ x.rest }}</td>
                                                        <td>{{ x.reps1 + ' | ' + x.reps2 + ' | ' + x.reps3 + ' | ' + x.reps4 + ' | ' + x.reps5 + ' | ' + x.reps6 }}</td>
                                                        <td class="display:flex;">
                                                            <button class="btn btn-success btn-sm btn-rounded" v-if="x.subs!='Y'" data-toggle="modal" data-target="#movementModal"><i class="ti-plus"></i> Subs</button>
                                                            <button class="btn btn-info btn-sm btn-rounded" v-if="x.subs!='Y'" @click.prevent="editMovement(tab, x)" data-toggle="modal" data-target="#movementModal"><i class="ti-pencil"></i> Edit</button>
                                                        </td>
                                                    </tr>
                                                    <tr v-if="x.subs=='Y' && x.tab_id == tab.id">
                                                        <td colspan="8" class="hiddenRow">
                                                           <div class="accordian-body collapse" :id="'sub'+index"> 
                                                            <table>
                                                                <tr>
                                                                    <td>{{ x.sub_mov_name }} </td>
                                                                    <td><span class="label label-danger label-rounded">{{ x.sub_status }}</span></td>
                                                                    <td>{{ x.sub_sets }}</td>
                                                                    <td>{{ x.sub_t }}</td>
                                                                    <td>{{ x.sub_wt }}</td>
                                                                    <td>{{ x.sub_rest }}</td>
                                                                    <td>{{ x.sub_reps1 + ' | ' + x.sub_reps2 + ' | ' + x.sub_reps3 + ' | ' + x.sub_reps4 + ' | ' + x.sub_reps5 + ' | ' + x.sub_reps6 }}</td>
                                                                    <td class="display:flex;">
                                                                        <button class="btn btn-info btn-sm btn-rounded" data-toggle="modal" data-target="#movementModal"><i class="ti-pencil"></i> Edit</button>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Movement History</h4>
                                <h6 class="card-subtitle">Click table row to see details</h6>

                                <table class="table table-condensed table-bordered">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Movement Name</th>
                                            <th>Total Sets</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr data-toggle="collapse" data-target="#demo1" class="accordion-toggle">
                                            <td><button class="btn btn-default btn-xs"><span class="glyphicon glyphicon-eye-open"></span></button></td>
                                            <td>Reverse Plank <span class="label label-rounded label-success pull-right">3</span></td>
                                            <td>10</td>
                                        </tr>
                                        <tr>
                                            <td colspan="12" class="hiddenRow">
                                                <div class="accordian-body collapse" id="demo1"> 
                                                    <table class="table">
                                                        <thead>
                                                            <tr class="info">
                                                                <th>Week</th>
                                                                <th>Date</th>
                                                                <th>Status</th>
                                                                <th>Sets</th>		
                                                                <th>T.</th>	
                                                                <th>Wt.</th>	
                                                                <th>Rest</th>	
                                                                <th>Reps Achieved</th>	
                                                            </tr>
                                                        </thead>
                                                        <tbody>                        
                                                            <tr data-toggle="collapse"  class="accordion-toggle" data-target="#demo10">
                                                                <td>Week 1</td>
                                                                <td>23/01/2024</td>
                                                                <td><span class="label label-success label-rounded">Good</span></td>
                                                                <td>3 </td>
                                                                <td> - </td>
                                                                <td> - </td>
                                                                <td> 60" </td>
                                                                <td></td>
                                                            </tr>
                                                            <tr data-toggle="collapse"  class="accordion-toggle" data-target="#demo10">
                                                                <td>Week 2</td>
                                                                <td>26/01/2024</td>
                                                                <td><span class="label label-danger label-rounded">bad</span></td>
                                                                <td>3 </td>
                                                                <td> - </td>
                                                                <td> - </td>
                                                                <td> 60" </td>
                                                                <td></td>
                                                            </tr>
                                                            <tr data-toggle="collapse"  class="accordion-toggle" data-target="#demo10">
                                                                <td>Week 3</td>
                                                                <td>23/01/2024</td>
                                                                <td><span class="label label-success label-rounded">Good</span></td>
                                                                <td>4 </td>
                                                                <td> - </td>
                                                                <td> - </td>
                                                                <td> 5" </td>
                                                                <td></td>
                                                            </tr>
                                                        </tbody>
                                                   </table>                                          
                                                </div> 
                                            </td>
                                        </tr>
                                        <tr data-toggle="collapse" data-target="#demo2" class="accordion-toggle">
                                            <td>
                                                <button class="btn btn-default btn-xs">
                                                    <span class="glyphicon glyphicon-eye-open"></span>
                                                </button>
                                            </td>
                                             <td>FFE Split Squat</td>
                                             <td>5</td>
                                        </tr>
                                        <tr data-toggle="collapse" data-target="#demo3" class="accordion-toggle">
                                            <td>
                                                <button class="btn btn-default btn-xs">
                                                    <span class="glyphicon glyphicon-eye-open"></span>
                                                </button>
                                            </td>
                                             <td>Assisted Pull Up</td>
                                             <td>3</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <Footer></Footer>
        </div>
    </Layout>
</template>