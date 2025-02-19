<script setup lang="ts">
import type { PropType } from 'vue';

interface Games {
    data: Array<{
        id: number;
        appid: number;
        name: string;
    }>;
    links: Array<{
        active: boolean;
        label: string;
        url: string;
    }>;
}
defineProps({
    games: {
        type: Object as PropType<Games>,
        required: true,
    },
});
</script>

<template>
    <Head title="Games" />
    <h2 class="mb-10 text-title-md2 font-bold text-black dark:text-white">
        Games
    </h2>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table
            class="w-full text-left text-sm text-gray-500 dark:text-gray-400 rtl:text-right"
        >
            <thead
                class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400"
            >
                <tr>
                    <th scope="col" class="px-6 py-3">Name</th>
                    <th scope="col" class="px-6 py-3">Steam appid</th>
                    <th scope="col" class="px-6 py-3">View</th>
                </tr>
            </thead>
            <tbody>
                <tr
                    v-for="game in games.data"
                    :key="game.id"
                    class="border-b border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-800"
                >
                    <th
                        scope="row"
                        class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white"
                    >
                        {{ game.name }}
                    </th>
                    <td class="px-6 py-4">{{ game.appid }}</td>
                    <td class="px-6 py-4">
                        <Link
                            :href="`games/${game.appid}`"
                            class="font-medium text-blue-600 hover:underline dark:text-blue-500"
                            >View
                        </Link>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <nav class="flex justify-center" aria-label="Page navigation example">
        <ul class="mt-4 inline-flex h-10 text-base">
            <li v-for="(link, index) in games.links" :key="link.label">
                <Link
                    v-if="link.url"
                    :href="link.url"
                    class="ms-0 flex h-10 items-center justify-center border border-e-0 border-gray-300 px-4 leading-tight"
                    :class="{
                        'bg-white text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white':
                            !link.active,
                        'border-gray-300 bg-blue-50 text-blue-600 hover:bg-blue-100 hover:text-blue-700 dark:border-e dark:bg-gray-700 dark:text-white':
                            link.active,
                        'xs:flex rounded-s-lg': index == 0,
                        'xs:flex rounded-e-lg': index == games.links.length - 1,
                        'hidden lg:flex':
                            index != 0 &&
                            index != 1 &&
                            index != games.links.length - 1 &&
                            index != games.links.length - 2 &&
                            !link.active,
                    }"
                >
                    <span v-html="link.label"></span>
                </Link>
                <span
                    v-else
                    v-html="link.label"
                    class="ms-0 flex h-10 items-center justify-center border border-e-0 border-gray-300 bg-white px-4 leading-tight text-gray-500 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400"
                    :class="{
                        'xs:flex rounded-s-lg': index == 0,
                        'rounded-e-lg': index == games.links.length - 1,
                    }"
                ></span>
            </li>
        </ul>
    </nav>
</template>
