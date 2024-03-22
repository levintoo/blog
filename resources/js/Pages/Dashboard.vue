<script setup>
import { Head } from '@inertiajs/vue3';
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
</script>

<template>
    <Head title="Dashboard" />

    <DashboardLayout>
        <template #breadcrumbs>
            <span class="text-primary">/</span>
            dashboard
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">You're logged in!</div>
                </div>
            </div>
        </div>
    </DashboardLayout>
</template>
