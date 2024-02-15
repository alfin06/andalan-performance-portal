<script setup>
import { useForm, router, Head } from "@inertiajs/vue3";
import { BaseTransition } from "vue";
import {useLoading} from 'vue-loading-overlay';

const form = useForm({
    email: '',
    password: '',
});

const $loading = useLoading({
        loader: 'dots',
        color: '#4F7942'
    });

const props = defineProps({
    failed: {
        type: String,
        required: false
    }
});

function auth() {
    const loader = $loading.show({
        });
    // simulate AJAX
    setTimeout(() => {
        loader.hide()
    }, 3000);
    router.post('login', form);
}
</script>

<style>
.parent {
    background-image:url('/images/background.png');
    background-size:cover;
    position:fixed;
    height:100vh;
}

.card-header {
    background-color:black;
}

#logo {
    width:60%;
}
</style>

<template>
    <Head title="Login" />
    <loading v-model:active="isLoading"
                 :can-cancel="true"
                 :on-cancel="onCancel"
                 :is-full-page="fullPage" />
    <div className="parent">
        <div className="row my-5">
            <div className="col-md-6 mx-auto">
                <div v-if="failed" class="text-white bg-danger p-2 rounded my-2 text-center">{{ failed }}</div>
                <div className="card">
                    <div className="card-header">
                        <div className="text-center mt-2">
                            <img id="logo" src="/images/andalan-logo.png" alt="Andalan Performance Logo" />
                        </div>
                    </div>
                    <div className="card-body">
                        <form @submit.prevent="auth" id="loginForm" ref="formContainer" class="form-horizontal form-material text-center">
                            <div class="form-group">
                                <label htmlFor="email" className="form-label">Email</label>
                                <input 
                                    type="text" 
                                    v-model="form.email"
                                    className="form-control text-center" 
                                    placeholder="Enter your email"
                                    id="email">
                                <div v-if="form.errors.email" class="text-white bg-danger p-2 rounded my-2">{{ form.errors.email }}</div>
                            </div>
                            <div class="form-group">
                                <label htmlFor="password" className="form-label">Password</label>
                                <input 
                                    type="password" 
                                    v-model="form.password"
                                    className="form-control text-center" 
                                    placeholder="Enter your password"
                                    id="password">
                                <div v-if="form.errors.password" class="text-white bg-danger p-2 rounded my-2">{{ form.errors.password }}</div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-info btn-block" :disabled="form.processing" :class="{ 'opacity-25': form.processing }" >
                                    Login
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>