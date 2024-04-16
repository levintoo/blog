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
import Person from "@/Components/Icons/Person.vue";
import Assets from "@/Components/Icons/Assets.vue";

;

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
        <Link href="/" class="flex items-center space-x-2">
            <Levin class="w-auto text-gray-700 h-9"/>
            <p class="py-4 text-xl font-semibold">levintoo<span class="text-primary">.</span>com</p>
        </Link>
        <button :class="isDashboard ? 'lg:hidden' : '' " class="flex" @click="$emit('toggle-sidebar')">
            <Close class="text-gray h-8 w-auto text-primary"/>
        </button>
    </div>

    <template v-if="!$page.url.startsWith('/dashboard')">
        <Link :class="$page.url === '/posts/top' ? 'text-primary font-medium' : '' "
              class="flex items-center space-x-3 hover:text-primary/80" href="/posts/top">
            <Fire class="w-auto h-5 text-primary"/>
            <span class="text-sm">Top Posts</span>
        </Link>
        <Link :class="$page.url === '/posts/latest' ? 'text-primary font-medium' : '' "
              class="flex items-center space-x-3 hover:text-primary/80" href="/posts/latest">
            <Post class="w-auto h-5"/>
            <span class="text-sm">Latest Posts</span>
        </Link>
    </template>

    <Link :class="$page.url === '/' ? 'text-primary font-medium' : '' "
          class="flex items-center space-x-3 hover:text-primary/80" href="/">
        <Home class="w-auto h-5"/>
        <p class="text-sm">Home</p>
    </Link>

    <template v-if="!$page.url.startsWith('/dashboard')">
        <hr/>
        <Link href="/" class="hidden items-center space-x-3">
            <Search class="w-auto h-5"/>
            <p class="text-sm text-gray-800">Search</p>
        </Link>
        <Link :class="$page.url === '/about' ? 'text-primary font-medium' : '' "
              class="flex items-center space-x-3 hover:text-primary/80" href="/about">
            <Info class="w-auto h-5"/>
            <p class="text-sm">About</p>
        </Link>
        <Link :class="$page.url === '/send#contact' ? 'text-primary font-medium' : '' "
              class="flex items-center space-x-3 hover:text-primary/80" href="/about#contact">
            <Send class="w-auto h-5"/>
            <p class="text-sm">Contact</p>
        </Link>
    </template>

    <template v-if="$page?.props?.auth?.user">
        <hr/>
        <div class="space-y-6">
            <h2>Admin</h2>
            <Link :class="$page.url === '/dashboard' ? 'text-primary font-medium' : '' "
                  class="flex items-center space-x-3 hover:text-primary/80" href="/dashboard">
                <Dashboard class="w-auto h-5"/>
                <span class="text-sm">Dashboard</span>
            </Link>
            <Link :class="$page.url === '/dashboard/posts' ? 'text-primary font-medium' : '' "
                  class="flex items-center space-x-3 hover:text-primary/80" href="/dashboard/posts">
                <Post class="w-auto h-5"/>
                <span class="text-sm">Posts</span>
            </Link>
            <Link :class="$page.url === '/dashboard/assets' ? 'text-primary font-medium' : '' "
                  class="flex items-center space-x-3 hover:text-primary/80" href="/dashboard/assets">
                <Assets class="w-auto h-5"/>
                <span class="text-sm">Assets</span>
            </Link>
            <Link :class="$page.url === '/dashboard/users' ? 'text-primary font-medium' : '' "
                  class="flex items-center space-x-3 hover:text-primary/80" href="/dashboard/users">
                <CogWheel class="w-auto h-5"/>
                <span class="text-sm">Users</span>
            </Link>
            <Link :class="$page.url.startsWith('/dashboard/profile') ? 'text-primary font-medium' : '' "
                  class="flex items-center space-x-3 hover:text-primary/80" href="/dashboard/profile">
                <Person class="w-auto h-5"/>
                <span class="text-sm">Profile</span>
            </Link>
            <Link as="button" class="flex items-center space-x-3 hover:text-primary/80" href="/logout" method="POST">
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
            <a rel="noopener noreferrer" target="_blank" class="text-sm" href="https://github.com/levintoo">
                Github
            </a>
        </div>
        <div class="flex items-center space-x-4">
            <div class="text-transparent bg-primary w-[6px] h-[6px] rounded-full">.</div>
            <a rel="noopener noreferrer" target="_blank" class="text-sm" href="https://twitter.com/tooklevin">
                Twitter(X)
            </a>
        </div>
        <div rel="noopener noreferrer" class="flex items-center space-x-4">
            <div class="text-transparent bg-primary w-[6px] h-[6px] rounded-full">.</div>
            <a target="_blank" class="text-sm" href="https://www.linkedin.com/in/levin-kipkemboi">
                Linkedin
            </a>
        </div>
        <div aria-hidden="true"></div>
    </div>
</template>
