<script>
import { ref } from 'vue';
import axios from 'axios';
import Chart from './Partials/Chart.vue';
import EnumInput from '../../Components/EnumInput.vue';

async function fetchData(type) {
  return axios.get('/dashboard/data', {
    params: {
      type,
      offset: -(new Date().getTimezoneOffset()) / 60,
    },
  }).then((response) => response.data);
}
export default {
  components: { Chart, EnumInput },
  async setup() {
    const data = ref(await fetchData());
    return {
      data,
    };
  },
  data() {
    return {
      type: 'all',
    };
  },
  methods: {
    async getData() {
      this.data = await fetchData(this.type);
    },
  },
};

</script>

<template>
  <EnumInput
    v-model="type"
    :options="{
      all: 'All',
      this_month: 'This Month',
      last_month: 'Last Month',
      this_week: 'This Week',
      last_week: 'Last Week',
      this_day: 'Today',
      last_day: 'Yesterday'
    }"
    @change="getData"
  />
  <div
    class="grid laptop:grid-cols-5 grid-cols-1 gap-4 pt-5"
    ref="charts"
  >
    <div class="col-span-4">
      <div class="grid grid-cols-1 md:grid-cols-2 laptop:grid-cols-4 gap-2">
        <div v-for="value, key in data.graphs" :key="key" class="bg-[#1e1e1e]">
          <h3 class="text-[#a3a3a2] p-2">
            <span class="capitalize"> {{ key }} </span>: <br>
          </h3>
          <h2 class="text-2xl text-white ml-2 mb-2"> {{ value.value }} </h2>
          <Chart
            :table_data="value.graph_data"
          />
        </div>
      </div>
    </div>
    <div class="bg-[#1e1e1e] row-span-2 p-2">
      <div v-for="list, heading in data.counts" :key="heading" class="mb-10">
        <p class="text-[#a3a3a2]">
          {{ heading }}
        </p>
        <p
          class="text-primary p-3 border-b divide-y-2"
          v-for="value in list" :key="value"
        > <span class="text-white">{{ value }} </span>
        </p>
    </div>
    </div>
  </div>
</template>
