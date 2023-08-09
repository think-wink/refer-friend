<script>
import { ArrowDownOnSquareIcon } from '@heroicons/vue/24/solid';

export default {
  components: {
    ArrowDownOnSquareIcon,
  },
  props: {
    url: String,
  },
  data() {
    return { };
  },
};
</script>

<template>
   <a
    :href="url"
    class="flex flex-row bg-orange px-4 py-2 rounded my-2"
  >
    <ArrowDownOnSquareIcon class="w-6 h-6 self-center text-white mr-1" />
    Export
  </a>
</template>
