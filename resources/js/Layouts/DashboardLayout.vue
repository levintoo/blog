<script setup>
import {ref} from "vue";
import {Link} from "@inertiajs/vue3";
import Hamburger from "@/Components/Icons/Hamburger.vue";
import SidebarItems from "@/Components/Shared/SidebarItems.vue";

const isOpen = ref(false)

const toggleSidebar = () => {
    isOpen.value = !isOpen.value
}
</script>

<template>
    <div class="bg-background min-h-screen">
        <div class="mx-auto max-w-screen-2xl">

            <div class="relative lg:flex max-w-screen overflow-x-clip">
                <!-- left sidebar -->
                <nav :class="isOpen ? 'translate-x-0 border shadow-lg' : '-translate-x-full lg:-translate-x-0'" class="absolute lg:static transition-all ease-in-out bg-[#f5f7f9]
            lg:min-h-screen w-[80%] sm:w-[60%] md:w-[50%] lg:w-[30%] lg:pl-1 pr-5 text-gray-800 space-x-4 space-y-6 border-r">
                    <sidebar-items :is-dashboard="true" @toggle-sidebar="toggleSidebar"/>
                </nav>

                <!-- main content -->
                <div class="w-full py-4 sm:px-5">

                    <div class="flex items-center justify-between px-5 lg:px-0 py-1">
                        <h3 class="tracking-wide">
                            <Link href="/dashboard">levintoo.com </Link>
                            <slot name="breadcrumbs"/>
                        </h3>
                        <button class="flex lg:hidden" @click="toggleSidebar">
                            <Hamburger class="text-gray h-8 w-auto rounded-md border-2 border-primary"/>
                        </button>
                    </div>

                    <slot />

                </div>

            </div>

        </div>
    </div>
</template>
