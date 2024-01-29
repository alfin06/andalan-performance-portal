<template>
    <div>
        <h1>Inertia.js + Vue.js</h1>
        <button @click="counter++">Counter: {{counter}}</button>
    </div>
</template>

<script setup>
import {ref} from 'vue';

let counter = ref(0);
</script>