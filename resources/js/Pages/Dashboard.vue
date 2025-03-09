<script setup lang="ts">
import PageTitle from '@/components/Typography/PageTitle.vue';
defineProps({
    laravelVersion: String,
    canLogin: Boolean,
    canRegister: Boolean,
});
</script>

<template>
    <Head title="Laravel Vue Demo Application" />
    <PageTitle>Laravel Vue.js Application</PageTitle>
    <p class="mt-3">
        This demonstration application is a Laravel Vue.js application.
    </p>
    <p>laravel Version: {{ laravelVersion }}</p>
</template>
