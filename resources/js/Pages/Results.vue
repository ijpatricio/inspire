<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'
import {useVotingStore} from '@/Stores/useVotingStore'
const voting = useVotingStore()
import ApexCharts from 'apexcharts'
import {onMounted, ref} from 'vue'

const chartEl = ref(null)

onMounted(() => {
    voting.bootChart(chartEl.value)
})
Echo
    .channel('voting')
    .listen('NewVoteWasSubmitted', e => {
        voting.getResults()
    })
</script>

<template>
    <GuestLayout>
        <div class="mt-10 flex items-center justify-center text-2xl"> The results are in: </div>
        <div class="mt-8 flex items-center justify-center">
            <div ref="chartEl" id="chart"></div>
        </div>
    </GuestLayout>
</template>
