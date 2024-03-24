<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AppLayout from "@/Layouts/AppLayout.vue";
import {ref} from "vue";

defineProps({
    latestPosts: {
        type: Object,
        required: true,
        default: {},
    },
    topPosts: {
        type: Object,
        required: true,
        default: {},
    },
});

const isOpen = ref(false)

</script>

<template>
    <Head>
        <title>Level Up Your Programming Skills</title>

        <!-- Primary Meta Tags -->
        <meta name="title" content="Want to Become a Programming Pro? My Posts Will Show You How!">
        <meta name="description"
              content="From essential tips to advanced techniques join me as we learn, share, and grow together. ">

        <!-- Open Graph / Facebook -->
        <meta property="og:title" content="Want to Become a Programming Pro? My Posts Will Show You How!">
        <meta property="og:description"
              content="From essential tips to advanced techniques join me as we learn, share, and grow together. ">
            <meta property="og:image" content="https://levintoo.com/assets/og-image.png">

        <!-- Twitter -->
        <meta property="twitter:url" content="https://levintoo.com/">
        <meta property="twitter:title" content="Want to Become a Programming Pro? My Posts Will Show You How!">
        <meta property="twitter:description"
              content="From essential tips to advanced techniques join me as we learn, share, and grow together. ">
            <meta property="twitter:image" content="https://levintoo.com/assets/og-image.png">
    </Head>

    <AppLayout>
        <div class="w-full">
            <div class="flex flex-col px-5 py-16 space-y-8">
                <p class="text-center text-7xl">🧑🏻‍💻</p>
                <h1
                    class="text-2xl text-center text-gray-800 mx-auto lg:max-w-[80%] font-bold sm:text-3xl md:text-4xl lg:text-4xl tracking-wide">
                    Want to Become a Programming Pro?
                    My Posts Will Show You How!
                </h1>
                <p class="text-center text-gray-800 mx-auto lg:max-w-[83%]">
                    In the world of programming the digital landscape is vast and continuously evolving, there's a lot to explore, and things
                    can change fast. From essential tips to advanced techniques, ready to level up ? join me as we learn, share, and grow together.
                </p>
                <Link href="/posts/latest"
                      class="mx-auto bg-primary text-white font-sm font-medium rounded px-6 py-3 hover:shadow-2xl shadow-primary">
                    Start Reading
                </Link>
            </div>
        </div>

        <div class="w-full py-10 space-y-10 sm:pl-5">
            <h2 class="text-2xl font-semibold text-center text-gray-800">
                Trending articles
            </h2>
            <div class="grid grid-cols-1 px-4 mx-auto sm:grid-cols-2 lg:grid-cols-3 sm:gap-x-12 gap-y-12">
                <article v-if="topPosts?.length > 0" class="space-y-3" v-for="post in topPosts">
                    <Link :href="`/${post.slug}`" class="font-light text-sm bg-white">
                        <img class="mx-auto transition-all ease-in-out rounded delay-50 hover:opacity-80 hover:shadow-lg"
                             :src="`/uploads/${post.image}`" :alt="post.title" />
                    </Link>
                    <div class="space-y-3 lg:px-1">
                        <Link :href="`/${post.slug}`" class="font-medium text-sm text-blue-700 underline hover:text-blue-900">
                            {{ post.title }}
                        </Link>
                        <p class="text-sm text-gray-900">
                            {{ post.description }}
                        </p>
                        <p class="text-gray-600 text-sm font-light">Posted {{ post.created}}
                        </p>
                        <div class="space-x-2 space-y-2">
                            <button
                                class="px-1 py-1/1 text-xs font-light border rounded whitespace-nowrap w-fit">
                                {{ post.tag }}
                            </button>
                        </div>
                    </div>
                </article>
                <span v-else class="text-gray-500">Looks like there are no articles yet</span>
            </div>
        </div>

        <div class="w-full py-10 space-y-10 sm:pl-5">
            <h2 class="text-2xl font-semibold text-center text-gray-800">
                Latest articles
            </h2>
            <div class="grid grid-cols-1 px-4 mx-auto sm:grid-cols-2 lg:grid-cols-3 sm:gap-x-12 gap-y-12">
                <article v-if="latestPosts?.length > 0" class="space-y-3" v-for="post in latestPosts">
                    <Link :href="`/${post.slug}`" class="font-light text-sm bg-white">
                        <img class="mx-auto transition-all ease-in-out rounded delay-50 hover:opacity-80 hover:shadow-lg"
                             :src="`/uploads/${post.image}`" :alt="post.title" />
                    </Link>
                    <div class="space-y-3 lg:px-1">
                        <Link :href="`/${post.slug}`" class="font-medium text-sm text-blue-700 underline hover:text-blue-900">
                            {{ post.title }}
                        </Link>
                        <p class="text-sm text-gray-900">
                            {{ post.description }}
                        </p>
                        <p class="text-gray-600 text-sm font-light">Posted {{ post.created}}
                        </p>
                        <div class="space-x-2 space-y-2">
                            <button
                                class="px-1 py-1/1 text-xs font-light border rounded whitespace-nowrap w-fit">
                                {{ post.tag }}
                            </button>
                        </div>
                    </div>
                </article>
                <span v-else class="text-gray-500">Looks like there are no articles yet</span>
            </div>
        </div>
    </AppLayout>
</template>
