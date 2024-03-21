<script setup>
import Close from "@/Components/Icons/Close.vue";
import TrashCan from "@/Components/Icons/TrashCan.vue";
import Levin from "@/Components/Icons/Levin.vue";
import Clock from "@/Components/Icons/Clock.vue";
import List from "@/Components/Icons/List.vue";
import Roadmap from "@/Components/Icons/Roadmap.vue";
import Calendar from "@/Components/Icons/Calendar.vue";
import Dashboard from "@/Components/Icons/Dashboard.vue";

defineProps({
    isOpen : {
        type: Boolean,
        default: false
    }
})
</script>

<template>
    <div v-show="isOpen" :class="isOpen ? 'translate-x-0 border shadow-lg' : 'translate-x-full'" class="transition-all ease-in-out bg-[#f5f7f9] absolute top-0 right-0
            lg:min-h-screen w-[80%] sm:w-[60%] md:w-[50%] lg:w-[35%] pr-5 text-gray-800 space-x-4 space-y-6 border-r">
        <div aria-hidden="true"></div>
        <div class="flex items-center justify-between space-x-2">
            <div class="flex items-center space-x-2">
                <Levin class="w-auto text-gray-700 h-9"/>
                <h1 class="py-4 text-xl font-semibold">levintoo<span class="text-primary">.</span>com</h1>
            </div>
            <button @click="$emit('toggleSidebar')" class="flex">
                <Close class="text-gray h-8 w-auto text-primary"/>
            </button>
        </div>
        <div class="flex items-center space-x-3">
            <Dashboard class="w-auto h-5 text-blue-400"/>
            <p class="text-sm text-gray-800">Top Posts</p>
        </div>
        <div class="flex items-center space-x-3">
            <Clock class="w-auto h-5"/>
            <p class="text-sm text-gray-800">Latest Posts</p>
        </div>
        <hr/>
        <div class="flex items-center space-x-3">
            <List class="w-auto h-5"/>
            <p class="text-sm text-gray-800">Topics</p>
        </div>
        <a href="/" class="flex items-center space-x-3 hover:text-primary/80">
            <Calendar class="w-auto h-5"/>
            <p class="text-sm">Calendar</p>
        </a>
        <!-- <div class="flex items-center space-x-3 rounded-md">
            <IconRoadmap class="w-auto h-5" />
            <p class="text-sm">Roadmap</p>
        </div> -->
        <div class="flex justify-between">
            <div class="flex items-center font-medium space-x-3 text-primary">
                <Roadmap class="w-auto h-5"/>
                <p class="text-sm">Roadmap</p>
            </div>
            <div class="bg-[#fd7e47] w-[20px] h-[20px] p-1 rounded-full flex items-center justify-center">
                <p class="text-[10px] text-white">1</p>
            </div>
        </div>
        <div class="flex items-center space-x-3">
            <TrashCan class="w-auto h-5"/>
            <p class="text-sm text-gray-800">Trash</p>
        </div>
        <hr/>
        <div class="space-y-6">
            <h2>Projects</h2>
            <div class="flex items-center space-x-4">
                <div class="text-transparent bg-primary w-[6px] h-[6px] rounded-full">.</div>
                <p class="text-sm">
                    Foxo
                </p>
            </div>
            <div class="flex items-center space-x-4">
                <div class="text-transparent bg-primary w-[6px] h-[6px] rounded-full">.</div>
                <p class="text-sm">
                    Bettermotion
                </p>
            </div>
            <div class="flex items-center space-x-4">
                <div class="text-transparent bg-[#2238e0] w-[6px] h-[6px] rounded-full">.</div>
                <p class="text-sm">
                    Tynder
                </p>
            </div>
            <div aria-hidden="true"></div>
        </div>
    </div>

</template>
