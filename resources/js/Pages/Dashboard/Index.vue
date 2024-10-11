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
    head_training: {
        type: Object,
        default: () => ({}),
    },
    history: {
        type: Object,
        default: () => ({}),
    },
    history_detail: {
        type: Object,
        default: () => ({}),
    },
});

//remove hours, minutes, and seconds
//var format_bdate = props.client.birth_date.split(" ");
var format_sdate = props.client.start_date.split(" ");
var name = props.client.name;
var program = props.client.program;
const today_date = new Date().toISOString().slice(0,10);
var add_edit = "add";

// TAB Head Section
const tab = useForm({
    client_id: props.client.id,
    name: '',
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
    tab_client_id: '',
    head_id: '',

});
const showNotes = (tab, h) => {
    $('#myModalNote').modal('show');

    note.tab_notes = h.head_notes;
    note.tab_id = tab.id;
    note.tab_client_id = tab.client_id;
    note.head_id = h.id;
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
    mov_plan: '',
    status: '',
    sets: '',
    t: '',
    wt: '',
    rest: '',
    reps: '',
    reps1: '',
    reps2: '',
    reps3: '',
    reps4: '',
    reps5: '',
    reps6: '',
    block: '',
    tab_id: '',
    tab_client_id: '',
    id: ''
});

const showHead = (tab) => {
    add_edit = "add";
    tab_name.value = "Add New Schedule: " + tab.tab_name;
    mov.tab_id = tab.id;
    mov.tab_client_id = tab.client_id;
    
    if(head_date != null)
    {
        mov.date = head_date.split(" ")[0];
    }
    
    $('#headModal').modal('show');
};
const submitHead = () => {
    if(add_edit == "add") {
        mov.post(route("training.addHead"));
        toast.success('New schedule added succesfully!');
    }
    mov.reset();
    $('#headModal').modal('hide');
};

