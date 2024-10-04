<script setup>
import { useForm, Link, usePage, Head } from "@inertiajs/vue3";
import { Inertia } from "@inertiajs/inertia";
import { computed, reactive } from 'vue';
import Layout from '../../Layouts/Main';
import Footer from '../../Layouts/Footer';
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';

const page = usePage();

const form = useForm({
                name: '',
                email: '',
                phone: '',
                program: '',
                start_date: '',
                goal: '',
                birth_date: '',
            });

const errors = reactive({
    name: '',
    email: '',
    phone: '',
    program: '',
    start_date: '',
    goal: '',
    birth_date: '',
});

const props = defineProps({
                failed: {
                    type: String,
                    required: false
                },
            });

const validateFields = () => {
  let valid = true;

  // Check each field and set error messages accordingly
  if (!form.name) {
    errors.name = "Full Name is required";
    valid = false;
  } else {
    errors.name = '';
  }

  if (!form.program) {
    errors.program = "Program is required";
    valid = false;
  } else {
    errors.program = '';
  }

  if (!form.start_date) {
    errors.start_date = "Start Date is required";
    valid = false;
  } else {
    errors.start_date = '';
  }

  if (!form.goal) {
    errors.goal = "Goal is required";
    valid = false;
  } else {
    errors.goal = '';
  }

  return valid;
};

const submit = () => {
    if (validateFields()) {
        form.post(route("client.store"));
        toast.success('Client added successfully!');
    } else {
        toast.error('Please fill in all required fields.');
    }
};
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
                        <h3 class="text-themecolor">Client</h3>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a :href="route('home')">Home</a></li>
                            <li class="breadcrumb-item"><a :href="route('client.index')">Clients</a></li>
                            <li class="breadcrumb-item active">Client</li>
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
                                                    <label for="name" class="control-label">Full Name <span class="text-danger">*</span></label>
                                                    <input type="text" v-model="form.name" name="name" class="form-control" placeholder="Name" />
                                                    <div v-if="errors.name" class="text-sm text-red-600">
                                                        {{ errors.name }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="goal" class="control-label">Birth Date</label>
                                                    <input type="date" v-model="form.birth_date" name="birth_date" class="form-control" placeholder="mm/dd/yyyy" />
                                                    <div v-if="form.errors.birth_date" class="text-sm text-red-600">
                                                        {{ form.errors.birth_date }}
                                                    </div>
                                                </div>
                                            </div>
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
                                                    <label for="program" class="control-label">Program <span class="text-danger">*</span></label>
                                                    <input type="text" v-model="form.program" name="program" class="form-control" placeholder="Program" />
                                                    <div v-if="errors.program" class="text-sm text-red-600">
                                                        {{ errors.program }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="goal" class="control-label">Goal <span class="text-danger">*</span></label>
                                                    <input type="text" v-model="form.goal" name="goal" class="form-control" placeholder="Goal" />
                                                    <div v-if="errors.goal" class="text-sm text-red-600">
                                                        {{ errors.goal }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="start_date" class="control-label">Start Date <span class="text-danger">*</span></label>
                                                    <input type="date" v-model="form.start_date" name="start_date" class="form-control" placeholder="mm/dd/yy" />
                                                    <div v-if="errors.start_date" class="text-sm text-red-600">
                                                        {{ errors.start_date }}
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