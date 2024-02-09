<script setup>
import { useForm, router, usePage, Head } from "@inertiajs/vue3";
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
                failed: {
                    type: String,
                    required: false
                }
            });

$('#myTable').DataTable();

function addEmployee() {
    form.post('addEmployee', {
        onSuccess: () => {
            form.reset();
            toast.success('Employee added!');
        }
    })
}
</script>

<style>
</style>

<template>
    <Head title="Employees" />
    <Layout></Layout>
    <div class="page-wrapper" id="page">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Employee</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a :href="route('home')">Home</a></li>
                        <li class="breadcrumb-item active">Employees</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="contact-page-aside">
                            <div class="row">
                                <div class="col-12 col-lg-12 col-md-12 col-xs-12">
                                    <div class="d-flex">
                                        <div class="align-self-center">
                                            <table>
                                                <tr>
                                                    <td colspan="2">
                                                        <button type="button" class="btn btn-info btn-rounded" data-toggle="modal" data-target="#add-contact"><i class="mdi mdi-plus"></i> Add New Employee</button>
                                                    </td>
                                                    <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <form class="form-horizontal form-material" @submit.prevent="addEmployee" id="addEmployee">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="myModalLabel">Add New Employee</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <div class="col-md-12 m-b-20">
                                                                                <input type="text" className="form-control" id="name" placeholder="Name" v-model="form.name">
                                                                            </div>
                                                                            <div class="col-md-12 m-b-20">
                                                                                <input type="text" className="form-control" id="email" placeholder="Email" v-model="form.email">
                                                                            </div>
                                                                            <div class="col-md-12 m-b-20">
                                                                                <input type="text" className="form-control" id="phone" placeholder="Phone" v-model="form.phone">
                                                                            </div>
                                                                            <div class="col-md-12 m-b-20">
                                                                                <input type="password" className="form-control" id="password" placeholder="Password" v-model="form.password">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-info waves-effect">Save</button>
                                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="ml-auto">
                                            <input type="text" id="demo-input-search2" placeholder="search contacts" class="form-control"> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table id="demo-foo-addrow myTable" class="table m-t-30 table-hover no-wrap contact-list">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Role</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(item, index) in users" :key="item.id">
                                                    <td>{{ index+1 }}</td>
                                                    <td>
                                                        <a href="app-contact-detail.html"> {{item.name}}</a>
                                                    </td>
                                                    <td>{{item.email}}</td>
                                                    <td>{{item.phone}}</td>
                                                    <td><span class="label label-danger">{{item.role}}</span></td>
                                                    <td>
                                                        <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline" data-toggle="tooltip" data-original-title="Edit"><i class="ti-pencil" aria-hidden="true"></i></button>
                                                        <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="7">
                                                        <div class="text-right">
                                                            <ul class="pagination"> </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <Footer></Footer>
    </div>
</template>