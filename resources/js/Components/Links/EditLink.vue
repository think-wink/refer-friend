<script>
import { Link as InertiaLink } from '@inertiajs/vue3';

export default {
  components: { InertiaLink },
  props: {
    url: String,
  },
  data() {
    return {};
  },
};
</script>

<template>
  <InertiaLink
    :href="url"
    class="border rounded border-orange px-4 py-1 my-1 text-center text-orange bg-primary
             hover:bg-orange hover:text-white">
    Edit
  </InertiaLink>
</template>
