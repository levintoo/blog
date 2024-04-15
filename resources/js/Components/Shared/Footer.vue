<template>
    <div class="py-4 sm:px-5 bg-gray-200/50 z-0">
        <footer class="relative pt-8 pb-6 px-5">
            <div class="container mx-auto px-4">
                <div class="flex flex-wrap text-left lg:text-left">
                    <div class="lg:w-2/5 px-4 space-y-4">
                        <p class="text-3xl font-semibold text-gray-700">Let's keep in touch!</p>
                        <p class="text-lg mt-0 mb-2 text-blueGray-600">
                            Find me on any of these platforms.
                        </p>
                        <div class="mt-6 lg:mb-0 mb-6 flex">
                            <a rel="noopener noreferrer" target="_blank" href="https://twitter.com/tooklevin" class="flex items-center justify-center bg-white text-gray-400 hover:test-gray-800 shadow-lg font-normal h-10 w-10 rounded-full outline-none focus:outline-none mr-2" type="button">
                                <span class="sr-only">twitter</span>
                                <Twitter />
                            </a>
                            <a rel="noopener noreferrer" target="_blank" href="https://www.linkedin.com/in/levin-kipkemboi" class="flex items-center justify-center bg-white text-gray-400 hover:test-gray-800 shadow-lg font-normal h-10 w-10 rounded-full outline-none focus:outline-none mr-2" type="button">
                                <span class="sr-only">linkedin</span>
                                <Linkedin />
                            </a>
                            <a rel="noopener noreferrer" target="_blank" href="https://instagram.com/too_levin" class="flex items-center justify-center bg-white text-gray-400 hover:test-gray-800 shadow-lg font-normal h-10 w-10 rounded-full outline-none focus:outline-none mr-2" type="button">
                                <span class="sr-only">instagram</span>
                                <Instagram />
                            </a>
                            <a rel="noopener noreferrer" target="_blank" href="https://github.com/levintoo" class="flex items-center justify-center bg-white text-gray-400 hover:test-gray-800 shadow-lg font-normal h-10 w-10 rounded-full outline-none focus:outline-none mr-2" type="button">
                                <span class="sr-only">github</span>
                                <Github />
                            </a>
                        </div>
                    </div>
                    <div class="lg:w-3/5 px-4">
                        <div class="flex flex-wrap items-top space-y-4 lg:space-y-0 mt-6 lg:mt-0">
                            <div class="w-full lg:w-1/3 lg:px-4 ml-auto space-y-2.5">
                                <span class="block text-gray-800 font-semibold">Top Picks</span>
                                <ul class="space-y-2">
                                    <li>
                                        <Link href="/top-web-development-tools-i-use" class="underline hover:text-gray-800 block text-sm">
                                            Top web development tools
                                        </Link>
                                    </li>
                                    <li>
                                        <Link href="/a-step-by-step-guide-to-upgrade-to-laravel-11" class="underline hover:text-gray-800 block text-sm">
                                            Laravel 11 upgrade guide
                                        </Link>
                                    </li>
                                </ul>
                            </div>
                            <div class="w-full lg:w-1/3 lg:px-4 ml-auto space-y-2.5">
                                <span class="block text-gray-800 font-semibold">Navigation</span>
                                <ul class="space-y-3">
                                    <li>
                                        <Link class="underline text-blueGray-600 hover:text-gray-800 block text-sm" href="/">Home</Link>
                                    </li>
                                    <li>
                                        <Link class="underline text-blueGray-600 hover:text-gray-800 block text-sm" href="/posts/top">Top Posts</Link>
                                    </li>
                                    <li>
                                        <Link href="/about" class="underline text-blueGray-600 hover:text-gray-800 block text-sm">About</Link>
                                    </li>
                                    <li>
                                        <Link href="/about#contact" class="underline text-blueGray-600 hover:text-gray-800 block text-sm">Contact</Link>
                                    </li>
                                </ul>
                            </div>
                            <div class="w-full lg:w-1/3 lg:px-4 ml-auto space-y-2.5">
                                <span class="block text-gray-800 font-semibold">Others</span>
                                <ul class="space-y-3">
                                    <li>
                                        <Link class="underline text-blueGray-600 hover:text-gray-800 block text-sm" href="/terms-of-service">Terms of Service</Link>
                                    </li>
                                    <li>
                                        <Link class="underline text-blueGray-600 hover:text-gray-800 block text-sm" href="/privacy-policy">Privacy policy</Link>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-6 border-gray-300">
                <div class="flex flex-wrap items-center md:justify-between justify-center">
                    <div class="w-full px-4 mx-auto text-center">
                        <div class="text-gray-800">
                            © {{ new Date().getFullYear() }} all rights reserved. Proudly hosted on <a target="_blank" href="https://www.digitalocean.com/" class="underline">DigitalOcean</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</template>

<script setup>
import {Link} from "@inertiajs/vue3";
import Twitter from "@/Components/Icons/Twitter.vue";
import Github from "@/Components/Icons/Github.vue";
import Linkedin from "@/Components/Icons/Linkedin.vue";
import Instagram from "@/Components/Icons/Instagram.vue";
</script>
