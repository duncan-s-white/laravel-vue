<script setup lang="ts">
const props = defineProps(['pageTitle']);
</script>

<template>
    <nav>
        <ol class="flex items-center gap-2">
            <li>
                <Link class="font-medium" href="/"> Dashboard / </Link>
            </li>
            <li class="font-medium text-primary">{{ props.pageTitle }}</li>
        </ol>
    </nav>
</template>
