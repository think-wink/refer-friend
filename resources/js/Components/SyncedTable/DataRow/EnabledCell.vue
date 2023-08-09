<script>
import CellWrapper from '../CellWrapper.vue';

export default {
  components: { CellWrapper },
  props: {
    data: [Boolean, Number],
  },
  data() {
    return {};
  },
};
</script>
<template>
  <CellWrapper :data="data">
    <p> {{ data ? 'yes' : 'no' }} </p>
  </CellWrapper>
</template>