const showMovement = (tab, head_date) => {
    add_edit = "add";
    tab_name.value = "Add Daily Movement: " + tab.tab_name;
    $("#hid_plan").val('');
    mov.tab_id = tab.id;
    mov.tab_client_id = tab.client_id;

    if(head_date != null)
    {
        mov.date = head_date.split(" ")[0];
    }
    
    $('#movementModal').modal('show');
};
const submitMovement = () => {
    var nomovement = false;

    mov.mov_plan = document.getElementById("hid_plan").value;
    if(mov.mov_plan == "") {
        mov.mov_plan = document.getElementById("hid_plan2").value;

        if(mov.mov_plan == "") {
            nomovement = true;
        }
    }

    if(nomovement)
    {
        alert('Please select a movement!');
    }else{
        if(add_edit == "add") {
            mov.post(route("training.addMovement"));
            toast.success('Daily movement added succesfully!');
        }
        else if(add_edit == "edit") {
            mov.post(route("training.updateMovement"));
            toast.success('Daily movement updated succesfully!');
        }
        else {
            mov.post(route("training.subsMovement"));
            toast.success('Daily movement substitute added succesfully!');
        }
        mov.reset();
        $('#movementModal').modal('hide');
    }

    
};
const editMovement = (tab, x) => {
    add_edit = "edit";
    var mov_date = x.date.split(" ");
    tab_name.value = "Edit Daily Movement: " + tab.tab_name + " | " + mov_date[0];
    mov.tab_id = tab.id;
    mov.tab_client_id = tab.client_id;
    mov.id = x.id;
    mov.date = mov_date[0];
    $("#mov_plan").val(x.movement_id + '-' + x.movement_name).change();
    $("#hid_plan").val(x.movement_id + '-' + x.movement_name);
    mov.mov_plan = x.movement_id + '-' + x.movement_name;
    mov.status = x.status;
    mov.sets = x.sets;
    mov.reps = x.reps;
    mov.t = x.t;
    mov.wt = x.wt;
    mov.rest = x.rest;
    mov.reps1 = x.reps1;
    mov.reps2 = x.reps2;
    mov.reps3 = x.reps3;
    mov.reps4 = x.reps4;
    mov.reps5 = x.reps5;
    mov.reps6 = x.reps6;
    mov.block = x.block;
    $('#movementModal').modal('show');
};
const subsMovement = (tab, x, status) => {
    mov.reset();
    var mov_date = x.date.split(" ");
    add_edit = "subs";
    tab_name.value = "Subs Daily Movement: " + tab.tab_name + " | " + mov_date[0] + " | " + x.movement_name;
    mov.tab_id = tab.id;
    mov.tab_client_id = tab.client_id;
    mov.id = x.id;
    mov.date = mov_date[0];
    mov.status = status;
    $('#movementModal').modal('show');
};
const deleteMovement = (x) => {
    if(confirm("Are you sure want to delete "+x.movement_name+"?"))
    {
        mov.id = x.id;
        mov.post(route("training.deleteMovement"));
        toast.success('Daily movement deleted succesfully!');
    }
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

function CalculateAge(format_bdate) {
    // Parse the date string into a Date object
    var birthDate = new Date(format_bdate);

    // Get the current date
    var currentDate = new Date();

    // Calculate the difference in years
    var age = currentDate.getFullYear() - birthDate.getFullYear();

    // Check if the birthday has already occurred this year
    if (
    currentDate.getMonth() < birthDate.getMonth() ||
    (currentDate.getMonth() === birthDate.getMonth() &&
        currentDate.getDate() < birthDate.getDate())
    ) {
    age--;
    }

    return age;
}

$(document).ready(function() {
    // Movement dropdown
    $("#mov_category").change(function() {
        // Selected category id
        var category_id = $(this).val();
        var token = jQuery('meta[name="csrf-token"]').attr('content');
        var myToken = $('#myToken').val();

        if(category_id != '') {
            // Fetch movement plan options
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content'),
                    'X-Requested-With': 'XMLHttpRequest',
                }
            });
            var ajaxurl = 'mov';
            console.log("Start fetching movements.");
            //console.log("Token: " + token);
            //console.log("myToken: " + myToken);
            // Empty movement plan
            $('#mov_plan').find('option').remove();
            $.ajax({
                url : ajaxurl,
                type: 'POST',
                data: {categories:category_id},
                dataType: 'json',
                success:function(response) {
                    console.log("Movement fetching done.");
                    var len = response.length;
                    $("#mov_plan").append("<option value=''>Choose a movement</option");
                    for(var i=0; i<len; i++) {
                        var id = response[i]['id'];
                        var name = response[i]['name'];
                        $("#mov_plan").append("<option value='"+id+'-'+name+"'>"+name+"</option");
                    }
                },
                error:function() {
                    console.log("Fail, let's reload and fetch the movements again!");
                    location.reload();
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                        url: 'mov',
                        type: 'POST',
                        data: {categories:category_id},
                        dataType: 'json',
                        success:function(response) {
                            console.log("Movement fetching done.");
                            var len = response.length;
                            $("#mov_plan").append("<option value=''>Choose a movement</option");
                            for(var i=0; i<len; i++) {
                                var id = response[i]['id'];
                                var name = response[i]['name'];
                                $("#mov_plan").append("<option value='"+id+'-'+name+"'>"+name+"</option");
                            }
                        }
                    });
                }
            });
        }
    });

    $("#mov_plan").change(function() {
        $("#hid_plan").val($(this).val());
        $("#hid_plan2").val($(this).val());
        var client_id = $("#tab_client_id").val();
        var temp_mov = ($(this).val()).split("-");
        var mov_plan = temp_mov[0];

        // Display mov plan info
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        var ajaxurl = 'mov_info';
        $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : ajaxurl,
            type: 'POST',
            data: {client:client_id, mov_plan:mov_plan},
            dataType: 'json',
            success:function(response) {
                if (response.length > 0)
                {
                    $("#mov_info").html(response[0]['count']);
                }
                else
                {
                    $("#mov_info").html(0);
                }
            }
        });
    });

    // Switchery
    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
    $('.js-switch').each(function() {
        new Switchery($(this)[0], $(this).data());
    });

    // For multiselect
    $(".select2").select2({
        dropdownParent: $("#myForm")
    });
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
.fail {
    background: #FFADB0;
}
.struggle {
    background: #ffe0ad;
}

.day_container{
    padding:20px;
    margin-bottom:10px;
    background-color: white;
  /* Add shadow */
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1), 0 6px 20px rgba(0, 0, 0, 0.1);
  border-radius: 8px; /* Optional: rounded corners */
}
.dateBtn{
    margin-bottom:10px;
}
.tab-pane{
    margin-top:15px;
}
</style>

