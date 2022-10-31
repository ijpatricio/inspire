<script setup>
import NavMenu from '@/Components/NavMenu.vue'
</script>

<template>
    <NavMenu />
    <div class="min-h-screen bg-gray-100 max-w-3xl mx-auto">
        <slot />
    </div>
</template>
