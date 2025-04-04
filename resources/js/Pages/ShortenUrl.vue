<script setup lang="ts">
import InputGroup from '@/components/Forms/InputGroup.vue';
import PageTitle from '@/components/Typography/PageTitle.vue';
import { useForm } from '@inertiajs/vue3';
const title = 'Url Shortener';

const form = useForm({
    longUrl: '',
});

const submit = () => {
    form.post(route('url.shorten'), {
        onSuccess: () => {
            form.reset('longUrl');
        },
    });
};
</script>

<template>
    <Head @title="title" />
    <PageTitle>{{ title }}</PageTitle>
    <div class="flex justify-center">
        <div class="flex max-w-sm flex-col">
            <p class="mt-3">
                Enter a URL to get a shortened version of the URL.
            </p>
            <form onsubmit="return false" @submit="submit">
                <InputGroup
                    v-model="form.longUrl"
                    type="text"
                    placeholder="URL to Shorten"
                    :errorText="form.errors.longUrl"
                />
                <input
                    type="submit"
                    value="Shorten"
                    class="mt-2 w-full cursor-pointer rounded-lg border border-primary bg-primary p-3 font-medium text-white transition hover:bg-opacity-90"
                />
            </form>
            <div v-if="$page.props.flash.message">
                {{ $page.props.flash.message }}
            </div>
        </div>
    </div>
</template>
