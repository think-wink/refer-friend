<script setup>
import {
  ArrowUpIcon,
  ArrowDownIcon,
} from '@heroicons/vue/24/solid';
</script>

<script>
export default {
  props: {
    item_id: String,
    row_props: Object,
  },
};
</script>
<template>
  <td
    v-if="row_props.keys.includes(item_id)"
    class="p-3"
    @click="row_props.func(item_id)"
  >
    <span class="flex flex-row">
      <span class="capitalize mx-1">{{ item_id.replaceAll('_', ' ') }} </span>
      <span v-if="item_id === row_props.sort_column">
        <ArrowDownIcon
          v-if="row_props.sort_descending"
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
