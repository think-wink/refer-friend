<script>
export default {
  props: ['data'],
  data() {
    return {};
  },
  computed: {
    show() {
      return typeof this.data !== 'undefined';
    },
  },
};
</script>
<template>
  <td class="p-3" v-if="show">
    <slot />
  </td>
</template>
