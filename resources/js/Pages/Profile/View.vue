<script setup lang="ts">
import BreadcrumbDefault from '@/components/Breadcrumbs/BreadcrumbDefault.vue';
import ProfileCard from '@/components/ProfileCard.vue';
import { ref } from 'vue';

const pageTitle = ref('Profile');
</script>

<template>
    <div class="mx-auto max-w-242.5">
        <!-- Breadcrumb Start -->
        <BreadcrumbDefault :pageTitle="pageTitle" />
        <!-- Breadcrumb End -->
        <ProfileCard />
    </div>
</template>
