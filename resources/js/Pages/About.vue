<script setup lang="ts">
import PageTitle from '@/components/Typography/PageTitle.vue';
</script>

<template>
    <Head title="About" />
    <PageTitle>About</PageTitle>
    <p class="mt-3">
        This App is a Laravel 11, Vue 3, Inertia application that also uses
        Tailwind and Typescript.
    </p>
    <p class="mt-3">
        It connects to the steam api, a gaming platform used by millions of
        gamers around the world.
    </p>
    <p class="mt-3">
        It is a demonstration, and a way for me to transition my skills to this
        technology stack.
    </p>
    <p class="mt-3">
        Visit my
        <a
            href="https://duncanwhite.co.uk/"
            target="_blank"
            style="text-decoration: underline"
            >blog</a
        >
        for more information.
    </p>
</template>
