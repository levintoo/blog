<script setup>
import { Head } from '@inertiajs/vue3';
import AppLayout from "@/Layouts/AppLayout.vue";

defineProps({
    post: {
        type: Object,
        default: {},
        required: true,
    }
})
</script>

<template>
    <Head>
        <title>{{ post.title }}</title>

        <!-- Primary Meta Tags -->
        <meta name="title" :content="post.title">
        <meta name="description" :content="post.description">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://levintoo.com/">
        <meta property="og:title" :content="post.title">
        <meta property="og:description" :content="post.description">
        <meta property="og:image" :content="`https://levintoo.com/uploads/${post.image}`">

        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="https://levintoo.com/">
        <meta property="twitter:title" :content="post.title">
        <meta property="twitter:description" :content="post.description">
        <meta property="twitter:image" :content="`https://levintoo.com/uploads/${post.image}`">
    </Head>

    <AppLayout>
        <template #breadcrumbs>
            <span class="hidden lg:flex">{{ post.title }}</span>
            <span class="lg:hidden">post</span>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto space-y-4">
                <div class="px-2 lg:px-0 mx-auto prose text-lg leading-loose" v-html="post.body"></div>
            </div>
        </div>
    </AppLayout>
</template>

<style>
.prose h1 {
    @apply text-3xl tracking-wide
}
</style>
