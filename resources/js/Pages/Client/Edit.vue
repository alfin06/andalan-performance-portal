<script setup>
import { useForm, Link, usePage, Head } from "@inertiajs/vue3";
import { Inertia } from "@inertiajs/inertia";
import { computed } from 'vue';
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
                failed: {
                    type: String,
                    required: false
                },
            });

//remove hours, minutes, and seconds
//var format_bdate = props.client.birth_date.split(" ");
var format_sdate = props.client.start_date.split(" ");

const form = useForm({
                id: props.client.id,
                name: props.client.name,
                email: props.client.email,
                phone: props.client.phone,
                //birth_date: format_bdate[0],
                program: props.client.program,
                goal: props.client.goal,
                start_date: format_sdate[0],
                is_active: props.client.is_active,
            });

const submit = () => {
    form.put(route("client.update", props.client.id));
    toast.success('Client updated succesfully!');
};

const showProgram = (form) => {
    //toast.success('Program updated succesfully!');
  //  tab_name.value = tab.tab_name;
    $('#programModal').modal('show');
};

const updateProgram = () => {
 //   note.post(route("training.updateNotes"));
 //   toast.success('Notes updated succesfully!');
    form.post(route("client.updateProgram"));
    $('#programModal').modal('hide');
    toast.success('Program updated succesfully!');
};
</script>
<script>
jQuery(document).ready(function() {
    // Switchery
    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
    $('.js-switch').each(function() {
        new Switchery($(this)[0], $(this).data());
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
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Edit Client</h3>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a :href="route('home')">Home</a></li>
                            <li class="breadcrumb-item"><a :href="route('client.index')">Clients</a></li>
                            <li class="breadcrumb-item active">Client</li>
                        </ol>
                    </div>
                </div>
               
                <form id="form" @submit.prevent="updateProgram" class="form-material">
                    <div class="modal fade" id="programModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Change Program </h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                </div>
                                <div class="modal-body">
                                    <form class="row">
                                        <div class="form-group col-12">
                                            <input type="text" v-model="form.program" name="program" class="form-control" placeholder="Progran" />
                                                    <div v-if="form.errors.program" class="text-sm text-red-600">
                                                        {{ form.errors.program }}
                                                    </div>
                                            <input type="hidden" name="client_id" v-model="form.id" id="client_id" />
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-info"><i class="ti ti-check"></i> Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
             
                <div class="row">
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card"> 
                            <img class="card-img" src="/assets/images/background/bg.jpg" alt="Card image">
                            <div class="card-img-overlay card-inverse social-profile d-flex ">
                                <div class="align-self-center"> 
                                    <h4 class="card-title">Start Date:</h4>
                                    <h6 class="card-subtitle">{{ form.start_date }}</h6>
                                    <h4 class="card-title">Program:</h4>
                                    <h6 class="card-subtitle">{{ form.program }}</h6>
                                    <h4 class="card-title">Goal:</h4>
                                    <h6 class="card-subtitle">{{ form.goal }}</h6>
                                    <div class="p-t-20">
                                        <button class="btn btn-warning"  @click.prevent="showProgram(form)" data-toggle="modal" data-target="#programModal"><i class="fa fa-pencil"></i> Change</button> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-body">
                                <form @submit.prevent="submit" class="form-material m-t-40">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name" class="control-label">Full Name</label>
                                                    <input type="text" v-model="form.name" name="name" class="form-control" placeholder="Name" />
                                                    <div v-if="form.errors.name" class="text-sm text-red-600">
                                                        {{ form.errors.name }}
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="goal" class="control-label">Birth Date</label>
                                                    <input type="date" v-model="form.birth_date" name="birth_date" class="form-control" placeholder="mm/dd/yyyy" />
                                                    <div v-if="form.errors.birth_date" class="text-sm text-red-600">
                                                        {{ form.errors.birth_date }}
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email" class="control-label">Email</label>
                                                    <input type="text" v-model="form.email" name="email" class="form-control" placeholder="Email" />
                                                    <div v-if="form.errors.email" class="text-sm text-red-600">
                                                        {{ form.errors.email }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="phone" class="control-label">Phone</label>
                                                    <input type="text" v-model="form.phone" name="phone" class="form-control" placeholder="Phone" />
                                                    <div v-if="form.errors.phone" class="text-sm text-red-600">
                                                        {{ form.errors.phone }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="active" class="control-label">Is account active? </label><br/>
                                                    <input type="checkbox" v-model="form.is_active" value="1" true-value="1" false-value="0" name="active" class="js-switch form-control" data-color="#26c6da" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row p-t-20">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-info" :disabled="form.processing" :class="{ 'opacity-25': form.processing }">
                                                    <i class="fa fa-check"></i> Submit
                                                </button>
                                                &nbsp;
                                                <a :href="route('client.index')" class="btn btn-inverse"><i class="fa fa-times"></i> Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <Footer></Footer>
        </div>
    </Layout>
</template>