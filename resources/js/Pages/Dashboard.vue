<script setup lang="ts">
import DataStatsOne from '@/components/DataStats/DataStatsOne.vue';
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
    <p>Laravel Version: {{ laravelVersion }}</p>
    <p class="mb-5">Vue.js Version: 3.4.0</p>

    <div
        class="grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-6 xl:grid-cols-4 2xl:gap-7.5"
    >
        <DataStatsOne />
    </div>
</template>
