<script setup lang="ts">
import DefaultLayout from '@/layouts/DefaultLayout.vue';
import axios, { type AxiosResponse } from 'axios';
import { ref } from 'vue';

interface Iphoto {
    id: number;
    camera: {
        name: string;
        full_name: string;
    };
    img_src: string;
    earth_date: string;
}

interface Iphotos {
    photos: Iphoto[];
}

const responseData = ref<Iphotos | null>(null);
const error = ref(null);

axios
    .get(
        'https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?sol=1000&api_key=dw8hywZQCqYnH8TpIVPlr9r5wlacozjkTlNkprO3&page=1',
    )
    .then(
        (response: AxiosResponse<any>) => (responseData.value = response.data),
    )
    .catch((e) => (error.value = e));
</script>

<template>
    <DefaultLayout>
        <h2 class="mb-10 text-title-md2 font-bold text-black dark:text-white">
            Rovers
        </h2>

        <div
            v-if="responseData"
            class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark"
        >
            <div class="px-4 py-6 md:px-6 xl:px-7.5">
                <h4 class="text-xl font-bold text-black dark:text-white">
                    Curiosity
                </h4>
            </div>

            <!-- Table Header -->
            <div
                class="grid grid-cols-6 border-t border-stroke px-4 py-4.5 dark:border-strokedark sm:grid-cols-8 md:px-6 2xl:px-7.5"
            >
                <div class="col-span-3 flex items-center">
                    <p class="font-medium">Image</p>
                </div>
                <div class="col-span-2 hidden items-center sm:flex">
                    <p class="font-medium">Camera Name</p>
                </div>
                <div class="col-span-1 flex items-center">
                    <p class="font-medium">Date</p>
                </div>
            </div>

            <!-- Table Rows -->
            <div
                v-for="photo in responseData.photos"
                :key="photo.id"
                class="grid grid-cols-6 border-t border-stroke px-4 py-4.5 dark:border-strokedark sm:grid-cols-8 md:px-6 2xl:px-7.5"
            >
                <div class="col-span-3 flex items-center">
                    <div
                        class="flex flex-col gap-4 sm:flex-row sm:items-center"
                    >
                        <div class="h-12.5 w-15 rounded-md">
                            <a :href="photo.img_src" target="_blank">
                                <img
                                    :src="photo.img_src"
                                    :alt="`Product: ${photo.img_src}`"
                                />
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-span-2 hidden items-center sm:flex">
                    <p class="text-sm font-medium text-black dark:text-white">
                        {{ photo.camera.name }}
                    </p>
                </div>
                <div class="col-span-1 flex items-center">
                    <p class="text-sm font-medium text-black dark:text-white">
                        {{ photo.earth_date }}
                    </p>
                </div>
            </div>
        </div>
        <div class="py-4" v-else>Loading...</div>
    </DefaultLayout>
</template>
