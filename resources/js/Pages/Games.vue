<script setup lang="ts">
import AlertWarning from '@/components/Alerts/AlertWarning.vue';
import InputGroup from '@/components/Forms/InputGroup.vue';
import PageTitle from '@/components/Typography/PageTitle.vue';
import { router } from '@inertiajs/vue3';
import { ref, watch, type PropType } from 'vue';

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

let props = defineProps({
    games: {
        type: Object as PropType<Games>,
        required: true,
    },
    filters: Object,
});

let search = ref(props && props.filters ? props.filters.search : '');

watch(search, (value) => {
    router.get(
        '/games',
        { search: value },
        { preserveState: true, replace: true },
    );
});
</script>

<template>
    <Head title="Games" />

    <PageTitle> Games </PageTitle>

    <InputGroup
        class="mb-5"
        v-model="search"
        customClasses="inline-block"
        type="text"
        placeholder="Search..."
    />

    <div v-if="games.data.length > 0">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table
                class="w-full text-left text-sm text-gray-500 dark:text-gray-400 rtl:text-right"
            >
                <thead
                    class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400"
                >
                    <tr>
                        <th scope="col" class="px-6 py-3">View</th>
                        <th scope="col" class="px-6 py-3">Name</th>
                        <th scope="col" class="px-6 py-3">Steam appid</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="game in games.data"
                        :key="game.id"
                        class="border-b border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-800"
                    >
                        <td class="px-6 py-4">
                            <Link
                                :href="`games/${game.appid}`"
                                class="font-medium hover:underline"
                                ><svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512"
                                    class="fill-current"
                                    width="30"
                                    height="18"
                                >
                                    <path
                                        d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"
                                    />
                                </svg>
                            </Link>
                        </td>
                        <td
                            scope="row"
                            class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white"
                        >
                            {{ game.name }}
                        </td>
                        <td class="px-6 py-4">{{ game.appid }}</td>
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
                            'xs:flex rounded-e-lg':
                                index == games.links.length - 1,
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
    </div>

    <AlertWarning
        v-else
        title="No results"
        text="You search returned no results, please amend you search term"
    />
</template>
