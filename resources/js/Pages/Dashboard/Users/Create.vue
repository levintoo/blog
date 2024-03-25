<script setup>
import {Head, useForm, Link} from '@inertiajs/vue3';
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import PrimaryButton from "@/Components/Reused/PrimaryButton.vue";
import InputLabel from "@/Components/Reused/InputLabel.vue";
import TextInput from "@/Components/Reused/TextInput.vue";
import InputError from "@/Components/Reused/InputError.vue";

const form = useForm({
    name: '',
    email: '',
    password: '',
})

function handleSubmit() {
    form.post('/dashboard/users/create', {
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
            <Link href="/dashboard/users" >
                users
            </Link>
            <span class="text-primary"> / </span>
            create
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto">

                <div class="p-4 sm:p-8 border border-white shadow sm:rounded-lg">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">Create User</h2>

                        <p class="mt-1 text-sm text-gray-600">
                            Ensure you fill in the details below
                        </p>
                    </header>
                    <form class="mt-6 space-y-6" @submit.prevent="handleSubmit">
                        <div>
                            <InputLabel for="name" value="Name"/>

                            <TextInput
                                id="name"
                                ref="name"
                                v-model="form.name"
                                autocomplete="title"
                                class="mt-1 block w-full"
                                type="text"
                            />

                            <InputError :message="form.errors.name" class="mt-2"/>
                        </div>

                        <div class="mt-6">
                            <InputLabel for="email" value="Email"/>

                            <TextInput
                                id="email"
                                ref="email"
                                v-model="form.email"
                                autocomplete="email"
                                class="mt-1 block w-full"
                                type="email"
                            />

                            <InputError :message="form.errors.email" class="mt-2"/>
                        </div>

                        <div class="mt-6">
                            <InputLabel for="password" value="password"/>

                            <TextInput
                                id="password"
                                ref="password"
                                v-model="form.password"
                                autocomplete="tag"
                                class="mt-1 block w-full"
                                type="password"
                            />

                            <InputError :message="form.errors.password" class="mt-2"/>
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