<template>
    <Head title="Client" />
    <Layout>
        <div class="page-wrapper" id="page">
            <div class="container-fluid">
                <form @submit.prevent="submitHead" class="form-material">
                    <div class="modal fade" id="headModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document" style="max-width:1000px;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">{{ tab_name }}</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group col-4" v-if="add_edit=='add'">
                                        <label>Date</label>
                                        <input type="date" v-model="mov.date" class="form-control" > 
                                    </div>
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

                <form @submit.prevent="submitMovement" class="form-material">
                    <div class="modal fade" id="movementModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document" style="max-width:1000px;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">{{ tab_name }}</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                    <div class="form-group col-6" v-if="add_edit=='add'">
                                        <label>Date</label><br />
                                        <input type="date" v-model="mov.date" class="form-control" style="width:300px;"> 
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Block</label><br />
                                        <input type="text" v-model="mov.block" class="form-control" style="width:60px;"> 
                                    </div>
                                </div>
                                    <form class="row" id="myForm">
                                        <div class="form-group col-6">
                                            <label>Category</label>
                                            <select class="select2 m-b-10 select2-multiple custom-select form-control" id="mov_category" style="width:100%;" multiple="multiple" v-model="mov.category">
                                                <option v-for="(mc, index) in mcategory" :key="mcategory.id" :value="mc.category_name">{{ mc.category_name }}</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-6">
                                            <label>Movement Plan (Count: <span id="mov_info">0</span>)</label>
                                            <select class="select2 form-control custom-select" id="mov_plan" style="width:100%;" >
                                                <option></option>
                                                <option v-for="(mo, index) in movement" :key="movement.id" :value="mo.id+'-'+mo.name">{{ mo.name }}</option>
                                            </select>
                                            <input type="hidden" id="hid_plan" name="hid_plan" v-model="mov.mov_plan" />
                                            <input type="hidden" id="hid_plan2" name="hid_plan2" />
                                        </div>
                                        <!--<div class="form-group col-3">
                                            <label>Status</label>
                                            <div class="row">
                                                 <div class="col-md-4">
                                                    <input type="radio" id="good" value="Good" class="form-control" v-model="mov.status" />
                                                    <label for="good" class="label label-success">Good</label>
                                                </div> 
                                                <div class="col-md-6">
                                                    <input type="radio" id="medium" value="Struggling" class="form-control" v-model="mov.status" />
                                                    <label for="medium">Struggling</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="radio" id="bad" value="Fail" class="form-control" v-model="mov.status" />
                                                    <label for="bad">Fail</label>
                                                </div>
                                            </div> 
                                        </div> -->
                                        <div class="col-6 col-sm-12 col-lg-6 col-md-6" >
                                            <label>Details</label> <br />
                                            <input type="number" class="form-control" placeholder="Sets" v-model="mov.sets" style="width:80px;margin-right:10px;">
                                            <input type="text" class="form-control" placeholder="Reps" v-model="mov.reps" style="width:80px;margin-right:10px;">
                                            <input type="text" class="form-control" placeholder="T." v-model="mov.t" style="width:80px;margin-right:10px;">
                                            <input type="text" class="form-control" placeholder="Wt." v-model="mov.wt" style="width:80px;margin-right:10px;">
                                            <input type="text" class="form-control" placeholder="Rest" v-model="mov.rest" style="width:80px;margin-right:10px;">
                                        </div>
                                        <div class="col-6 col-sm-12 col-lg-6 col-md-6" >
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
                                    <button type="submit" v-if="add_edit=='add'" class="btn btn-info" :disabled="mov.processing" :class="{ 'opacity-25': mov.processing }"><i class="ti ti-plus"></i> Add</button>
                                    <button type="submit" v-if="add_edit=='edit'" class="btn btn-info" :disabled="mov.processing" :class="{ 'opacity-25': mov.processing }"><i class="ti ti-check"></i> Update</button>
                                    <button type="submit" v-if="add_edit=='subs'" class="btn btn-info" :disabled="mov.processing" :class="{ 'opacity-25': mov.processing }"><i class="ti ti-plus"></i> Subs</button>
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
                                        <a class="nav-link" data-toggle="tab" :href='"#tab_"+tab.id' role="tab">
                                            <span class="hidden-sm-up">{{ tab.tab_name }}</span> 
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
                                    <div class="tab-pane" v-for="(tab, index) in tabs" :key="tab.id" :id='"tab_" + tab.id' role="tabpanel">
                                        <button class="btn btn-success btn-rounded dateBtn" id="dateBtn" @click.prevent="showHead(tab)" data-toggle="modal" data-target="#headModal"><i class="ti-calendar"></i> Add Date</button>
                                        <div v-for="(h, index) in head_training" :key="h.id" :id="h.id">
                                            <div v-if="h.tab_id==tab.id" class="day_container">
                                                <div class="d-flex m-t-20 row ">
                                                    <div class="col-12">
                                                        <h4 class="card-title">
                                                            {{ FormatDate(new Date((h.head_date.split(" "))[0])) }}
                                                            <button class="pull-right btn btn-success btn-rounded btn-sm" id="movementBtn" @click.prevent="showMovement(tab, h.head_date)" data-toggle="modal" data-target="#movementModal"><i class="ti-plus"></i> Add Movement</button>
                                                        </h4>
                                                        <h6 class="card-subtitle">
                                                            Notes: {{ h.head_notes }}
                                                            <button class="btn btn-rounded btn-sm btn-outline-primary" id="noteButton" @click.prevent="showNotes(tab, h)"><i class="ti-pencil"></i></button> 
                                                        </h6>
                                                    </div>
                                                </div>
                                                <div class="table-responsive m-t-20">
                                                    <table id="table_print" class="display nowrap table table-hover  table-bordered" cellspacing="0" width="100%">
                                                        <thead>
                                                            <tr>
                                                               <th>Block</th>
                                                                <th>Planned Movement</th>
                                                                <th>Status</th>
                                                                <th>Sets</th>
                                                                <th>Reps</th>
                                                                <th>T.</th>
                                                                <th>Wt.</th>
                                                                <th>Rest</th>
                                                                <th colspan="6">Reps Achieved</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody v-for="(x, index) in data" :key="data.id">
                                                           <!-- Add a blank row only if it's not the first row and the first letter of x.block changes -->
                                                           <template v-if="index > 0 && x.block && data[index - 1].block && x.block.charAt(0) !== data[index - 1].block.charAt(0)">
                                                                <tr>
                                                                    <td colspan="100%" style="height: 20px; padding: 0;">
                                                                        &nbsp;
                                                                    </td>
                                                                </tr>
                                                            </template>

                                                            <tr data-toggle="collapse" :data-target="'#sub'+index" class="accordion-toggle"  v-if="x.tab_id == tab.id && x.head_training_id == h.id">
                                                                <td>{{ x.block }}</td>
                                                                <td @click.prevent="editMovement(tab, x)"><span class="label label-primary" v-if="x.subs=='Y'">subs</span> {{ x.movement_name }}</td>
                                                                <td>
                                                                    <!-- <span class="label label-success label-rounded" v-if="x.status == 'Good'">{{x.status}}</span> -->
                                                                    <span class="label label-warning label-rounded" v-if="x.status == 'Struggling'">{{x.status}}</span>
                                                                    <span class="label label-danger label-rounded" v-if="x.status == 'Fail'">{{x.status}}</span>
                                                                </td>
                                                                <td @click.prevent="editMovement(tab, x)">{{ x.sets }}</td>
                                                                <td @click.prevent="editMovement(tab, x)">{{ x.reps }}</td>
                                                                <td @click.prevent="editMovement(tab, x)">{{ x.t }}</td>
                                                                <td @click.prevent="editMovement(tab, x)">{{ x.wt }}</td>
                                                                <td @click.prevent="editMovement(tab, x)">{{ x.rest }}</td>
                                                                <td>{{ x.reps1 }}</td>
                                                                <td>{{ x.reps2 }}</td>
                                                                <td>{{ x.reps3 }}</td>
                                                                <td>{{ x.reps4 }}</td>
                                                                <td>{{ x.reps5 }}</td>
                                                                <td>{{ x.reps6 }}</td>
                                                                <!-- <td>{{ (x.reps1||"-") + ' | ' + (x.reps2||"-") + ' | ' + (x.reps3||"-") + ' | ' + (x.reps4||"-") + ' | ' + (x.reps5||"-") + ' | ' + (x.reps6||"-") }}</td> -->
                                                                <td class="">
                                                                    <!-- <button class="btn btn-info btn-sm btn-rounded" @click.prevent="editMovement(tab, x)"><i class="ti-pencil"></i> Edit</button> -->
                                                                    <button class="btn btn-warning btn-sm btn-rounded" v-if="x.subs!='Y'" @click.prevent="subsMovement(tab, x, 'Struggling')"> Struggling</button>
                                                                    &nbsp;
                                                                    <button class="btn btn-danger btn-sm btn-rounded" v-if="x.subs!='Y'" @click.prevent="subsMovement(tab, x, 'Fail')"> Fail</button>
                                                                    <!-- <button class="btn btn-danger btn-sm btn-rounded" @click.prevent="deleteMovement(x)"><i class="ti-trash"></i> Delete</button> -->
                                                                </td>
                                                            </tr>
                                                            <tr v-if="x.tab_id == tab.id && x.head_training_id == h.id && x.subs=='Y'" :class="['accordian-body', 'collapse', x.sub_status === 'Struggling' ? 'struggle' : 'fail']" :id="'sub'+index">
                                                                <td>{{ x.sub_block }}</td>
                                                                <td>{{ x.sub_mov_name }} </td>
                                                                <td><span :class="['label', 'label-rounded', x.sub_status === 'Struggling' ? 'label-warning' : 'label-danger']">{{ x.sub_status }}</span></td>
                                                                <td>{{ x.sub_sets }}</td>
                                                                <td>{{ x.sub_reps }}</td>
                                                                <td>{{ x.sub_t }}</td>
                                                                <td>{{ x.sub_wt }}</td>
                                                                <td>{{ x.sub_rest }}</td>
                                                                <td>{{ x.sub_reps1 }}</td>
                                                                <td>{{ x.sub_reps2 }}</td>
                                                                <td>{{ x.sub_reps3 }}</td>
                                                                <td>{{ x.sub_reps4 }}</td>
                                                                <td>{{ x.sub_reps5 }}</td>
                                                                <td>{{ x.sub_reps6 }}</td>
                                                                <!-- <td>{{ (x.sub_reps1||"-") + ' | ' + (x.sub_reps2||"-") + ' | ' + (x.sub_reps3||"-") + ' | ' + (x.sub_reps4||"-") + ' | ' + (x.sub_reps5||"-") + ' | ' + (x.sub_reps6||"-") }}</td> -->
                                                                <td></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <hr />
                                            </div>
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
                                            <!-- <th>Total Sets</th> -->
                                        </tr>
                                    </thead>
                                    <tbody v-for="(hi, index) in history">
                                        <tr data-toggle="collapse" :data-target="'#demo'+index" class="accordion-toggle">
                                            <td><button class="btn btn-default btn-xs"><span class="glyphicon glyphicon-eye-open"></span></button></td>
                                            <td>{{ hi.movement_name }} <span class="label label-rounded label-success pull-right">{{ hi.count }}</span></td>
                                            <!-- <td>{{ hi.total_sets }}</td> -->
                                        </tr>
                                        <tr>
                                            <td colspan="12" class="hiddenRow">
                                                <div class="accordian-body collapse" :id="'demo'+index"> 
                                                    <table class="table">
                                                        <thead>
                                                            <tr class="info">
                                                                <th>Tab</th>
                                                                <th>Date</th>
                                                                <th>Status</th>
                                                                <th>Sets</th>	
                                                                <th>Reps</th>	
                                                                <th>T.</th>	
                                                                <th>Wt.</th>	
                                                                <th>Rest</th>	
                                                                <th>Reps Achieved</th>	
                                                            </tr>
                                                        </thead>
                                                        <tbody v-for="(hd, index) in history_detail">                        
                                                            <tr v-if="hd.movement_id==hi.movement_id">
                                                                <td>{{ hd.tab_name }}</td>
                                                                <td>{{ hd.training_date }}</td>
                                                                <td><span class="label label-success label-rounded">{{ hd.status }}</span></td>
                                                                <td>{{ hd.sets }}</td>
                                                                <td>{{ hd.reps }}</td>
                                                                <td>{{ hd.t }}</td>
                                                                <td>{{ hd.wt }}</td>
                                                                <td>{{ hd.rest }}</td>
                                                                <td>{{ (hd.reps1||"-") + ' | ' + (hd.reps2||"-") + ' | ' + (hd.reps3||"-") + ' | ' + (hd.reps4||"-") + ' | ' + (hd.reps5||"-") + ' | ' + (hd.reps6||"-") }}</td>
                                                            </tr>
                                                        </tbody>
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
            <Footer></Footer>
        </div>
    </Layout>
</template>