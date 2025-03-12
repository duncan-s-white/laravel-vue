<script setup lang="ts">
import Error from '../Forms/Error.vue';

defineProps({
    label: String,
    type: String,
    placeholder: String,
    customClasses: String,
    required: {
        type: Boolean,
        default: false,
    },
    errorText: {
        type: String,
        default: undefined,
    },
});
const model = defineModel();
</script>

<template>
    <div class="mb-4">
        <label class="mb-2.5 block font-medium text-black dark:text-white">{{
            label
        }}</label>
        <div class="relative">
            <input
                v-model="model"
                :type="type"
                :placeholder="placeholder"
                class="w-full rounded-lg border border-stroke bg-transparent py-4 pl-6 pr-10 text-black outline-none focus:border-primary focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
            />

            <span class="absolute right-4 top-4">
                <slot></slot>
            </span>
            <Error v-if="errorText">{{ errorText }}</Error>
        </div>
    </div>
</template>
