<script>
export default {
  props: {
    column_name: String,
    update: Function,
    placeholder_text: {
      type: String,
      default: 'Search here',
    },
  },
  data() {
    return {
      search_value: '',
    };
  },
};
</script>

<template>
  <div class="border border-[#999] rounded my-2 flex flex-row">
      <input
          v-model="search_value"
          class=" bg-primary p-2"
          :placeholder="placeholder_text"
          @change="update(column_name, search_value)"
      />
      <button class="bg-orange px-2"> Search </button>
  </div>
</template>
