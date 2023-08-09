<script>
import CellWrapper from '../CellWrapper.vue';

export default {
  components: { CellWrapper },
  props: {
    data: String,
  },
  data() {
    return {
    };
  },
  computed: {
    date() {
      const isoDateRegex = /^\d{4}-\d{2}-\d{2}T\d{2}:\d{2}:\d{2}\.\d{3}Z$/;
      if (isoDateRegex.test(this.data)) {
        const date = new Date(this.data);
        return date.toLocaleString();
      }
      return '';
    },
  },
};
</script>
<template>
   <CellWrapper :data="data">
      <p> {{ date }} </p>
    </CellWrapper>
</template>
