<script setup lang="ts">
import { useSidebarStore } from '@/stores/sidebar';
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';

const sidebarStore = useSidebarStore();

const props = defineProps(['items', 'page']);
const items = ref(props.items);

const handleItemClick = (index: number) => {
    const pageName =
        sidebarStore.selected === props.items[index].label
            ? ''
            : props.items[index].label;
    sidebarStore.selected = pageName;
    if (sidebarStore.isSidebarOpen) sidebarStore.toggleSidebar();
};
</script>

<template>
    <ul class="mb-5.5 mt-4 flex flex-col gap-2.5 pl-6">
        <template v-for="(childItem, index) in items" :key="index">
            <li v-if="childItem.display !== false">
                <Link
                    :href="childItem.route"
                    :method="childItem.method"
                    @click="handleItemClick(index)"
                    class="group relative flex items-center gap-2.5 rounded-md px-4 font-medium text-bodydark2 duration-300 ease-in-out hover:text-white"
                    :class="{
                        '!text-white':
                            childItem.label === sidebarStore.selected,
                    }"
                >
                    {{ childItem.label }}
                </Link>
            </li>
        </template>
    </ul>
</template>
