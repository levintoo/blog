<script setup>
import {Head, Link, router} from '@inertiajs/vue3';
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import PrimaryButton from "@/Components/Reused/PrimaryButton.vue";
import Pagination from "@/Components/Reused/Pagination.vue";
import {ref} from "vue";
import Dots from "@/Components/Icons/Dots.vue";
import TrashCan from "@/Components/Icons/TrashCan.vue";
import Restore from "@/Components/Icons/Restore.vue";

defineProps({
    users: {
        type: Object,
        default: {},
        required: true,
    }
})

const openOption = ref(0)

const toggleOpenOption = (id = 0) => {
    if(openOption.value === id) {
        openOption.value = 0
    } else {
        openOption.value = id
    }
}

const deleteUser = (id) => {
    if(!confirm('Are you sure you want to continue, this is a destructive action')) return
    router.delete(`/dashboard/users/${id}/delete/force`, {
        preserveScroll: true,
        preserveState: true,
    })
}
</script>

<template>
    <Head title="Posts" />

    <DashboardLayout>
        <template #breadcrumbs>
            <span class="text-primary"> / </span>
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
                                        <td :title="user.status" class="p-4 w-4">
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
                                        <td :title="user.name" class="py-4 px-6 text-sm font-medium text-red-500">
                                            {{ user.trashed ?? '-' }}
                                        </td>
                                        <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap space-x-3">
                                            <div class="relative inline-block ">
                                                <!-- Dropdown toggle button -->
                                                <button @click="toggleOpenOption(user.id)" class="relative z-10 block p-2 text-gray-700">
                                                    <Dots />
                                                </button>

                                                <!-- Dropdown menu -->
                                                <div v-show="openOption === user.id"
                                                     @click="openOption = 0"
                                                     class="flex justify-around space-x-3 px-2 absolute right-10 top-0 z-20 py-2 mt-0 origin-top-right bg-white rounded-md shadow"
                                                >
                                                    <template v-if="!user.trashed">
                                                        <Link method="DELETE" as="button" class="underline text-gray-600 hover:text-orange-400" :href="`/dashboard/users/${user.id}/delete/soft`">
                                                            <TrashCan class="h-5 w-auto"/>
                                                        </Link>
                                                    </template>
                                                    <template v-else>
                                                        <Link method="PATCH" as="button" class="text-gray-600 underline" :href="`/dashboard/users/${user.id}/restore`">
                                                            <Restore class="h-5 w-auto"/>
                                                        </Link>
                                                        <button @click="deleteUser(user.id)" class="underline text-gray-600 hover:text-red-400">
                                                            <TrashCan class="h-5 w-auto"/>
                                                        </button>
                                                    </template>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                    <Pagination class="py-3" v-if="users.links" :links="users.links" />
            </div>
        </div>
    </DashboardLayout>
</template>
