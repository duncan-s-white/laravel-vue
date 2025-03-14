import { useStorage } from '@vueuse/core';
import { defineStore } from 'pinia';
import { ref } from 'vue';

export const useSidebarStore = defineStore('sidebar', () => {
    const isSidebarOpen = ref(false);
    const selected = useStorage('selected', ref('About'));
    const page = useStorage('page', ref('About'));

    function toggleSidebar() {
        isSidebarOpen.value = !isSidebarOpen.value;
    }

    return { isSidebarOpen, toggleSidebar, selected, page };
});
