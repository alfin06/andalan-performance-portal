<script setup>
import { useForm, Link, usePage, Head } from "@inertiajs/vue3";
import { Inertia } from "@inertiajs/inertia";
import { computed } from 'vue';
import Layout from '../../Layouts/Main';
import Footer from '../../Layouts/Footer';
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';

$(document).ready(function() {
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf', 'print'
        ]
    });
});

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

function destroy(id) {
    if (confirm("Are you sure you want to delete?")) {
        form.delete(route('users.destroy', id));
        toast.success('User deleted successfully!');
    }
}
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
                                                                <button type="button" class="btn btn-primary btn-rounded"><i class="mdi mdi-plus"></i> Add New User</button>
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
                                        <div class="table-responsive text-nowrap">
                                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>Action</th>
                                                        <th>Name</th>
                                                        <th>Role</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="(item, index) in users" :key="item.id">
                                                        <td width="1%">
                                                            <Link :href="route('users.edit', item.id)" class="btn btn-sm btn-icon btn-pure btn-outline text-info" data-original-title="Edit"><i class="ti-pencil" aria-hidden="true"></i></Link>
                                                            <a :href="'https://wa.me/'+item.phone" alt="Whatsapp" target="_blank" data-toggle="tooltip" data-original-title="Whatsapp"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                                                            <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn text-danger" data-toggle="tooltip" data-original-title="Delete" @click="destroy(item.id)"><i class="ti-trash" aria-hidden="true"></i></button>
                                                        </td>
                                                        <td>{{item.name}}</td>
                                                        <td><span class="label label-warning">{{item.role}}</span></td>
                                                    </tr>
                                                </tbody>
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