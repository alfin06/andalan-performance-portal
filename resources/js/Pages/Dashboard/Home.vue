<script setup>
import { useForm, Link, usePage, Head } from "@inertiajs/vue3";
import { Inertia } from "@inertiajs/inertia";
import { computed } from 'vue';
import Layout from '../../Layouts/Main';
import Footer from '../../Layouts/Footer';
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';

const page = usePage();
const clients = computed(() => page.props.clients);

const form = useForm({
                name: '',
                email: '',
                phone: '',
                password: '',
            });

const props = defineProps({
                clients: {
                    type: Object,
                    default: () => ({}),
                },
                failed: {
                    type: String,
                    required: false
                },
            });

function myFunction() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("list_name");
    li = ul.getElementsByTagName("div");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("span")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
</script>
<script> 
    // JavaScript anonymous function 
    (() => { 
        if (window.localStorage) { 

            // If there is no item as 'reload' 
            // in localstorage then create one & 
            // reload the page 
            if (!localStorage.getItem('reload')) { 
                localStorage['reload'] = true; 
                location.replace("/");
            } else { 

                // If there exists a 'reload' item 
                // then clear the 'reload' item in 
                // local storage 
                localStorage.removeItem('reload'); 
            } 
        } 
    })(); // Calling anonymous function here only 
</script> 

<template>
    <Head title="Home" />
    <Layout>
        <div class="page-wrapper">
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
                                            <a class="dropdown-item" :href="route('client.create')">Add New Client</a>
                                        </div>
                                    </div>
                                </div>

                                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">

                                <div class="container">
                                    <div class="row" id="list_name">
                                        <div class="col-3 name_box" v-for="(item, index) in clients" :key="item.id"> 
                                            <Link :href="route('training.index', item.id)" class="name_a">
                                                <span>{{item.name}}</span><hr />
                                                <h6><strong>Start date:</strong> {{(item.start_date.split(" "))[0]}}</h6>
                                                <h6><strong>Program:</strong> {{item.program}}</h6>
                                            </Link>
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