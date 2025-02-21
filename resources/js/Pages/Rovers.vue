<script setup lang="ts">
import PageTitle from '@/components/Typography/PageTitle.vue';
import axios, { type AxiosResponse } from 'axios';
import { ref } from 'vue';
// @ts-expect-error - type error as 3rd party library has no types
import { MoonLoader } from 'vue3-spinner';

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

console.log('hello from marsss');
</script>

<template>
    <Head title="Rovers" />
    <PageTitle>Rovers</PageTitle>

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
            class="xs:grid-cols-2 grid grid-cols-3 border-t border-stroke px-4 py-4.5 dark:border-strokedark md:px-6 2xl:px-7.5"
        >
            <div class="flex items-center">
                <p class="font-medium">Image</p>
            </div>
            <div class="flex items-center">
                <p class="font-medium">
                    Camera <span class="hidden md:inline-block">Name</span>
                </p>
            </div>
            <div class="flex items-center">
                <p class="font-medium">Date</p>
            </div>
        </div>

        <!-- Table Rows -->
        <div
            v-for="photo in responseData.photos.slice(0, 5)"
            :key="photo.id"
            class="xs:grid-cols-2 grid grid-cols-3 border-t border-stroke px-4 py-4.5 dark:border-strokedark md:px-6 2xl:px-7.5"
        >
            <div class="flex items-center">
                <div class="flex flex-col gap-4 sm:flex-row sm:items-center">
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
            <div class="flex items-center">
                <p class="text-sm font-medium text-black dark:text-white">
                    <span class="md:hidden">{{ photo.camera.name }}</span>
                    <span class="hidden md:block">{{
                        photo.camera.full_name
                    }}</span>
                </p>
            </div>
            <div class="flex items-center">
                <p class="text-sm font-medium text-black dark:text-white">
                    {{ photo.earth_date }}
                </p>
            </div>
        </div>
    </div>
    <div class="flex justify-center py-50" v-else>
        <MoonLoader color="#aeb7c0" />
    </div>
</template>
