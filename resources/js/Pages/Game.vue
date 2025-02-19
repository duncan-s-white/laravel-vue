<script setup lang="ts">
defineProps({
    game: {
        type: Object,
        required: true,
    },
});
</script>
<template>
    <Head title="game.name" />
    <h2 class="mb-10 text-title-md2 font-bold text-black dark:text-white">
        {{ game.name }}
    </h2>
    <img :src="game.header_image" />
    <p class="my-10" v-html="game.detailed_description"></p>
    <strong v-if="game.legal_notice">Legal Notice:</strong>
    <p>{{ game.legal_notice }}</p>
</template>
