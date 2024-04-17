<script setup>
import {Head, Link, useForm, usePage} from '@inertiajs/vue3';
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import PrimaryButton from "@/Components/Reused/PrimaryButton.vue";
import InputLabel from "@/Components/Reused/InputLabel.vue";
import TextInput from "@/Components/Reused/TextInput.vue";
import InputError from "@/Components/Reused/InputError.vue";
import TextAreaInput from "@/Components/Reused/TextAreaInput.vue";
import SelectInput from "@/Components/Reused/SelectInput.vue";

const page = usePage()

const props = defineProps({
    post: {
        type: Object,
        required: true,
        default: {}
    },
})

const form = useForm({
    id: props.post.id,
    status: props.post.status,
    title: props.post.title,
    slug: props.post.slug,
    description: props.post.description,
    body: props.post.body,
    tag: props.post.tag,
    image: '',
})

function handleSubmit() {
    form.post('/dashboard/posts/edit/' + props.post.id, {
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
            edit
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto">

                <div class="p-4 sm:p-8 border border-white shadow sm:rounded-lg">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">Update Post</h2>

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
                            <InputLabel for="status" value="Status"/>

                            <SelectInput
                                id="slug"
                                ref="slug"
                                v-model="form.status"
                                autocomplete="status"
                                class="mt-1 block w-full"
                                type="text"
                            >
                                <option value="0">Public</option>
                                <option value="1">Unlisted</option>
                            </SelectInput>

                            <InputError :message="form.errors.status" class="mt-2"/>
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
                            <InputLabel for="image" value="Image"/>

                            <TextInput
                                id="image"
                                ref="file"
                                @input="form.image = $event.target.files[0]"
                                autocomplete="image"
                                class="mt-1 block w-full"
                                type="file"
                                model-value=""
                            />

                            <InputError :message="form.errors.image" class="mt-2"/>
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

                        <InputError v-if="form.errors.id" message="some required parameters are missing" class="mt-2"/>

                        <TextInput
                            class="hidden"
                            aria-disabled="true"
                            aria-hidden="true"
                            type="text"
                            v-model="form.id"
                        />

                        <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                            {{ form.progress.percentage }}%
                        </progress>

                        <div class="flex items-center gap-4">
                            <PrimaryButton :disabled="form.processing">Update</PrimaryButton>

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
