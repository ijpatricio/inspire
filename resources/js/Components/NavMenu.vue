<script setup>
import {ref, reactive, onMounted, toRefs} from 'vue'
</script>

<template>
    <div class="flex gap-12 justify-center bg-gray-100 pt-4 text-lg">
        <Link href="/" v-text="'Home'"/>
        <Link href="/quiz" v-text="'Quiz'"/>
        <Link href="/results" v-text="'Results'"/>
        <Link href="/about" v-text="'About'"/>
        <Link href="/renderless" v-text="'Renderless'"/>
    </div>
</template>
