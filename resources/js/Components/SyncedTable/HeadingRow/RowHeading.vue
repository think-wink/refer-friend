<script>
import {
  ArrowUpIcon,
  ArrowDownIcon,
} from '@heroicons/vue/24/solid';

export default {
  components: {
    ArrowUpIcon,
    ArrowDownIcon,
  },
  props: {
    column_name: String,
  },
  methods: {
    update() {
      this.updateSort(this.column_name);
    },
  },
  inject: ['selected_columns', 'sort', 'updateSort'],
};
</script>
<template>
  <td
    v-if="selected_columns.includes(column_name)"
    @click="update"
    class="p-3"
  >
    <span class="flex flex-row">
      <span class="capitalize mx-1">{{ column_name.replaceAll('_', ' ') }} </span>
      <span v-if="column_name === sort.column">
        <ArrowDownIcon
          v-if="sort.descending"
          class="w-6 h-6 self-center text-white"
        />
        <ArrowUpIcon
          v-else
          class="w-6 h-6 self-center text-white"
        />
      </span>
    </span>
  </td>
</template>
