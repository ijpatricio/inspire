<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import { Input as VInput, Button as VButton, Checkbox as VCheckbox } from '@indigit/vanilla-components'
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <VCheckbox />
                        <VInput
                            type="password"
                            placeholder="A secure password"
                            feedback="Please input a dummy password"
                        />

                        <VButton variant="primary" ></VButton>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
