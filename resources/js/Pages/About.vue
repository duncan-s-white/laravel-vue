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
    <p class="mt-3">It connects to some free open api's:</p>
    <ul>
        <li>
            Steam - a gaming platform used by millions of gamers around the
            world.
        </li>
        <li>Nasa - images from the Mars Rovers.</li>
    </ul>
    <p class="mt-3">
        It is a demonstration app, showing the porting of a UI theme 'TailAdmin'
        to a laravel Vue application, visit my
        <a
            href="https://duncanwhite.co.uk/"
            target="_blank"
            style="text-decoration: underline"
            >blog</a
        >
        for more information.
    </p>
</template>
