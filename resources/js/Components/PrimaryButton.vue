<script>
export default {
  data() {
    return {
      generic_style: 'text-primary inline-flex items-center px-4 py-2 rounded-md font-semibold text-xs uppercase tracking-widest focus:ring-offset-2 transition ease-in-out duration-150',
    };
  },
  props: {
    selected: Boolean,
    type: {
      default: 'submit',
      type: String,
    },
  },
};

</script>

<template>
  <button :type="type" :class="[generic_style, selected ? 'bg-orange' : 'bg-white']">
    <slot />
  </button>
</template>
