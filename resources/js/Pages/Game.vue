<script setup lang="ts">
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
    <PageTitle>{{ game.name }}</PageTitle>
    <a href="#" onclick="window.history.back()">Back to Search</a>
    <img :src="game.header_image" />
    <p class="my-10" v-html="game.detailed_description"></p>
    <strong v-if="game.legal_notice">Legal Notice:</strong>
    <p v-html="game.legal_notice"></p>
</template>
