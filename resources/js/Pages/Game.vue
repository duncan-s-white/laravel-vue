<script setup lang="ts">
import JustBreadcrumb from '@/components/Breadcrumbs/JustBreadcrumb.vue';
import PageTitle from '@/components/Typography/PageTitle.vue';

defineProps({
    game: {
        type: Object,
        required: true,
    },
});
</script>
<template>
    <Head :title="game.name" />
    <div class="flex grow justify-between">
        <a class="py-2 font-medium" href="#" onclick="window.history.back()">
            <svg
                class="inline-block fill-current pb-1"
                xmlns="http://www.w3.org/2000/svg"
                width="22"
                height="22"
                viewBox="0 0 448 512"
            >
                <path
                    d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"
                />
            </svg>
            Back to Search</a
        >
        <JustBreadcrumb class="hidden sm:block" :pageTitle="game.name" />
    </div>
    <PageTitle>{{ game.name }}</PageTitle>

    <div class="mt-10 flex justify-center">
        <div class="max-w-5xl">
            <img :src="game.header_image" />
            <p class="my-10" v-html="game.detailed_description"></p>
            <strong v-if="game.legal_notice">Legal Notice:</strong>
            <p v-html="game.legal_notice"></p>
        </div>
    </div>
</template>
