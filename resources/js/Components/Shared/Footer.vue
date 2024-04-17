<script setup>
import {Link} from "@inertiajs/vue3";
import Twitter from "@/Components/Icons/Twitter.vue";
import Github from "@/Components/Icons/Github.vue";
import Linkedin from "@/Components/Icons/Linkedin.vue";
import Instagram from "@/Components/Icons/Instagram.vue";
import Levin from "@/Components/Icons/Levin.vue";
</script>

<template>



    <footer class="bg-gray-200/50 px-4 sm:px-14 lg:px-16">
        <div class="space-y-5 lg:space-y-0 py-10 pb-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-0">
            <div class="flex flex-col space-y-3">
                <Link href="/" class="flex items-center space-x-2">
                    <Levin class="w-auto text-gray-700 h-9"/>
                    <p class="text-xl font-semibold">levintoo<span class="text-primary">.</span>com</p>
                </Link>

                <p class="text-gray-800">Let's get in touch. Find me on any of these platforms. </p>

                <div class="flex">
                    <a rel="noopener noreferrer" target="_blank" href="https://twitter.com/tooklevin" class="flex items-center justify-center bg-white text-gray-400 hover:text-black shadow-lg font-normal h-10 w-10 rounded-full outline-none focus:outline-none mr-2" type="button">
                        <span class="sr-only">twitter</span>
                        <Twitter />
                    </a>
                    <a rel="noopener noreferrer" target="_blank" href="https://www.linkedin.com/in/levin-kipkemboi" class="flex items-center justify-center bg-white text-gray-400 hover:text-[#0a66c2] shadow-lg font-normal h-10 w-10 rounded-full outline-none focus:outline-none mr-2" type="button">
                        <span class="sr-only">linkedin</span>
                        <Linkedin />
                    </a>
                    <a rel="noopener noreferrer" target="_blank" href="https://instagram.com/too_levin" class="flex items-center justify-center bg-white text-gray-400 hover:text-[#9f3891] shadow-lg font-normal h-10 w-10 rounded-full outline-none focus:outline-none mr-2" type="button">
                        <span class="sr-only">instagram</span>
                        <Instagram />
                    </a>
                    <a rel="noopener noreferrer" target="_blank" href="https://github.com/levintoo" class="flex items-center justify-center bg-white text-gray-400 hover:text-black shadow-lg font-normal h-10 w-10 rounded-full outline-none focus:outline-none mr-2" type="button">
                        <span class="sr-only">github</span>
                        <Github />
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 col-span-2 gap-4 space-x-2 lg:gap-0">
                <div class="flex flex-col space-y-2">
                    <p class="text-lg font-semibold tracking-wide pb-1">Top picks</p>

                    <ul class="list-disc list-outside marker:text-gray-500 space-x-3 space-y-1">
                        <li class="ml-3">
                            <Link href="/top-web-development-tools-i-use" class="text-sm underline decoration-gray-400 text-gray-900 hover:text-gray-600">
                                Top Web Development Tools
                            </Link>
                        </li>
                        <li>
                            <Link href="/step-by-step-guide-to-upgrade-to-laravel-11" class="text-sm underline decoration-gray-400 text-gray-900 hover:text-gray-600">
                                Laravel 11 Upgrade Guide
                            </Link>
                        </li>
                    </ul>
                </div>

                <div class="flex flex-col space-y-2">
                    <p class="text-lg font-semibold tracking-wide pb-1">Navigation</p>

                    <ul class="list-disc list-outside marker:text-gray-500 space-x-3 space-y-1">
                        <li class="ml-3">
                            <Link href="/" class="text-sm underline decoration-gray-400 text-gray-900 hover:text-gray-800">Home</Link>
                        </li>
                        <li>
                            <Link href="/posts/top" class="text-sm underline decoration-gray-400 text-gray-900 hover:text-gray-800">Top Posts</Link>
                        </li>
                        <li>
                            <Link href="/about" class="text-sm underline decoration-gray-400 text-gray-900 hover:text-gray-800">About</Link>
                        </li>
                        <li>
                            <Link href="/about#contact" class="text-sm underline decoration-gray-400 text-gray-900 hover:text-gray-800">Contact</Link>
                        </li>
                        <li>
                            <Link href="/posts/latest" class="text-sm underline decoration-gray-400 text-gray-900 hover:text-gray-800">Recent Posts</Link>
                        </li>
                    </ul>
                </div>

                <div class="flex flex-col space-y-2">
                    <p class="text-lg font-semibold tracking-wide pb-1">Others</p>

                    <ul class="list-disc list-outside marker:text-gray-500 space-x-3 space-y-1">
                        <li class="ml-3">
                            <Link href="/terms-of-service" class="text-sm underline decoration-gray-400 text-gray-900 hover:text-gray-800">Terms of Service</Link>
                        </li>
                        <li>
                            <Link href="/privacy-policy" class="text-sm underline decoration-gray-400 text-gray-900 hover:text-gray-800">Privacy Policy</Link>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <p class="py-5 border-t border-gray-300 text-center text-gray-900">
            © {{ new Date().getFullYear() }} all rights reserved. Proudly hosted on <a target="_blank" href="https://www.digitalocean.com/" class="underline decoration-gray-400">DigitalOcean</a>
        </p>
    </footer>

