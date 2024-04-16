<script setup>
import {Head, Link, router} from '@inertiajs/vue3';
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import PrimaryButton from "@/Components/Reused/PrimaryButton.vue";
import Pagination from "@/Components/Reused/Pagination.vue";
import Dots from "@/Components/Icons/Dots.vue";
import {ref} from "vue";
import TrashCan from "@/Components/Icons/TrashCan.vue";

defineProps({
    assets: {
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

const deleteAsset = (id) => {
    if(!confirm('Are you sure you want to continue, this is a destructive action')) return
    router.delete(`/dashboard/assets/${id}/delete/force`, {
        preserveScroll: true,
        preserveState: true,
    })
}

function copyText(text) {
    if (navigator.clipboard) {
        navigator.clipboard.writeText(text)
    } else {
        // Old API: document.execCommand
        const textArea = document.createElement("textarea");
        textArea.value = text;
        textArea.style.top = "0";
        textArea.style.left = "0";
        textArea.style.position = "fixed";
        document.body.appendChild(textArea);
        textArea.focus();
        textArea.select();
        document.execCommand('copy');
        document.body.removeChild(textArea);
    }
}
</script>

<template>
    <Head title="Assets" />

    <DashboardLayout>
        <template #breadcrumbs>
            <span class="text-primary">/</span>
            assets
        </template>

        <div class="pb-12 pt-1">
            <div class="max-w-7xl mx-auto">
                <div class="flex justify-end">
                    <Link href="/dashboard/assets/create">
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
                                                Size
                                            </th>
                                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                File
                                            </th>
                                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                Created
                                            </th>
                                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                        <tr v-for="asset in assets.data" class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                            <td class="p-4 w-4">
                                                <div class="flex items-center">
                                                    <input disabled id="checkbox-table-1" type="checkbox" :class="asset.trashed ? ' text-red-600 bg-red-100 border-red-300' : '' " class="w-4 h-4 text-green-600 bg-green-100 rounded border-green-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="checkbox-table-1" class="sr-only">checkbox</label>
                                                </div>
                                            </td>
                                            <td title="open in new tab" class="py-4 px-6 text-sm font-medium text-gray-900 dark:text-white">
                                                <a target="_blank" :href="asset.filePath" class="hover:text-blue-500 hover:underline">
                                                    {{ asset.title }}
                                                </a>
                                            </td>
                                            <td title="copy url" class="py-4 px-6 text-sm font-medium text-gray-900 dark:text-white">
                                                {{ asset.fileSize }}
                                            </td>
                                            <td :title="`copy url of ${asset.title}`" class="py-4 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">
                                                <button class="underline hover:text-blue-600" @click="copyText(asset.filePath)">
                                                    <img class="h-28 w-auto rounded shadow hover:opacity-80" :src="asset.filePath" :alt="asset.title" />
                                                </button>
                                            </td>

                                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ asset.created }}
                                            </td>

                                            <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap space-x-3">
                                                <div class="relative inline-block ">
                                                    <!-- Dropdown toggle button -->
                                                    <button @click="toggleOpenOption(asset.id)" class="relative z-10 block p-2 text-gray-700">
                                                        <Dots />
                                                    </button>

                                                    <!-- Dropdown menu -->
                                                    <div v-show="openOption === asset.id"
                                                         @click="openOption = 0"
                                                         class="flex justify-around space-x-3 px-2 absolute right-10 top-0 z-20 py-2 mt-0 origin-top-right bg-white rounded-md shadow"
                                                    >
                                                        <button @click="deleteAsset(asset.id)" class="underline text-gray-600 hover:text-orange-400">
                                                            <TrashCan class="h-5 w-auto"/>
                                                        </button>
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

                <Pagination class="py-3" v-if="assets.links" :links="assets.links" />
            </div>
        </div>
    </DashboardLayout>
</template>
