<script setup lang="ts">
defineProps(['label', 'route', 'customClasses']);
</script>

<template>
    <Link
        :href="route"
        class="inline-flex items-center justify-center gap-2.5 px-10 py-4 text-center font-medium hover:bg-opacity-90 lg:px-8 xl:px-10"
        :class="customClasses"
    >
        <slot></slot>
        {{ label }}
    </Link>
</template>
