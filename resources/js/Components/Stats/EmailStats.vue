<script>
  import {Pie} from 'vue-chartjs';
  import { Chart as ChartJS, ArcElement, Title, Tooltip, Legend } from 'chart.js'

  ChartJS.register(ArcElement, Legend, Tooltip)

  export default {
    name: 'EmailStats',
    props: [''],
    components: {
      Pie
    },
    data: () => ({
      isLoading: true,
      chartData: {},
      options: {
        responsive: true,
        plugins: {
          tooltip: {
            backgroundColor: '#41B883',
          }
        },
      },
      emailType: '',
      timePeriod: '',
      timePeriodOptions: [],
    }),
    watch: {
      emailType(){
        this.getEmailStats()
      },
      timePeriod(){
        this.getEmailStats()
      },
    },
    methods: {
      getEmailStats(){
        axios
          .get(`/api/email-stats?type=${this.emailType}&date=${this.timePeriod}`)
          .then((response) => {
            response.data.emailStats ? this.chartData = {
              labels: ['Total Emails Sent', 'Total Opens', 'Total Clicks',  'Unique Opens', 'Unique Clicks'],
              datasets: [
                {
                  backgroundColor: ['#22c55e', '#FF4929', '#f7b515'],
                  data: Object.values(response.data.emailStats)
                }
              ]
            } : this.chartData = null;
            this.isLoading = false;
          })
          .catch((error) => {
            this.isLoading = false;
          })
      },
      getLast12Months() {
        for (let i = 0; i < 12; i++) {
          let currentDate = new Date();
          currentDate.setMonth(currentDate.getMonth() - i);
          const monthYear = currentDate.toLocaleString('en-US', { month: 'long', year: 'numeric' });
          const utcFormat = currentDate.toISOString();
          this.timePeriodOptions.push({key: monthYear, value: utcFormat });
        }
      },
    },
    beforeMount() {
      this.getLast12Months();
      this.getEmailStats();
    }
  }
</script>

<template>
  <div class="flex flex-wrap p-8 justify-between gap-20" v-if="!isLoading">
    <div class="flex flex-col gap-4 text-xl">
      <h2 class="text-3xl font-medium">
          Email Statistics
      </h2>

      <div class="flex items-center gap-4">
        <label class="w-[200px]" for="time">Email Type:</label>
        <select class="rounded-lg w-[200px] text-[#000000]" name="type" v-model="emailType">
          <option value="">All Emails</option>
          <option value="referrer_created">Referrer Created</option>
          <option value="eligibility_email_1">Eligibility Email 1</option>
          <option value="eligibility_email_2">Eligibility Email 2</option>
          <option value="eligibility_email_3">Eligibility Email 3</option>
          <option value="eligibility_email_4">Eligibility Email 4</option>
          <option value="nurture_cycle_email_1">Nurture Cycle Email 1</option>
          <option value="nurture_cycle_email_2">Nurture Cycle Email 2</option>
          <option value="nurture_cycle_email_3">Nurture Cycle Email 3</option>
        </select>
      </div>

      <div class="flex items-center gap-4">
        <label class="w-[200px]" for="time">Time Period:</label>
        <select class="rounded-lg w-[200px] text-[#000000]"  name="time" v-model="timePeriod">
          <option value="">All Time</option>
          <option v-for="(time, index) in timePeriodOptions" :key="index" :value="time.value">
            {{ time.key }}
          </option>
        </select>
      </div>

      <h3 class="">
        Total Recipients: {{ chartData ? chartData.datasets[0].data[0] : 0 }}
      </h3>
      <h3 class="">
        Unique Opens: {{ chartData ? chartData.datasets[0].data[1] : 0 }}
      </h3>
      <h3 class="">
        Unique Clicks: {{ chartData ? chartData.datasets[0].data[2] : 0 }}
      </h3>
      <h3 class="">
        Total Opens: {{ chartData ? chartData.datasets[0].data[3] : 0 }}
      </h3>
      <h3 class="">
        Total Clicks: {{ chartData ? chartData.datasets[0].data[4] : 0 }}
      </h3>
    </div>
    <div class="h-[300px] flex items-center" >
      <Pie :data="chartData" :options="options" ref="pie" v-if="chartData"/>
    </div>
  </div>
</template>