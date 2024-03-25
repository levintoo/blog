<script setup>
import { Head, Link } from '@inertiajs/vue3';
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import PrimaryButton from "@/Components/Reused/PrimaryButton.vue";

defineProps({
    users: {
        type: Object,
        default: {},
        required: true,
    }
})
</script>

<template>
    <Head title="Posts" />

    <DashboardLayout>
        <template #breadcrumbs>
            <span class="text-primary">/</span>
            users
        </template>

        <div class="pb-12 pt-1">
            <div class="max-w-7xl mx-auto">
                <div class="flex justify-end">
                    <Link href="/dashboard/users/create">
                        <PrimaryButton class="mb-6">
                            New
                        </PrimaryButton>
                    </Link>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="overflow-x-auto shadow-md sm:rounded-lg">
                        <div class="inline-block min-w-full align-middle">
                            <div class="overflow-scroll ">
                                <table class="min-w-full divide-y divide-gray-200 table-fixed">
                                    <thead class="bg-gray-100">
                                    <tr>
                                        <th title="status" scope="col" class="p-4">
                                            <div class="flex items-center">
                                                <input disabled id="checkbox-all" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 focus:ring-2">
                                                <label for="checkbox-all" class="sr-only">checkbox</label>
                                            </div>
                                        </th>
                                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                            Name
                                        </th>
                                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                            Email
                                        </th>
                                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase ">
                                            Joined
                                        </th>
                                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                            Trashed
                                        </th>
                                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                            Actions
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200 overflow-x-auto">
                                    <tr v-for="user in users.data" class="hover:bg-gray-100">
                                        <td :title="user.trashed || !user.verified ? 'inactive' : 'active' " class="p-4 w-4">
                                            <div class="flex items-center">
                                                <input disabled id="checkbox-table-1" type="checkbox" :class="user.verified ? 'text-green-600 bg-green-100 border-green-300' : '' " class="w-4 h-4 rounded text-gray-600 bg-gray-100 border-gray-300">
                                                <label for="checkbox-table-1" class="sr-only">checkbox</label>
                                            </div>
                                        </td>
                                        <td :title="user.name" class="py-4 px-6 text-sm font-medium text-gray-900">
                                            {{ user.name }}
                                        </td>
                                        <td :title="user.email" class="py-4 px-6 text-sm font-medium text-gray-900">
                                            {{ user.email }}
                                        </td>
                                        <td :title="user.name" class="py-4 px-6 text-sm font-medium text-gray-900">
                                            {{ user.created }}
                                        </td>
                                        <td :title="user.name" class="py-4 px-6 text-sm font-medium text-gray-900">
                                            {{ user.trashed ?? '-' }}
                                        </td>
                                        <td :title="user.name" class="py-4 px-6 text-sm font-medium text-gray-900 space-x-3">
                                            <template v-if="$page.props.auth.user.email !== user.email ">
                                                <template v-if="!user.trashed">
                                                    <Link method="DELETE" as="button" class="underline hover:text-orange-400" :href="`/dashboard/users/${user.id}/delete/soft`">
                                                        Soft Delete
                                                    </Link>
                                                </template>
                                                <Link title="Restore soft deleted user" v-else method="PATCH" as="button" class="underline hover:text-green-600" :href="`/dashboard/users/${user.id}/restore`">
                                                    Restore
                                                </Link>
                                                <Link title="Remove permanently" method="DELETE" as="button" class="underline text-red-500 hover:text-red-400" :href="`/dashboard/users/${user.id}/delete/force`">
                                                    Delete
                                                </Link>
                                            </template>
                                            <span title="Actions available for logged in account" v-else>-</span>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </DashboardLayout>
</template>
