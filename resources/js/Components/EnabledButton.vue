<script>
export default {
  data() {
    return {
      disabled_style: 'border rounded border-orange px-4 py-1 my-1 text-center text-orange bg-primary hover:bg-orange hover:text-white',
      enabled_style: 'border rounded border-orange px-4 py-1 my-1 text-center text-white bg-orange hover:bg-primary hover:text-orange',
    };
  },
  props: {
    enabled: Boolean,
    action: Function,
  },
};

</script>

<template>
  <button :class="enabled ? enabled_style : disabled_style" @click="action" >
    {{ enabled ? 'Disable' : 'Enable' }}
  </button>
</template>
