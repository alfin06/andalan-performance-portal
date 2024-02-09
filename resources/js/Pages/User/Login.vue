<script setup>
import { useForm, router, Head } from "@inertiajs/vue3";

const form = useForm({
    email: '',
    password: '',
});

const props = defineProps({
    failed: {
        type: String,
        required: false
    }
});

function auth() {
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
    <div className="parent">
        <div className="row my-5">
            <div className="col-md-6 mx-auto">
                <div v-if="failed" class="text-white bg-danger p-2 rounded my-2">{{ failed }}</div>
                <div className="card">
                    <div className="card-header">
                        <div className="text-center mt-2">
                            <img id="logo" src="/images/andalan-logo.png" alt="Andalan Performance Logo" />
                        </div>
                    </div>
                    <div className="card-body">
                        <form @submit.prevent="auth" id="loginForm">
                            <div className="mb-3">
                                <label htmlFor="email" className="form-label">Email</label>
                                <input 
                                    type="text" 
                                    v-model="form.email"
                                    className="form-control" 
                                    placeholder="Email"
                                    id="email">
                                <div v-if="form.errors.email" class="text-white bg-danger p-2 rounded my-2">{{ form.errors.email }}</div>
                            </div>
                            <div className="mb-3">
                                <label htmlFor="password" className="form-label">Password</label>
                                <input 
                                    type="password" 
                                    v-model="form.password"
                                    className="form-control" 
                                    placeholder="Password"
                                    id="password">
                                <div v-if="form.errors.password" class="text-white bg-danger p-2 rounded my-2">{{ form.errors.password }}</div>
                            </div>
                            <div className="mb-3">
                                <button
                                    type="submit" 
                                    className="btn btn-info">
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