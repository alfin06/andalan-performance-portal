<script setup>
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'
</script>

<template>
    <footer class="footer"> &copy; {{ new Date().getFullYear() }} <a href="https://andalanperformance.com/" alt="Andalan Performance">Andalan Performance</a> | Developed by <a href="https://finicode.com/" alt="Finicode">Finicode</a></footer>
</template>