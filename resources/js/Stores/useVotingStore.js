import {defineStore} from 'pinia'
import axios from 'axios'
import ApexCharts from 'apexcharts'

const initialMessage = `Click on your favorite beer to vote for it!`

export const useVotingStore = defineStore('voting', {
    state: () => ({
        chart: null,
        votingInterval: 3,
        isAllowedToVote: true,
        message: initialMessage,
        beers: [
            {title: 'Cristal'},
            {title: 'Sagres'},
            {title: 'Super Bock'},
            {title: 'Brahma'},
            {title: 'Artesanais do Lidl'},
            {title: 'Musa'},
            {title: 'Coral'},
            {title: 'Cuca'},
            {title: 'Erdinger'},
            {title: 'Skol'},
        ],
        options: {
            series: [{data: []}],
            chart: {
                width: 370,
                height: 350,
                type: 'bar',
            },
            plotOptions: {
                bar: {
                    columnWidth: '45%',
                    distributed: true,
                }
            },
            dataLabels: {
                enabled: false
            },
            legend: {
                show: false
            },
            xaxis: {
                categories: [],
                labels: {
                    style: {
                        fontSize: '12px'
                    }
                }
            }
        },
    }),
    actions: {
        voteFor(name) {
            if (!this.isAllowedToVote) {
                alert(`You have to wait ${this.votingInterval} seconds before voting again.`)
                return
            }

            axios
                .post('/api/vote', {name})
                .then(() => {
                    console.log('Ok')
                    this.message = `Your vote for ${name} was successful!`
                    this.isAllowedToVote = false
                    this.resetVoting()
                })
                .catch(() => {
                    console.error('Not Ok')
                    this.message = `Whoops, there was an error submitting your vote :(`
                })
        },
        resetVoting() {
            setTimeout(() => {
                this.isAllowedToVote = true
                this.message = initialMessage
            }, this.votingInterval * 1_000)
        },
        getResults() {
            axios
                .get('/api/results', {name})
                .then(({data}) => {
                    const newOptions = {
                        xaxis: {
                            categories: data.categories
                        },
                        series:[
                            { data: data.data }
                        ],
                    }
                    console.log(newOptions)
                    this.chart.updateOptions(newOptions)
                })
                .catch(() => {
                    console.error('Not Ok')
                })
        },
        bootChart(chartEl) {
            this.chart = new ApexCharts(chartEl, this.options)
            this.chart.render()
            this.getResults()
        },
    },
})
