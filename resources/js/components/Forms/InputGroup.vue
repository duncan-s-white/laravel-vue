<script setup lang="ts">
defineProps({
    label: String,
    type: String,
    placeholder: String,
    customClasses: String,
    required: {
        type: Boolean,
        default: false,
    },
});
const model = defineModel();
</script>

<template>
    <div :class="customClasses">
        <label class="mb-2.5 block text-black dark:text-white">
            {{ label }}
            <span v-if="required" class="text-meta-1">*</span>
        </label>
        <input
            v-model="model"
            :type="type"
            :placeholder="placeholder"
            class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
        />
    </div>
</template>
