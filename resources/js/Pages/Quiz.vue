<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'
import ActionCard from '@/Components/ActionCard.vue'
import {useVotingStore} from '@/Stores/useVotingStore'
const voting = useVotingStore()
</script>

<template>
    <GuestLayout>
        <article class="mt-16">
            <div class="">
                <h2 class="text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-6">What's the best beer?</h2>

                <p class="max-w-screen-md text-gray-500 md:text-lg text-center mx-auto">
                    Let's try to figure what's the best beer for now...
                </p>
            </div>

            <div class="mt-10 w-full flex text-center">
                <span class="w-full mx-auto" v-text="voting.message"/>
            </div>

            <div class="mt-10 grid sm:grid-cols-2 xl:grid-cols-3 gap-12 xl:gap-16">
                <ActionCard v-for="item in voting.beers" :item="item"/>
            </div>
        </article>
    </GuestLayout>
</template>
