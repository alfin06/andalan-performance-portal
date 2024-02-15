<script setup>
import {ref} from 'vue';
import { useForm, router, usePage, Head } from "@inertiajs/vue3";
import Layout from '../Layouts/Main';
import Footer from '../../Layouts/Footer';
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';

const page = usePage();
</script>

<template>
    <Layout></Layout>
    <div class="page-wrapper">
            
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">MASTER DATA: MOVEMENT LIST</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item">pages</li>
                        <li class="breadcrumb-item active">MOVEMENT LIST</li>
                    </ol>
                </div>
                <div>
                    <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <button type="button" class="btn waves-effect waves-light btn-rounded btn-primary">Add New Movement</button>
                                <!-- <h4 class="card-title">Data Export</h4> -->
                                <!-- <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6> -->
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Movement Name</th>
                                                <th>Category</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No.</th>
                                                <th>Movement Name</th>
                                                <th>Category</th>
                                                <th></th>
                                             
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <tr>
                                                <td>1.</td>
                                                <td>Assisted Pull Up</td>
                                                <td></td>
                                                <th>Edit</th>
                                              
                                            </tr>
                                            <tr>
                                                <td>2.</td>
                                                <td>Line Jump | Lateral</td>
                                                <td></td>
                                                <th>Edit</th>
                                            </tr>
                                            <tr>
                                                <td>3.</td>
                                                <td>Line Jump | Sagital</td>
                                                <td></td>
                                                <th>Edit</th>
                                            </tr>
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                       
                       
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer"> © 2017 Admin Pro by wrappixel.com </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
</template>

<style>
* {
    box-sizing: border-box;
}

#myInput {
    /* background-image: url('/css/search.png'); */
    background-position: 10px 12px;
    background-repeat: no-repeat;
    width: 100%;
    font-size: 16px;
    padding: 12px 20px 12px 40px;
    border: 1px solid #ddd;
    margin-bottom: 12px;
}

.name_box{
    border: 1px solid #ddd;
    margin-top: -1px; /* Prevent double borders */     
    padding-left: 15px;
    text-decoration: none;
    font-size: 18px;
    color: black;
}

.name_a{
    background-color: #fbfbfb;
    margin:10px;
    padding: 5px;
}        
</style>