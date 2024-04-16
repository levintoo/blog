<script setup>
import {Head, Link, useForm} from '@inertiajs/vue3';
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import PrimaryButton from "@/Components/Reused/PrimaryButton.vue";
import InputLabel from "@/Components/Reused/InputLabel.vue";
import TextInput from "@/Components/Reused/TextInput.vue";
import InputError from "@/Components/Reused/InputError.vue";

const form = useForm({
    title: '',
    file: '',
})

function handleSubmit() {
    form.post('/dashboard/assets/create', {
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
            <Link href="/dashboard/assets" >assets</Link>
            <span class="text-primary"> / </span>
            create
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto">

                <div class="p-4 sm:p-8 border border-white shadow sm:rounded-lg">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">Create Asset</h2>

                        <p class="mt-1 text-sm text-gray-600">
                            Ensure you fill in the details below
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
                            <InputLabel for="file" value="File"/>

                            <TextInput
                                id="image"
                                ref="image"
                                @input="form.file = $event.target.files[0]"
                                autocomplete="file"
                                class="mt-1 block w-full"
                                type="file"
                             model-value=""/>

                            <InputError :message="form.errors.file" class="mt-2"/>
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
