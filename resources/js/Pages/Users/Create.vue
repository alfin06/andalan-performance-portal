<script setup>
import { useForm, Link, usePage, Head } from "@inertiajs/vue3";
import { Inertia } from "@inertiajs/inertia";
import { computed } from 'vue';
import Layout from '../../Layouts/Main';
import Footer from '../../Layouts/Footer';
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';

const page = usePage();
const users = computed(() => page.props.users);

const form = useForm({
                name: '',
                email: '',
                phone: '',
                password: '',
            });

const props = defineProps({
                users: {
                    type: Object,
                    default: () => ({}),
                },
                failed: {
                    type: String,
                    required: false
                },
            });

const submit = () => {
    form.post(route("users.store"));
    if(!form.errors)
    {
        toast.success('User added successfully!');
    }
    else 
    {
        toast.failed('User added failed!');
    }
    
};
</script>

<style>
</style>

<template>
    <Head title="User" />
    <Layout>
        <div class="page-wrapper" id="page">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">User</h3>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a :href="route('home')">Home</a></li>
                            <li class="breadcrumb-item"><a :href="route('users.index')">Users</a></li>
                            <li class="breadcrumb-item active">User</li>
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
                                                    <label for="name" class="control-label">Name</label>
                                                    <input type="text" v-model="form.name" name="name" class="form-control" placeholder="Name" />
                                                    <div v-if="form.errors.name" class="text-sm text-red-600">
                                                        {{ form.errors.name }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email" class="control-label">Email</label>
                                                    <input type="text" v-model="form.email" name="email" class="form-control" placeholder="Email" />
                                                    <div v-if="form.errors.email" class="text-sm text-red-600">
                                                        {{ form.errors.email }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="phone" class="control-label">Phone</label>
                                                    <input type="text" v-model="form.phone" name="phone" class="form-control" placeholder="628xxxxxxxx" />
                                                    <div v-if="form.errors.phone" class="text-sm text-red-600">
                                                        {{ form.errors.phone }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password" class="control-label">Password</label>
                                                    <input type="password" v-model="form.password" name="password" class="form-control" placeholder="Password" />
                                                    <div v-if="form.errors.password" class="text-sm text-red-600">
                                                        {{ form.errors.password }}
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
                                                <a :href="route('users.index')" class="btn btn-inverse"><i class="fa fa-times"></i> Cancel</a>
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