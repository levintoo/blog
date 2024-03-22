<script setup>
import {ref} from "vue";
import {Link} from "@inertiajs/vue3";
import Hamburger from "@/Components/Icons/Hamburger.vue";
import RightSidebar from "@/Components/Shared/RightSidebar.vue";

const isOpen = ref(false)

const toggleSidebar = () => {
    isOpen.value = !isOpen.value
}
</script>

<template>
    <div class="bg-[#dce3eb]/30 min-h-screen">
        <div class="mx-auto max-w-screen-2xl">

            <div class="relative lg:flex max-w-screen overflow-x-clip">
                <!-- main content -->
                <div class="w-full py-4 sm:px-5">
                    <div class="w-full">
                            <div class="flex items-center justify-between px-5 py-1">
                                <h1 class="tracking-wide">
                                    <Link href="http://localhost:8000/">levintoo.com</Link>
                                    <span class="text-primary">/</span>
                                    home
                                    <slot name="breadcrumbs" />
                                </h1>
                                <button @click="toggleSidebar" class="flex">
                                    <Hamburger class="text-gray h-8 w-auto rounded-md border-2 border-primary" />
                                </button>
                            </div>

                        <slot />

                    </div>
                </div>

                <!-- right sidebar -->
                <RightSidebar :is-open @toggle-sidebar="toggleSidebar" />
            </div>

            <div class="py-4 sm:px-5">
                <footer class="px-5">
                    footer
                </footer>
            </div>

        </div>
    </div>
</template>
