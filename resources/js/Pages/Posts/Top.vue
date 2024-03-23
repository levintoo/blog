<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import {Link} from "@inertiajs/vue3";
</script>

<template>
    <AppLayout>
        <template #breadcrumbs>
            top articles
        </template>

        <div class="w-full py-5 space-y-10">
            <h2 class="text-2xl font-semibold text-center text-gray-800">
                Top articles
            </h2>
            <div class="grid grid-cols-1 px-4 mx-auto sm:grid-cols-2 lg:grid-cols-3 sm:gap-x-12 gap-y-12">
                <article class="space-y-3 w-[95%] lg:w-[90%] mx-auto" v-for="i in [1, 2, 3, 4, 5, 6]">
                    <Link href="/" class="font-light text-sm bg-white">
                        <img class="mx-auto transition-all ease-in-out rounded delay-50 hover:opacity-80 hover:shadow-lg shadow-md"
                             src="/assets/post.svg" alt="post.svg" />
                    </Link>
                    <div class="space-y-3 lg:px-1">
                        <Link href="/" class="font-medium text-sm text-indigo-700 underline hover:text-blue-900">
                            Upgrading
                            Your Laravel
                            Application
                            from 10
                            to 11: A
                            Step-by-Step Guide
                        </Link>
                        <p class="text-sm text-gray-900">
                            Laravel 11 was released recently. This is relevant new change and feature you need to know about.
                        </p>
                        <p class="text-gray-600 text-sm font-light">Posted 29th april,
                            2020
                        </p>
                        <div class="space-x-2 space-y-2">
                            <!--                            <button-->
                            <!--                                class="px-2 py-1 text-xs font-medium text-white bg-red-500 border rounded whitespace-nowrap w-fit">-->
                            <!--                                laravel-->
                            <!--                            </button>-->
                            <!--                            <button-->
                            <!--                                class="px-2 py-1 text-xs font-medium text-white bg-green-500 border rounded whitespace-nowrap w-fit">-->
                            <!--                                vue-->
                            <!--                            </button>-->
                            <button
                                class="px-1 py-1/1 text-xs font-light border rounded whitespace-nowrap w-fit">
                                Laravel
                            </button>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </AppLayout>
</template>