<!--    <div class="py-4 sm:px-5 bg-gray-200/50 z-0">-->
<!--        <footer class="relative pt-8 pb-6 px-5">-->
<!--            <div class="container mx-auto px-4">-->
<!--                <div class="flex flex-wrap text-left lg:text-left">-->
<!--                    <div class="lg:w-2/5 px-4 space-y-4">-->
<!--                        <p class="text-3xl font-semibold text-gray-700">Let's keep in touch!</p>-->
<!--                        <p class="text-lg mt-0 mb-2 text-blueGray-600">-->
<!--                            Find me on any of these platforms.-->
<!--                        </p>-->
<!--                        <div class="mt-6 lg:mb-0 mb-6 flex">-->
<!--                            <a rel="noopener noreferrer" target="_blank" href="https://twitter.com/tooklevin" class="flex items-center justify-center bg-white text-gray-400 hover:test-gray-800 shadow-lg font-normal h-10 w-10 rounded-full outline-none focus:outline-none mr-2" type="button">-->
<!--                                <span class="sr-only">twitter</span>-->
<!--                                <Twitter />-->
<!--                            </a>-->
<!--                            <a rel="noopener noreferrer" target="_blank" href="https://www.linkedin.com/in/levin-kipkemboi" class="flex items-center justify-center bg-white text-gray-400 hover:test-gray-800 shadow-lg font-normal h-10 w-10 rounded-full outline-none focus:outline-none mr-2" type="button">-->
<!--                                <span class="sr-only">linkedin</span>-->
<!--                                <Linkedin />-->
<!--                            </a>-->
<!--                            <a rel="noopener noreferrer" target="_blank" href="https://instagram.com/too_levin" class="flex items-center justify-center bg-white text-gray-400 hover:test-gray-800 shadow-lg font-normal h-10 w-10 rounded-full outline-none focus:outline-none mr-2" type="button">-->
<!--                                <span class="sr-only">instagram</span>-->
<!--                                <Instagram />-->
<!--                            </a>-->
<!--                            <a rel="noopener noreferrer" target="_blank" href="https://github.com/levintoo" class="flex items-center justify-center bg-white text-gray-400 hover:test-gray-800 shadow-lg font-normal h-10 w-10 rounded-full outline-none focus:outline-none mr-2" type="button">-->
<!--                                <span class="sr-only">github</span>-->
<!--                                <Github />-->
<!--                            </a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="lg:w-3/5 px-4">-->
<!--                        <div class="flex flex-wrap items-top space-y-4 lg:space-y-0 mt-6 lg:mt-0">-->
<!--                            <div class="w-full lg:w-1/3 lg:px-4 ml-auto space-y-2.5">-->
<!--                                <span class="block text-gray-800 font-semibold">Top Picks</span>-->
<!--                                <ul class="space-y-2">-->
<!--                                    <li>-->
<!--                                        <Link href="/top-web-development-tools-i-use" class="underline hover:text-gray-800 block text-sm">-->
<!--                                            Top web development tools-->
<!--                                        </Link>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <Link href="/a-step-by-step-guide-to-upgrade-to-laravel-11" class="underline hover:text-gray-800 block text-sm">-->
<!--                                            Laravel 11 upgrade guide-->
<!--                                        </Link>-->
<!--                                    </li>-->
<!--                                </ul>-->
<!--                            </div>-->
<!--                            <div class="w-full lg:w-1/3 lg:px-4 ml-auto space-y-2.5">-->
<!--                                <span class="block text-gray-800 font-semibold">Navigation</span>-->
<!--                                <ul class="space-y-3">-->
<!--                                    <li>-->
<!--                                        <Link class="underline text-blueGray-600 hover:text-gray-800 block text-sm" href="/">Home</Link>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <Link class="underline text-blueGray-600 hover:text-gray-800 block text-sm" href="/posts/top">Top Posts</Link>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <Link href="/about" class="underline text-blueGray-600 hover:text-gray-800 block text-sm">About</Link>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <Link href="/about#contact" class="underline text-blueGray-600 hover:text-gray-800 block text-sm">Contact</Link>-->
<!--                                    </li>-->
<!--                                </ul>-->
<!--                            </div>-->
<!--                            <div class="w-full lg:w-1/3 lg:px-4 ml-auto space-y-2.5">-->
<!--                                <span class="block text-gray-800 font-semibold">Others</span>-->
<!--                                <ul class="space-y-3">-->
<!--                                    <li>-->
<!--                                        <Link class="underline text-blueGray-600 hover:text-gray-800 block text-sm" href="/terms-of-service">Terms of Service</Link>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <Link class="underline text-blueGray-600 hover:text-gray-800 block text-sm" href="/privacy-policy">Privacy policy</Link>-->
<!--                                    </li>-->
<!--                                </ul>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <hr class="my-6 border-gray-300">-->
<!--                <div class="flex flex-wrap items-center md:justify-between justify-center">-->
<!--                    <div class="w-full px-4 mx-auto text-center">-->
<!--                        <div class="text-gray-800">-->
<!--                            © {{ new Date().getFullYear() }} all rights reserved. Proudly hosted on <a target="_blank" href="https://www.digitalocean.com/" class="underline">DigitalOcean</a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </footer>-->
<!--    </div>-->
</template>
