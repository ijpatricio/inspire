<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'
import UserPermissions from '@/Components/UserPermissions.js'
</script>

<template>
    <GuestLayout>
        <div class="flex flex-col min-h-screen justify-center bg-gray-100">
            <div class="flex justify-center">
                <div>

                    <user-permissions />

                </div>
            </div>
        </div>
    </GuestLayout>
</template>
