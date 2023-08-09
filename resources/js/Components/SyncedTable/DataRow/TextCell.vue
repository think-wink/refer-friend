<script>
import CellWrapper from '../CellWrapper.vue';

export default {
  components: { CellWrapper },
  props: {
    data: [String, Number],
  },
  data() {
    return {};
  },
};
</script>

<template>
   <CellWrapper :data="data">
      <p> {{ data }} </p>
    </CellWrapper>
</template>
