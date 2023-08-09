<script>
import CellWrapper from '../CellWrapper.vue';

export default {
  components: { CellWrapper },
  props: {
    url: String,
  },
  data() {
    return {
    };
  },
};
</script>
<template>
  <CellWrapper :data="url">
    <img
      :src="url"
      class="object-cover h-12 w-48 "
    />
  </CellWrapper>
</template>
