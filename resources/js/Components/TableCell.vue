<script>

export default {
  props: {
    item_id: String,
    row_props: Object,
  },
  data() {
    return {
      row: this.row_props.row,
    };
  },
  watch: {
    row_props(new_value) {
      this.row = new_value.row;
    },
  },
  methods: {
    isImage(string) {
      return /\.(png|jpeg|jpg|gif)$/.test(string);
    },
    isUtcIsoDateString(string) {
      const isoDateRegex = /^\d{4}-\d{2}-\d{2}T\d{2}:\d{2}:\d{2}\.\d{3}Z$/;
      return isoDateRegex.test(string);
    },
    parseDate(value) {
      const date = new Date(value);
      return date.toLocaleString();
    },
  },
};
</script>
<template>
   <td v-if="row[item_id] !== undefined" class="p-3">
      <img
        v-if="isImage(row[item_id])"
        :src="row[item_id]"
        class="object-cover h-12 w-48 "
      />
      <p v-else-if="isUtcIsoDateString(row[item_id])"> {{ parseDate(row[item_id]) }} </p>
      <p v-else-if="item_id === 'enabled'"> {{ row[item_id] ? 'yes' : 'no' }} </p>
      <p v-else-if="typeof row[item_id] === 'string'"> {{ row[item_id].replaceAll('_', ' ') }} </p>
      <p v-else-if="Array.isArray(row[item_id])"> {{ row[item_id].join(', ') }} </p>
      <p v-else> {{ row[item_id] }} </p>
    </td>
</template>
