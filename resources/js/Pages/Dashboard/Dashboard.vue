<script setup>
import { Head } from '@inertiajs/vue3';
import DashboardLayout from "@/Layouts/DashboardLayout.vue";

defineProps({
    stats: {
        type: Object,
        default: {},
        required: true,
    }
})
</script>

<template>
    <Head title="Dashboard" />

    <DashboardLayout>
        <template #breadcrumbs>
            <span class="text-primary">/</span>
            dashboard
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto space-y-3">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">{{ stats.active.toLocaleString() }} active posts</div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">{{ stats.unlisted.toLocaleString() }} unlisted posts</div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">{{ stats.public.toLocaleString() }} public posts</div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">{{ stats.trashed.toLocaleString() }} trashed posts</div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">{{ stats.total.toLocaleString() }} total posts</div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">{{ stats.users.toLocaleString() }} total users</div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">{{ stats.assets.toLocaleString() }} post assets</div>
                </div>
            </div>
        </div>
    </DashboardLayout>
</template>
