<script setup>
import { Link } from '@inertiajs/vue3';
import Next from "@/Components/Icons/Next.vue";
import Previous from "@/Components/Icons/Previous.vue";

defineProps({
    links: Array,
})

</script>

<template>
    <nav v-if="links.length > 3" class="text-xs text-gray-500" aria-label="Table navigation">
        <ul class="inline-flex items-center">
            <li class="mb-1 flex items-center justify-center" v-for="(link, key) in links" :key="key">
                    <span
                        v-if="link.url === null"
                        class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-blue"
                    >
                        <Next class="h-4" v-if="link.label.includes('Next')" />

                        <Previous class="h-4" v-else-if="link.label.includes('Previous')" />

                        <span v-else>
                            {{ link.label }}
                        </span>
                    </span>
                    <Link
                        v-else
                        :href="link.url"
                        preserve-state
                        preserve-scroll
                        :class="{ 'underline transition-colors duration-150 bg-blue-600 focus:outline-none focus:shadow-outline-blue': link.active }"
                        class="px-4 py-2 mx-1 text-gray-700 transition-colors duration-300 transform bg-white rounded-md sm:inline hover:bg-blue-500 hover:text-white"
                    >
                        <Next class="h-4" v-if="link.label.includes('Next')" />

                        <Previous class="h-4" v-else-if="link.label.includes('Previous')" />

                        <span v-else>
                            {{ link.label }}
                        </span>
                    </Link>
                </li>
        </ul>
    </nav>
</template>
