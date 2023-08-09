<script>
export default {
  props: {
    row_props: Object,
  },
  data() {
    return {
      row: this.row_props.row,
      enable_visible: false,
    };
  },
  watch: {
    row_props(new_row) {
      this.updateRow(new_row);
    },
  },
  methods: {
    updateRow(row) {
      this.row = row;
    },
    updateRowItem(key, value) {
      this.row[key] = value;
    },
  },
};
</script>
<template>
  <slot :row="row" :updateRow="updateRow" :updateRowItem="updateRowItem" />
</template>
