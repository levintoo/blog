<script setup>
import {Head, usePage} from '@inertiajs/vue3';
import AppLayout from "@/Layouts/AppLayout.vue";
import Share from "@/Components/Icons/Share.vue";
import {computed, ref} from "vue";
import Twitter from "@/Components/Icons/Twitter.vue";
import Whatsapp from "@/Components/Icons/Whatsapp.vue";
import LinkMinimal from "@/Components/Icons/LinkMinimal.vue";

const props = defineProps({
    post: {
        type: Object,
        default: {},
        required: true,
    }
})

const isOpen = ref(false)

const currentUrl = computed(() => props.post.url)

function copyLink() {
    if (navigator.clipboard) {
        navigator.clipboard.writeText(currentUrl.value)
    } else {
        // Old API: document.execCommand
        const textArea = document.createElement("textarea");
        textArea.value = currentUrl.value;
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

const twitterShareLink = computed(() => `https://twitter.com/intent/tweet?text=${encodeURIComponent(props.post.title)}&hashtags=${encodeURIComponent(`${props.post.tag}`)}&via=${encodeURIComponent('tooklevin')}&url=${encodeURIComponent(currentUrl.value)}`);

const whatsappShareLink = computed(() => `https://api.whatsapp.com/send?text=${encodeURIComponent(`Check out ${props.post.title} at ${currentUrl.value}`)}`);

const likePost = () => {
    console.log(props.post.id)
}
</script>

<template>
    <Head>
        <title>{{ post.title }}</title>

        <!-- Primary Meta Tags -->
        <meta name="title" :content="post.title">
        <meta name="description" :content="post.description">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" :content="currentUrl">
        <meta property="og:title" :content="post.title">
        <meta property="og:description" :content="post.description">
        <meta property="og:image" :content="`https://levintoo.com/uploads/${post.image}`">

        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" :content="currentUrl">
        <meta property="twitter:title" :content="post.title">
        <meta property="twitter:description" :content="post.description">
        <meta property="twitter:image" :content="`https://levintoo.com/uploads/${post.image}`">
    </Head>

    <AppLayout>
        <template #breadcrumbs>
            <span class="hidden lg:flex">{{ post.title }}</span>
            <span class="lg:hidden">post</span>
        </template>

        <div class="lg:pb-6 pt-12">
            <div class="max-w-7xl mx-auto space-y-8">
                <div class="px-2 lg:px-0  text-sm mx-auto prose max-w-[95%] lg:max-w-[60%] leading-loose tracking-wide" v-html="post.body"></div>

                <div class="px-4 sm:px-2 py-3 border-t max-w-[750px] mx-auto flex items-center justify-between">

                    <p class="text-gray-600">Last updated {{ post.updated }}</p>

                    <div class="relative inline-block ">
                        <!-- Dropdown toggle button -->
                        <button @click="isOpen = !isOpen" class="relative z-10 block p-2 text-gray-700">
                            <Share class="h-5 w-auto" />
                        </button>

                        <!-- Dropdown menu -->
                        <div v-show="isOpen"
                             @click="isOpen = !isOpen"
                             class="justify-around space-y-3 px-2 absolute z-20 py-2 mt-0 right-0 lg:-right-20 origin-top-right bg-white rounded-md shadow"
                        >
                            <button @click="copyLink" class="text-sm flex w-full gap-2 text-gray-600 hover:text-orange-400">
                                <LinkMinimal class="h-5 w-auto"/>Copy link
                            </button>

                            <a :href="whatsappShareLink" target="_blank" rel="noopener noreferrer" class="text-sm flex w-full gap-2 text-gray-500 hover:text-orange-400">
                                <Whatsapp class="h-5 w-auto"/>Whatsapp
                            </a>

                            <a :href="twitterShareLink" target="_blank" rel="noopener noreferrer" class="text-sm flex w-full gap-2 text-gray-500 hover:text-orange-400">
                                <Twitter class="h-5 w-auto"/>Twitter
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
