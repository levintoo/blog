<script setup>
import {ref} from "vue";
import {Link} from "@inertiajs/vue3";
import Hamburger from "@/Components/Icons/Hamburger.vue";
import SidebarItems from "@/Components/Shared/SidebarItems.vue";
import Footer from "@/Components/Shared/Footer.vue";

const isOpen = ref(false)

const toggleSidebar = () => {
    isOpen.value = !isOpen.value
}
</script>

<template>
    <div class="bg-background min-h-screen">
        <div class="mx-auto max-w-screen-2xl">

            <div class="relative lg:flex max-w-screen overflow-x-clip">
                <!-- main content -->
                <div class="w-full py-4 sm:px-5">

                    <div class="flex items-center justify-between px-5 py-1">
                        <h3 class="tracking-wide text-gray-700 text-sm flex space-x-1.5">
                            <Link href="/">levintoo.com</Link>
                            <span class="text-primary"> / </span>
                            <slot name="breadcrumbs">
                                <span>Home</span>
                            </slot>
                        </h3>
                        <button class="flex" @click="toggleSidebar">
                            <Hamburger class="text-gray h-8 w-auto rounded-md border-2 border-primary"/>
                        </button>
                    </div>

                    <slot/>

                </div>

                <!-- right sidebar -->
                <nav :class="isOpen ? 'translate-x-0 border shadow-lg' : 'translate-x-full'" class="z-50 transition-all ease-in-out bg-[#f5f7f9] absolute top-0 right-0
            lg:min-h-screen w-[80%] sm:w-[60%] md:w-[50%] lg:w-[35%] pr-5 text-gray-800 space-x-4 space-y-6 border-r">
                    <SidebarItems @toggle-sidebar="toggleSidebar"/>
                </nav>
            </div>

            <Footer />

        </div>
    </div>
</template>
