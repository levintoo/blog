<script setup>
import { Head, Link } from '@inertiajs/vue3';
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
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
    <Head :title="post.title" />

    <AppLayout>
        <template #breadcrumbs>
            <Link href="/posts/latest">posts</Link>
            <span class="text-primary"> / </span>
            {{ post.title }}
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto">
                <div class=" mx-auto prose text-lg leading-loose" v-html="post.body"></div>
            </div>
        </div>
    </AppLayout>
</template>
