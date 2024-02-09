<script setup>
import { useForm, router, usePage, Head } from "@inertiajs/vue3";
import { computed } from 'vue'
import Layout from '../../Layouts/Main'
import Footer from '../../Layouts/Footer';

const page = usePage()
const user = computed(() => page.props.auth.user)

const form = useForm({
    name: user.value.name,
    password: '',
    confirmpassword: '',
});

const props = defineProps({
    failed: {
        type: String,
        required: false
    },

    metaInfo: {
        titlle: 'Profile'
    }
});

function profile() {
    router.post('profile', form);
}
</script>

<style>
</style>

<template>
    <Head title="Profile" />
    <Layout></Layout>
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div v-if="succeed" class="text-white bg-success p-2 rounded my-2">{{ succeed }}</div>
                   <div v-if="failed" class="text-white bg-danger p-2 rounded my-2">{{ failed }}</div>
                </div>
            </div>
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Profile Settings</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a :href="route('home')">Home</a></li>
                        <li class="breadcrumb-item active">Profile Settings</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-xlg-3 col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="m-t-30 text-center">
                                <img src="/assets/images/users/user.png" class="img-circle" width="150" />
                                <h4 class="card-title m-t-10">{{ user.name }}</h4>
                            </div>
                        </div>
                        <div>
                        <hr> </div>
                        <div class="card-body"> <small class="text-muted">Email address </small>
                            <h6>{{ user.email }}</h6>
                        </div>
                        <div class="card-body"> <small class="text-muted">Role </small>
                            <h6>{{ user.role }}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-xlg-9 col-md-7">
                    <div class="card">
                        <ul class="nav nav-tabs profile-tab" role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Settings</a> </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="home" role="tabpanel">
                                <div class="card-body">
                                    <form class="form-horizontal form-material" enctype="multipart/form-data" @submit.prevent="profile">
                                        <div class="form-group">
                                            <label class="col-md-12">Full Name </label>
                                            <div class="col-md-12">
                                                <input 
                                                    type="text" 
                                                    v-model="form.name"
                                                    className="form-control" 
                                                    placeholder="Full Name"
                                                    id="name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12">Password</label>
                                            <div class="col-md-12">
                                                <input 
                                                    type="password" 
                                                    v-model="form.password"
                                                    className="form-control" 
                                                    placeholder="Password"
                                                    id="password">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12">Re-type Password</label>
                                            <div class="col-md-12">
                                                <input 
                                                    type="password" 
                                                    v-model="form.confirmpassword"
                                                    className="form-control" 
                                                    placeholder="Password"
                                                    id="confirmpassword">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <button class="btn btn-success" type="submit" name="update" id="update" value="update">Update Profile</button>
                                            </div>
                                        </div>
                                    </form>
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