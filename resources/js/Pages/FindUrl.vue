<script setup lang="ts">
import InputGroup from '@/components/Forms/InputGroup.vue';
import PageTitle from '@/components/Typography/PageTitle.vue';
import { useForm } from '@inertiajs/vue3';
const title = 'Url Look up';

const form = useForm({
    shortUrl: '',
});

const submit = () => {
    if (form.shortUrl == '') {
        form.errors.shortUrl = 'You must enter a URL';
        return;
    }
    form.get(route('url.look-up'), {
        onSuccess: () => {
            form.reset('shortUrl');
        },
    });
};
</script>

<template>
    <Head @title="title" />
    <PageTitle>{{ title }}</PageTitle>
    <div class="flex justify-center">
        <div class="flex max-w-sm flex-col">
            <p class="mt-3">Enter a Short URL to retrieve your original URL.</p>
            <form onsubmit="return false" @submit="submit">
                <InputGroup
                    v-model="form.shortUrl"
                    type="text"
                    placeholder="URL to look up"
                    :errorText="
                        form.errors.shortUrl || $page.props.errors.shortUrl
                    "
                />
                <input
                    type="submit"
                    value="Look Up"
                    class="mt-2 w-full cursor-pointer rounded-lg border border-primary bg-primary p-3 font-medium text-white transition hover:bg-opacity-90"
                />
            </form>
            <div v-if="$page.props.flash.message" class="mt-4 break-all">
                {{ $page.props.flash.message }}
            </div>
        </div>
    </div>
</template>
