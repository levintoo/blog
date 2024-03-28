<script setup>
import {Head, Link, useForm} from '@inertiajs/vue3';
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import PrimaryButton from "@/Components/Reused/PrimaryButton.vue";
import InputLabel from "@/Components/Reused/InputLabel.vue";
import TextInput from "@/Components/Reused/TextInput.vue";
import InputError from "@/Components/Reused/InputError.vue";
import TextAreaInput from "@/Components/Reused/TextAreaInput.vue";

const form = useForm({
    title: '',
    slug: '',
    description: '',
    image: '',
    body: '',
    tag: '',
})

function handleSubmit() {
    form.post('/dashboard/posts/create', {
        preserveScroll: true,
        onSuccess: () => {
            form.reset()
        },
    })
}
</script>

<template>
    <Head title="Posts"/>

    <DashboardLayout>
        <template #breadcrumbs>
            <span class="text-primary"> / </span>
            <Link href="/dashboard/posts" >posts</Link>
            <span class="text-primary"> / </span>
            create
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto">

                <div class="p-4 sm:p-8 border border-white shadow sm:rounded-lg">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">Create Post</h2>

                        <p class="mt-1 text-sm text-gray-600">
                            Ensure you fill in the details below and paste in md
                        </p>
                    </header>
                    <form class="mt-6 space-y-6" @submit.prevent="handleSubmit">
                        <div>
                            <InputLabel for="title" value="Title"/>

                            <TextInput
                                id="current_password"
                                ref="currentPasswordInput"
                                v-model="form.title"
                                autocomplete="title"
                                class="mt-1 block w-full"
                                type="text"
                            />

                            <InputError :message="form.errors.title" class="mt-2"/>
                        </div>

                        <div class="mt-6">
                            <InputLabel for="slug" value="Slug"/>

                            <TextInput
                                id="slug"
                                ref="slug"
                                v-model="form.slug"
                                autocomplete="slug"
                                class="mt-1 block w-full"
                                type="text"
                            />

                            <InputError :message="form.errors.slug" class="mt-2"/>
                        </div>

                        <div class="mt-6">
                            <InputLabel for="tag" value="tag"/>

                            <TextInput
                                id="tag"
                                ref="tag"
                                v-model="form.tag"
                                autocomplete="tag"
                                class="mt-1 block w-full"
                            />

                            <InputError :message="form.errors.tag" class="mt-2"/>
                        </div>

                        <div class="mt-6">
                            <InputLabel for="description" value="Description"/>

                            <TextAreaInput
                                id="description"
                                ref="description"
                                v-model="form.description"
                                autocomplete="description"
                                class="mt-1 block w-full"
                                rows="3"
                            />

                            <InputError :message="form.errors.description" class="mt-2"/>
                        </div>

                        <div class="mt-6">
                            <InputLabel for="image" value="Image"/>

                            <TextInput
                                id="image"
                                ref="image"
                                @input="form.image = $event.target.files[0]"
                                autocomplete="image"
                                class="mt-1 block w-full"
                                type="file"
                             model-value=""/>

                            <InputError :message="form.errors.image" class="mt-2"/>
                        </div>

                        <div class="mt-6">
                            <InputLabel for="body" value="Body"/>

                            <TextAreaInput
                                id="body"
                                ref="body"
                                v-model="form.body"
                                autocomplete="body"
                                class="mt-1 block w-full"
                                rows="5"
                            />

                            <InputError :message="form.errors.body" class="mt-2"/>
                        </div>

                        <div class="flex items-center gap-4">
                            <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

                            <Transition
                                enter-active-class="transition ease-in-out"
                                enter-from-class="opacity-0"
                                leave-active-class="transition ease-in-out"
                                leave-to-class="opacity-0"
                            >
                                <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
                            </Transition>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </DashboardLayout>
</template>
