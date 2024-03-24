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
<!--                <div class="flex justify-end">-->
<!--                    <Link href="/dashboard/users/create">-->
<!--                        <PrimaryButton class="mb-6">-->
<!--                            New-->
<!--                        </PrimaryButton>-->
<!--                    </Link>-->
<!--                </div>-->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="overflow-x-auto shadow-md sm:rounded-lg">
                        <div class="inline-block min-w-full align-middle">
                            <div class="overflow-scroll ">
                                <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-700">
                                    <thead class="bg-gray-100 dark:bg-gray-700">
                                    <tr>
                                        <th title="status" scope="col" class="p-4">
                                            <div class="flex items-center">
                                                <input disabled id="checkbox-all" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="checkbox-all" class="sr-only">checkbox</label>
                                            </div>
                                        </th>
                                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Name
                                        </th>
                                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Email
                                        </th>
                                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Joined
                                        </th>
                                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Trashed
                                        </th>
                                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Actions
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                    <tr v-for="user in users.data" class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <td class="p-4 w-4">
                                            <div class="flex items-center">
                                                <input disabled id="checkbox-table-1" type="checkbox" :class="user.deleted_at ? ' text-red-600 bg-red-100 border-red-300' : '' " class="w-4 h-4 text-green-600 bg-green-100 rounded border-green-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="checkbox-table-1" class="sr-only">checkbox</label>
                                            </div>
                                        </td>
                                        <td :title="user.name" class="py-4 px-6 text-sm font-medium text-gray-900 dark:text-white">
                                            {{ user.name }}
                                        </td>
                                        <td :title="user.email" class="py-4 px-6 text-sm font-medium text-gray-900 dark:text-white">
                                            {{ user.email }}
                                        </td>
                                        <td :title="user.name" class="py-4 px-6 text-sm font-medium text-gray-900 dark:text-white">
                                            {{ user.created_at }}
                                        </td>
                                        <td :title="user.name" class="py-4 px-6 text-sm font-medium text-gray-900 dark:text-white">
                                            {{ user.deleted_at ?? '-' }}
                                        </td>
                                        <td :title="user.name" class="py-4 px-6 text-sm font-medium text-gray-900 dark:text-white">
                                            <template v-if="$page.props.auth.user.email !== user.email ">
                                                <Link v-if="user.deleted_at" method="PATCH" as="button" class="underline" :href="`/dashboard/users/${user.id}/restore`">
                                                    Restore
                                                </Link>
                                                <Link v-else method="DELETE" as="button" class="underline text-red-500 hover:text-red-400" :href="`/dashboard/users/${user.id}/delete`">
                                                    Soft Delete
                                                </Link>
                                            </template>
                                            <span title="no actions available for logged in account" v-else>-</span>
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
