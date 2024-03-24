<script setup>
import { Head, Link } from '@inertiajs/vue3';
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import PrimaryButton from "@/Components/Reused/PrimaryButton.vue";
import TrashCan from "@/Components/Icons/TrashCan.vue";

defineProps({
    posts: {
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
            posts
        </template>

        <div class="pb-12 pt-1">
            <div class="max-w-7xl mx-auto">
                <div class="flex justify-end">
                    <Link href="/dashboard/posts/create">
                        <PrimaryButton class="mb-6">
                            New
                        </PrimaryButton>
                    </Link>
                </div>
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
                                                    Title
                                                </th>
                                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                    Image
                                                </th>
                                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                    Last action
                                                </th>
                                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                    Actions
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                            <tr v-for="post in posts.data" class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                                <td class="p-4 w-4">
                                                    <div class="flex items-center">
                                                        <input disabled id="checkbox-table-1" type="checkbox" :class="post.trashed ? ' text-red-600 bg-red-100 border-red-300' : '' " class="w-4 h-4 text-green-600 bg-green-100 rounded border-green-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                        <label for="checkbox-table-1" class="sr-only">checkbox</label>
                                                    </div>
                                                </td>
                                                <td :title="post.description" class="py-4 px-6 text-sm font-medium text-gray-900 dark:text-white">
                                                    {{ post.title }}
                                                </td>
                                                <td class="py-4 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">
                                                    <img class="w-52 h-auto" :src="`/uploads/${post.image}`" :alt="post.title" />
                                                </td>
                                                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    <div class="grid space-y-1">
                                                        <span title="created">{{ post.created }}</span>
                                                        <span title="updated" :class="post.updated ? 'text-gray-500' : '' ">{{ post.updated }}</span>
                                                        <span title="deleted" :class="post.trashed ? 'text-red-500' : '' ">{{ post.trashed }}</span>
                                                    </div>
                                                </td>
                                                <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap space-x-3">
                                                    <template v-if="!post.trashed">
                                                        <a target="_blank" class="underline hover:text-blue-600" :href="`/${post.slug}`">
                                                            Preview
                                                        </a>
                                                        <Link class="underline hover:text-blue-600" :href="`/dashboard/posts/edit/${post.id}`">
                                                            Edit
                                                        </Link>
                                                        <Link method="DELETE" as="button" class="underline hover:text-red-400" :href="`/dashboard/posts/${post.id}/delete/soft`">
                                                           Soft Delte
                                                        </Link>
                                                    </template>
                                                    <Link v-else method="PATCH" as="button" class="underline" :href="`/dashboard/posts/${post.id}/restore`">
                                                        Restore
                                                    </Link>
                                                    <Link method="DELETE" as="button" class="underline text-red-500 hover:text-red-400" :href="`/dashboard/posts/${post.id}/delete/force`">
                                                        Delete
                                                    </Link>
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
