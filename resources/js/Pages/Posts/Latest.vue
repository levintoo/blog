<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import {Link} from "@inertiajs/vue3";

defineProps({
    posts: {
        type: Object,
        default: {},
        required: true,
    }
})
</script>

<template>
    <AppLayout>
        <template #breadcrumbs>
            latest articles
        </template>

        <div class="w-full py-5 space-y-10">
            <h2 class="text-2xl font-semibold text-center text-gray-800">
                Latest articles
            </h2>
            <div class="grid grid-cols-1 px-4 mx-auto sm:grid-cols-2 lg:grid-cols-3 sm:gap-x-12 gap-y-12">
                <article class="space-y-3 w-[95%] lg:w-[90%] mx-auto" v-for="post in posts.data">
                    <Link :href="`/${post.slug}`" class="font-light text-sm bg-white">
                        <img class="mx-auto transition-all ease-in-out rounded delay-50 hover:opacity-80 hover:shadow-lg shadow-md"
                             :src="`/uploads/${post.image}`" :alt="post.title" />
                    </Link>
                    <div class="space-y-3 lg:px-1">
                        <Link :href="`/${post.slug}`" class="font-medium text-sm text-indigo-700 underline hover:text-blue-900">
                            {{
                                post.title
                            }}
                        </Link>
                        <p class="text-sm text-gray-900">
                            {{ post.description }}
                        </p>
                        <p class="text-gray-600 text-sm font-light">Posted {{ post.created }}
                        </p>
                        <div class="space-x-2 space-y-2">
                            <button
                                class="px-1 py-1/1 text-xs font-light border rounded whitespace-nowrap w-fit">
                                {{ post.tag }}
                            </button>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </AppLayout>
</template>
