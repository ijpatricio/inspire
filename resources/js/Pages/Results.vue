<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'
import {useVotingStore} from '@/Stores/useVotingStore'
const voting = useVotingStore()
import ApexCharts from 'apexcharts'
import {onMounted, ref} from 'vue'
import QrcodeVue from 'qrcode.vue'
const link = window.location.href
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

        <div class=" w-full flex flex-col items-center">
            <span class="text-xl"> Visit this page! </span>
            <qrcode-vue background="#f3f4f6" :value="link" :size="300" level="H" />
        </div>
    </GuestLayout>
</template>
