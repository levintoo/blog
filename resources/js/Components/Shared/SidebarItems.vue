<script setup>
import {Link} from "@inertiajs/vue3";
import Close from "@/Components/Icons/Close.vue";
import Levin from "@/Components/Icons/Levin.vue";
import Dashboard from "@/Components/Icons/Dashboard.vue";
import CogWheel from "@/Components/Icons/CogWheel.vue";
import Power from "@/Components/Icons/Power.vue";
import Search from "@/Components/Icons/Search.vue";
import Fire from "@/Components/Icons/Fire.vue";
import Post from "@/Components/Icons/Post.vue";
import Home from "@/Components/Icons/Home.vue";
import Info from "@/Components/Icons/Info.vue";
import Send from "@/Components/Icons/Send.vue";

defineProps({
    isDashboard: {
        type: Boolean,
        default: false,
    }
})

const emit = defineEmits(['toggle-sidebar'])
</script>

<template>
    <div aria-hidden="true"></div>
    <div class="flex items-center justify-between space-x-2">
        <div class="flex items-center space-x-2">
            <Levin class="w-auto text-gray-700 h-9"/>
            <h1 class="py-4 text-xl font-semibold">levintoo<span class="text-primary">.</span>com</h1>
        </div>
        <button :class="isDashboard ? 'lg:hidden' : '' " class="flex" @click="$emit('toggle-sidebar')">
            <Close class="text-gray h-8 w-auto text-primary"/>
        </button>
    </div>
    <template v-if="!$page.url.startsWith('/dashboard')">
    <div class="flex items-center space-x-3">
        <Fire class="w-auto h-5 text-primary"/>
        <p class="text-sm text-gray-800">Top Posts</p>
    </div>
    <div class="flex items-center space-x-3">
        <Post class="w-auto h-5"/>
        <p class="text-sm text-gray-800">Latest Posts</p>
    </div>
    </template>

    <Link href="/" class="flex items-center space-x-3">
        <Home class="w-auto h-5"/>
        <p class="text-sm text-gray-800">Home</p>
    </Link>
<template v-if="!$page.url.startsWith('/dashboard')">
    <hr/>
    <div class="flex items-center space-x-3">
        <Search class="w-auto h-5"/>
        <p class="text-sm text-gray-800">Search</p>
    </div>
    <a class="flex items-center space-x-3 hover:text-primary/80" href="/public">
        <Info class="w-auto h-5"/>
        <p class="text-sm">About</p>
    </a>
    <a class="flex items-center space-x-3 hover:text-primary/80" href="/public">
        <Send class="w-auto h-5"/>
        <p class="text-sm">Contact</p>
    </a>
</template>
    <template v-if="$page?.props?.auth?.user">
        <hr/>
        <div class="space-y-6">
            <h2>Admin</h2>
            <Link :class="$page.url === '/dashboard' ? 'text-primary font-medium' : '' " class="flex items-center space-x-3 hover:text-primary/80" href="/dashboard">
                <Dashboard class="w-auto h-5"/>
                <span class="text-sm">Dashboard</span>
            </Link>
            <Link :class="$page.url.startsWith('/dashboard/profile') ? 'text-primary font-medium' : '' " class="flex items-center space-x-3 hover:text-primary/80" href="/profile">
                <CogWheel class="w-auto h-5"/>
                <span class="text-sm">Profile</span>
            </Link>
            <Link as="button" class="flex items-center space-x-3 hover:text-primary/80" method="POST" href="/logout">
                <Power class="w-auto h-5"/>
                <span class="text-sm">Logout</span>
            </Link>
        </div>
    </template>
    <hr/>
    <div class="space-y-6">
        <h2>Socials</h2>
        <div class="flex items-center space-x-4">
            <div class="text-transparent bg-primary w-[6px] h-[6px] rounded-full">.</div>
            <a href="/" class="text-sm">
                Github
            </a>
        </div>
        <div class="flex items-center space-x-4">
            <div class="text-transparent bg-primary w-[6px] h-[6px] rounded-full">.</div>
            <a href="/" class="text-sm">
                Twitter(X)
            </a>
        </div>
        <div class="flex items-center space-x-4">
            <div class="text-transparent bg-primary w-[6px] h-[6px] rounded-full">.</div>
            <a href="/" class="text-sm">
                Instagram
            </a>
        </div>
        <div aria-hidden="true"></div>
    </div>
</template>
