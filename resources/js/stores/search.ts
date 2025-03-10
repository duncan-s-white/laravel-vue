import { defineStore } from 'pinia';
import { ref } from 'vue';

export const useSearchStore = defineStore('search', () => {
    const searchTerm = ref<string | undefined>(undefined);

    function clearSearch() {
        searchTerm.value = undefined;
        const mainSearch = document.getElementById('main-search');
        if (mainSearch) {
            // @ts-ignore:
            mainSearch.value = '';
        }
    }

    function search(term: string) {
        searchTerm.value = term;
    }

    return { searchTerm, search, clearSearch };
});
