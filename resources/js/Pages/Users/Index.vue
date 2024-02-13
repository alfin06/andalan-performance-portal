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

function addEmployee() {
    form.post('addEmployee', {
        onSuccess: () => {
            form.reset();
            toast.success('Employee added!');
        }
    })
}

function destroy(id) {
    if (confirm("Are you sure you want to delete?")) {
        form.delete(route('users.destroy', id));
        toast.success('User deleted successfully!');
    }
}
</script>
<script>
$(document).ready(function() {
$('#example23').DataTable({
    dom: 'Bfrtip',
    buttons: [
        'csv', 'excel', 'pdf', 'print'
    ]
});
});
</script>

<style>
</style>

<template>
    <Head title="Users" />
    <Layout>
        <div class="page-wrapper" id="page">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">List of Users</h3>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a :href="route('home')">Home</a></li>
                            <li class="breadcrumb-item active">Users</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-lg-12 col-md-12 col-xs-12">
                                        <div class="d-flex">
                                            <div class="align-self-center">
                                                <table>
                                                    <tr>
                                                        <td colspan="2">
                                                            <Link :href="route('users.create')">
                                                                <button type="button" class="btn btn-primary btn-rounded"><i class="mdi mdi-plus"></i> Add New Employee</button>
                                                            </Link>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
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
                                                            <Link :href="route('users.edit', item.id)" class="btn btn-sm btn-icon btn-pure btn-outline" data-original-title="Edit"><i class="ti-pencil" aria-hidden="true"></i></Link>
                                                            <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete" @click="destroy(item.id)"><i class="ti-close" aria-hidden="true"></i></button>
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
    </Layout>
</template>