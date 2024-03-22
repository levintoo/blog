<script setup>
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import { Head } from '@inertiajs/vue3';
import DashboardLayout from "@/Layouts/DashboardLayout.vue";

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});
</script>

<template>
    <Head title="Profile" />

    <DashboardLayout>
        <template #breadcrumbs>
            <span class="text-primary"> / </span>
            <span class="">Profile</span>
        </template>

        <div class="py-4">
            <div class="max-w-7xl mx-auto space-y-6 px-2 sm:px-0">
                <div class="p-4 sm:p-8 bg-white/30 border border-white shadow sm:rounded-md">
                    <UpdateProfileInformationForm
                        :must-verify-email="mustVerifyEmail"
                        :status="status"
                        class="max-w-xl"
                    />
                </div>

                <div class="p-4 sm:p-8 border border-white shadow sm:rounded-lg">
                    <UpdatePasswordForm class="max-w-xl" />
                </div>

                <div class="p-4 sm:p-8 border border-white shadow sm:rounded-lg">
                    <DeleteUserForm class="max-w-xl" />
                </div>
            </div>
        </div>
    </DashboardLayout>
</template>
