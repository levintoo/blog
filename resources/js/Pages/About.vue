<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import {Head} from "@inertiajs/vue3";

defineProps({
    posts: {
        type: Object,
        default: {},
        required: true,
    }
})

const contact = (means) => {
    if (means === 'email') {
        window.open(`mailto:mymail`, "_blank");
    } else if (means === 'whatsapp') {
        window.open(`https://wa.me/super-secretnumber}`, "_blank");
    }
}
</script>

<template>
    <AppLayout>
        <Head>
            <title>About Levin and levintoo.com</title>

            <!-- Primary Meta Tags -->
            <meta name="title" content="About Levin and levintoo.com">
            <meta name="description"
                  content="Get to know the voice behind levintoo.com and understand the passion that drives the content.">

            <!-- Open Graph / Facebook -->
            <meta property="og:title" content="About Levin and levintoo.com">
            <meta property="og:description"
                  content="Get to know the voice behind levintoo.com and understand the passion that drives the content.">
            <meta property="og:image" content="https://levintoo.com/assets/og-image.png">

            <!-- Twitter -->
            <meta property="twitter:title" content="About Levin and the blog levintoo.com">
            <meta property="twitter:description"
                  content="Get to know the voice behind levintoo.com and understand the passion that drives the content.">
            <meta property="twitter:image" content="https://levintoo.com/assets/og-image.png">
        </Head>

        <template #breadcrumbs>
            about
        </template>

        <div class="w-full py-5 space-y-10">
            <h1 class="text-2xl font-semibold text-center text-gray-800">
                About levintoo
            </h1>
            <div>
                <div class="max-w-7xl mx-auto">
                    <div class="px-2 lg:px-0 mx-auto prose text-lg leading-loose">

                            <section class="space-y-8">

                                <p>Hey there! I'm Levin Too, a Nairobi-based software developer with a lifelong passion for tech (think coding since middle school!).
                                </p>
                                    <p>Here, I share my coding adventures, from Laravel and PHP to Nuxt and more.</p>
                                <p> Beyond tech,i enjoy playing video games, solving puzzles and ‘crafting’ tunes on the
                                    guitar. If you want to chat about programming or music, I'm your go-to friend!
                                    🚀 </p>
                               </section>
                        <section id="contact">
                            <h2 class="text-2xl font-semibold text-gray-800">
                            Let us build something awesome together
                        </h2>
                        <div
                                 class="flex flex-col justify-around space-y-4">
                         <div>
                             <p>You can always send me a message or an email.</p>

                             <p>I’d be happy to help out.</p>

                             <p>Available hours 24/7</p>
                         </div>

                                <div class="grid grid-cols-1 lg:grid-cols-3 space-y-4 lg:space-y-0 lg:space-x-4">
                                    <a href="https://twitter.com/_m0ssad"
                                       target="_blank"
                                        class="text-[16px] text-center no-underline bg-accent px-10 py-4 rounded hover:shadow-lg">
                                        Twitter
                                    </a>
                                <button
                                    @click="contact('email')"
                                    class="text-[16px] bg-primary text-white px-10 py-4 rounded hover:shadow-lg">
                                    Email me
                                </button>
                                <button @click="contact('whatsapp')" class="text-[16px] bg-[#d9d9d9] px-10 py-4 rounded hover:shadow-lg">
                                    Whatsapp
                                </button>
                            </div>
                        </div>
                        </section>

                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
