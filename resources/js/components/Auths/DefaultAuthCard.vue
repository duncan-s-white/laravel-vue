<script setup lang="ts">
import AlertWarning from '../Alerts/AlertWarning.vue';
import DarkModeSwitcher from '../Header/DarkModeSwitcher.vue';

const props = defineProps(['subtitle', 'title', 'customClasses']);
</script>

<template>
    <!-- ====== Forms Section Start -->
    <div class="flex max-w-5xl flex-col">
        <div class="flex grow justify-between">
            <Link class="py-2 font-medium" href="/">
                <svg
                    class="inline-block fill-current pb-1"
                    xmlns="http://www.w3.org/2000/svg"
                    width="22"
                    height="22"
                    viewBox="0 0 448 512"
                >
                    <path
                        d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"
                    />
                </svg>
                Return to App</Link
            >
            <DarkModeSwitcher />
        </div>
        <div
            class="mb-5 rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark"
        >
            <div class="flex flex-wrap items-center">
                <div class="hidden w-full lg:block lg:w-1/2">
                    <div class="px-26 py-17.5 text-center">
                        <Link class="mb-5.5 inline-block" href="/">
                            <img
                                class="hidden dark:block"
                                src="@/assets/images/logo/logo.svg"
                                alt="Logo"
                            />
                            <img
                                class="dark:hidden"
                                src="@/assets/images/logo/logo-dark.svg"
                                alt="Logo"
                            />
                        </Link>

                        <p class="font-medium">
                            Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit suspendisse.
                        </p>

                        <span class="mt-15 inline-block">
                            <img
                                src="@/assets/images/illustration/illustration-03.svg"
                                alt="illustration"
                            />
                        </span>
                    </div>
                </div>
                <div
                    class="w-full border-stroke dark:border-strokedark lg:w-1/2 lg:border-l-2"
                >
                    <div class="w-full p-4 sm:p-12.5">
                        <span class="mb-1.5 block font-medium">{{
                            props.subtitle
                        }}</span>
                        <h2
                            class="mb-9 text-2xl font-bold text-black dark:text-white sm:text-title-xl2"
                        >
                            {{ props.title }}
                        </h2>

                        <slot></slot>
                    </div>
                </div>
            </div>
        </div>
        <!-- ====== Forms Section End -->

        <AlertWarning
            title="Demo Aplication"
            text="The authentication in this demo application is functional, however you do not have to provide real data to try it out, as you will not receive any emails."
        />
    </div>
</template>
