<script>
  import {Pie} from 'vue-chartjs';
  import { Chart as ChartJS, ArcElement, Tooltip, Legend } from 'chart.js'

  ChartJS.register(ArcElement, Legend, Tooltip)

  export default {
    name: 'SubscribedStats',
    props: [''],
    components: {
      Pie
    },
    data: () => ({
      isLoading: true,
      referrerChartData: {},
      referredChartData: {},
      referrerOptions: {
        responsive: true,
      },
      referredOptions: {
        responsive: true,
      },
    }),
    methods: {
      getSubscribedData(){
        axios
          .get(`/api/subscribed-stats`)
          .then((response) => {
            this.referrerChartData = {
              labels: ['Subscribed Referrers', 'Unsubscribed Referrers'],
              datasets: [
                {
                  backgroundColor: ['#22c55e', '#FF4929'],
                  data: Object.values(response.data.referrerSubscribed)
                }
              ]
            }
            this.referredChartData = {
              labels: ['Subscribed Referreds', 'Unsubscribed Referreds'],
              datasets: [
                {
                  backgroundColor: ['#22c55e', '#FF4929'],
                  data: Object.values(response.data.referredSubscribed)
                }
              ]
            }
            this.isLoading = false;
          })
          .catch((error) => {
            this.isLoading = false;
          })
      }
    },
    beforeMount() {
      this.getSubscribedData();
    }
  }
</script>

<template>
    <div class="grid grid-cols-3 p-8" v-if="!isLoading">
      <div class="flex flex-col gap-4 text-xl">
        <h2 class="text-3xl font-medium">
            Subscribed Statistics
        </h2>
        <h3 class="">
          Total Referrers: {{ (referrerChartData.datasets[0].data[0] + referrerChartData.datasets[0].data[1]) }}
        </h3>
        <p class="">
          Subscribed Referrers: {{ referrerChartData.datasets[0].data[0] }}
        </p>
        <p class="">
          Unsubscribed Referrers: {{ referrerChartData.datasets[0].data[1] }}
        </p>

        <h3 class="">
          Total Referreds: {{ (referredChartData.datasets[0].data[0] + referredChartData.datasets[0].data[1]) }}
        </h3>
        <p class="">
          Subscribed Referreds: {{ referredChartData.datasets[0].data[0] }}
        </p>
        <p class="">
          Unsubscribed Referreds: {{ referredChartData.datasets[0].data[1] }}
        </p>
      </div>
      <div class="h-[300px] mx-auto">
        <Pie :data="referrerChartData" :options="referrerOptions" ref="pieReferrer" />
      </div>
      <div class="h-[300px] mx-auto">
        <Pie :data="referredChartData" :options="referredOptions" ref="pieReferred" />
      </div>
    </div>
</template>