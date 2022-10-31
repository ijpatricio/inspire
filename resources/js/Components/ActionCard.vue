<script setup lang="ts">
const props = defineProps(['item'])
import {useVotingStore} from '../Stores/useVotingStore.js'
const voting = useVotingStore()

const submitVote = () => {
    if (! voting.isAllowedToVote) {
        alert(`You have to wait ${voting.votingInterval} seconds before voting again.`)
        return
    }

    if (confirm(`Are you sure you want to vote for ${props.item.title}?`)) {
        voting.voteFor(props.item.title)
    }
}
</script>

<template>
    <div class="flex flex-col items-center cursor-pointer" @click="submitVote">
        <div
            :class="voting.isAllowedToVote ? 'bg-indigo-500' : 'bg-indigo-300'"
            class="w-12 md:w-14 h-12 md:h-14 flex justify-center items-center text-white rounded-lg md:rounded-xl shadow-lg mb-6"
        >
            <svg class="white w-10 h-10" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" style="enable-background:new 0 0 512 512" viewBox="0 0 512 512"><path d="M360.306 97.159a75.748 75.748 0 0 0-5.166-11.191c-9.825-17.422-25.848-29.976-45.114-35.348-10.586-2.951-21.506-3.522-32.093-1.802C267.327 20.342 239.866 0 207.738 0c-21.51 0-41.344 8.976-55.291 24.307-8.24-3.054-17.007-4.635-26.016-4.635-41.291 0-74.883 33.592-74.883 74.883 0 3.98.318 7.916.934 11.777 1.378 8.629 8.911 14.93 17.65 14.93h273.394v.001c12.458 0 21.059-12.403 16.78-24.104zM376.147 162.374h-10.931c-.005-.075-.015-.149-.02-.225H62.973c-1.998 0-3.666 1.599-3.668 3.598v243.177C59.305 465.851 105.454 512 162.381 512h99.891c45.938 0 84.939-30.213 98.213-71.807h15.663c46.56 0 84.305-37.745 84.305-84.305V246.681c0-46.562-37.745-84.307-84.306-84.307zm43.418 193.514c0 23.94-19.478 43.416-43.417 43.416h-10.8V203.262h10.8c23.94 0 43.417 19.476 43.417 43.416v109.21z"/></svg>
        </div>

        <h3 class="text-lg md:text-xl font-semibold text-center mb-2" v-text="item.title"></h3>
    </div>
</template>
