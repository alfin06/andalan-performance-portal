<script setup>
import { useForm, Link, usePage, Head } from "@inertiajs/vue3";
import { Inertia } from "@inertiajs/inertia";
import { computed } from 'vue';
import Layout from '../../Layouts/Main';
import Footer from '../../Layouts/Footer';
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';

const page = usePage();

const form = useForm({
                name: '',
                categories: [],
            });

const props = defineProps({
                failed: {
                    type: String,
                    required: false
                },
            });

const submit = () => {
    //console.log(form.categories);
    form.post(route("movement.store"));
    toast.success('Movement added successfully!');
};
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
                        <h3 class="text-themecolor">Movement</h3>
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
                                <form @submit.prevent="submit" class="form-material">
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
                                                        <input type="checkbox" id="md_checkbox_28" class="filled-in chk-col-light-blue" v-model="form.categories" value="Breathing"  />
                                                        <label for="md_checkbox_28">Breathing</label>
                                                        <input type="checkbox" id="md_checkbox_29" class="filled-in chk-col-light-blue" v-model="form.categories" value="CAMPS"  />
                                                        <label for="md_checkbox_29">CAMPS</label>
                                                        <input type="checkbox" id="md_checkbox_30" class="filled-in chk-col-light-blue" v-model="form.categories" value="Reset"  />
                                                        <label for="md_checkbox_30">Reset</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="row p-t-20">
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
                                                    <label for="program" class="control-label">Program</label>
                                                    <input type="text" v-model="form.program" name="program" class="form-control" placeholder="Program" />
                                                    <div v-if="form.errors.program" class="text-sm text-red-600">
                                                        {{ form.errors.program }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="goal" class="control-label">Goal</label>
                                                    <input type="text" v-model="form.goal" name="goal" class="form-control" placeholder="Goal" />
                                                    <div v-if="form.errors.goal" class="text-sm text-red-600">
                                                        {{ form.errors.goal }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="start_date" class="control-label">Start Date</label>
                                                    <input type="date" v-model="form.start_date" name="start_date" class="form-control" placeholder="mm/dd/yy" />
                                                    <div v-if="form.errors.start_date" class="text-sm text-red-600">
                                                        {{ form.errors.start_date }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
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