<script>

export default {
  props: {
    url_start: String,
    search_details: Object,
  },
  data() {
    return {
      this.url: this.url_start,
    };
  },
  watch: {
    row_props(new_value) {
      this.row = new_value.row;
    },
  },
  methods: {
    encodeUrl(object) {
      return '?' + Object.keys(object).map(key => {
        return `${key}=${encodeURIComponent(object[key])}`;
      }).join('&');
    },
  },
};
</script>
<template>
  <td v-if="row[item_id] !== undefined" class="p-3">
    <img v-if="isImage(row[item_id])" :src="row[item_id]" class="object-cover h-12 w-48 " />
    <p v-else-if="isUtcIsoDateString(row[item_id])"> {{ parseDate(row[item_id]) }} </p>
    <p v-else-if="item_id === 'enabled'"> {{ row[item_id] ? 'yes' : 'no' }} </p>
    <p v-else-if="typeof row[item_id] === 'string'"> {{ row[item_id].replaceAll('_', ' ') }} </p>
    <p v-else-if="Array.isArray(row[item_id])"> {{ row[item_id].join(', ') }} </p>
    <p v-else> {{ row[item_id] }} </p>
  </td>
</template>
