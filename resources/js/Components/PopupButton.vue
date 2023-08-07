<script>
export default {
  props: {
    action: Function,
  },
};

</script>

<template>
  <button class="bg-orange text-white rounded w-28 p-1" @click="action" >
    <slot />
  </button>
</template>
