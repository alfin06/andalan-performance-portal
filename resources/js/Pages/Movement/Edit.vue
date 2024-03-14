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
                movement: {
                    type: Object,
                    default: () => ({}),
                },
                failed: {
                    type: String,
                    required: false
                },
            });

//remove hours, minutes, and seconds
// var format_bdate = props.client.birth_date.split(" ");
// var format_sdate = props.client.start_date.split(" ");
var categories_array = props.movement.categories.split(" ");

const form = useForm({
                id: props.movement.id,
                name: props.movement.name,
                categories: categories_array,
                // email: props.client.email,
                // phone: props.client.phone,
                // birth_date: format_bdate[0],
                // program: props.client.program,
                // goal: props.client.goal,
                // start_date: format_sdate[0],
                // is_active: props.client.is_active,
            });

const submit = () => {
    //console.log(form.categories);
  form.put(route("movement.update", props.movement.id));
    toast.success('Movement updated succesfully!');
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
    <Head title="Movement" />
    <Layout>
        <div class="page-wrapper" id="page">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Edit Movement</h3>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a :href="route('home')">Home</a></li>
                            <li class="breadcrumb-item"><a :href="route('movement.index')">Movement</a></li>
                            <li class="breadcrumb-item active">Movement</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form @submit.prevent="submit" class="form-material m-t-40">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name" class="control-label">Movement Name</label>
                                                    <input type="text" v-model="form.name" name="name" class="form-control" placeholder="Name" />
                                                    <div v-if="form.errors.name" class="text-sm text-red-600">
                                                        {{ form.errors.name }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="demo-checkbox">
                                                        <input type="checkbox" id="md_checkbox_21" class="filled-in chk-col-red" v-model="form.categories" value="Cardio" />
                                                        <label for="md_checkbox_21">Cardio</label>
                                                        <input type="checkbox" id="md_checkbox_22" class="filled-in chk-col-blue-grey" v-model="form.categories" value="Power" />
                                                        <label for="md_checkbox_22">Power</label>
                                                        <input type="checkbox" id="md_checkbox_23" class="filled-in chk-col-purple" v-model="form.categories" value="Hamstring"  />
                                                        <label for="md_checkbox_23">Hamstring</label>
                                                        <input type="checkbox" id="md_checkbox_24" class="filled-in chk-col-brown" v-model="form.categories" value="Push"  />
                                                        <label for="md_checkbox_24">Push</label>
                                                        <input type="checkbox" id="md_checkbox_25" class="filled-in chk-col-indigo" v-model="form.categories" value="Pull"  />
                                                        <label for="md_checkbox_25">Pull</label>
                                                        <input type="checkbox" id="md_checkbox_26" class="filled-in chk-col-amber" v-model="form.categories" value="Hinge"  />
                                                        <label for="md_checkbox_26">Hinge</label>
                                                        <input type="checkbox" id="md_checkbox_27" class="filled-in chk-col-light-blue" v-model="form.categories" value="Squat"  />
                                                        <label for="md_checkbox_27">Squat</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="row p-t-20">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-info" :disabled="form.processing" :class="{ 'opacity-25': form.processing }">
                                                    <i class="fa fa-check"></i> Submit
                                                </button>
                                                &nbsp;
                                                <a :href="route('movement.index')" class="btn btn-inverse"><i class="fa fa-times"></i> Cancel</a>
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