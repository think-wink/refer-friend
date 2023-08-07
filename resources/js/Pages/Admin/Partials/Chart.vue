<script>
import { Bar } from 'vue-chartjs';
import {
  Chart as ChartJS,
  Title,
  Tooltip,
  Legend,
  BarElement,
  CategoryScale,
  LinearScale,
} from 'chart.js';

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale);

export default {
  name: 'BarChart',
  components: { Bar },
  props: {
    table_data: Array,
  },
  computed: {
    data() {
      const data = [];
      const labels = [];
      this.table_data.forEach((value) => {
        data.push(value.stat);
        labels.push(value.group_value);
      });
      return {
        labels,
        datasets: [
          {
            data,
            backgroundColor: '#a3a3a2',
          },
        ],
      };
    },
  },
  data() {
    return {
      options: {
        plugins: {
          legend: {
            display: false,
          },
        },
        responsive: true,
        legend: {
          display: false,
        },
      },
    };
  },
};
</script>
<template>
  <div class="">
    <Bar id="my-chart-id" :options="options" :data="data" />
  </div>
</template>
