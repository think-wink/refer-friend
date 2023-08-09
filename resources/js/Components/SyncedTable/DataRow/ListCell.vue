<script>
import CellWrapper from '../CellWrapper.vue';

export default {
  components: { CellWrapper },
  props: {
    data: Array,
  },
  data() {
    return {};
  },
};
</script>
<template>
  <CellWrapper :data="data">
    <p> {{ data.join(', ') }} </p>
  </CellWrapper>
</template>
