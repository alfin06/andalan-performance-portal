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
// var format_bdate = props.client.birth_date.split(" ");
// var format_sdate = props.client.start_date.split(" ");

const form = useForm({
                id: props.movement.id,
                name: props.movement.name,
                // email: props.client.email,
                // phone: props.client.phone,
                // birth_date: format_bdate[0],
                // program: props.client.program,
                // goal: props.client.goal,
                // start_date: format_sdate[0],
                // is_active: props.client.is_active,
            });

const submit = () => {
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
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="active" class="control-label">Is account active? </label><br/>
                                                    <input type="checkbox" v-model="form.is_active" value="1" true-value="1" false-value="0" name="active" class="js-switch form-control" data-color="#26c6da" />
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