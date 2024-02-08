<script setup>
import {ref} from 'vue';
import Layout from '../Layouts/Main'

</script>

<template>
    <Layout></Layout>
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <div class="row">
                <!-- contact -->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <h4 class="card-title"><span class="lstick"></span>Client List</h4>
                                <div class="btn-group ml-auto m-t-10">
                                    <a href="JavaScript:void(0)" class="icon-options-vertical link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="javascript:void(0)">Add New Client</a>
                                    </div>
                                </div>
                            </div>


                            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">

                            <div class="container">
                                <div class="row" id="list_name">
                                    <div class="col-3 name_box"> <a href="profile" class="name_a">
                                        Andrei Kurnia<hr />
                                        <h6>Start date: 23/04/2024</h6>
                                        <h6>Current Program: 2x a Week | General Population</h6></a>
                                    </div>
                                    <div class="col-3 name_box"> <a href="profile" class="name_a">
                                        Nike Kurnia<hr />
                                        <h6>Start date: 23/04/2024</h6>
                                        <h6>Current Program: 2x a Week | General Population</h6></a>
                                    </div>
                                    <div class="col-3 name_box"> <a href="profile" class="name_a">
                                        Clayton Kurnia<hr />
                                        <h6>Start date: 23/04/2024</h6>
                                        <h6>Current Program: 2x a Week | General Population</h6></a>
                                    </div>
                                    <div class="col-3 name_box"> <a href="profile" class="name_a">
                                        Dominic Kurnia<hr />
                                        <h6>Start date: 23/04/2024</h6>
                                        <h6>Current Program: 2x a Week | General Population</h6></a>
                                    </div>
                                    <div class="col-3 name_box"> <a href="profile" class="name_a">
                                        Ella Kurnia<hr />
                                        <h6>Start date: 23/04/2024</h6>
                                        <h6>Current Program: 2x a Week | General Population</h6></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer"> &copy; {{ new Date().getFullYear() }} <a href="https://finicode.com/" alt="Finicode">Finicode</a></footer>
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