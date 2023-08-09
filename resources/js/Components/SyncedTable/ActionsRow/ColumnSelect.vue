<script>
import { Popover, PopoverButton, PopoverPanel } from '@headlessui/vue';
import { AdjustmentsHorizontalIcon } from '@heroicons/vue/24/solid';

export default {
  components: {
    Popover,
    PopoverButton,
    PopoverPanel,
    AdjustmentsHorizontalIcon,
  },
  props: {
    initial_columns: Object,
    update: Function,
  },
  data() {
    return {
      columns: this.initial_columns,
    };
  },
};
</script>

<template>
  <Popover class="relative">
    <PopoverButton>
      <div class="flex flex-row bg-orange px-4 py-2 rounded my-2">
        <AdjustmentsHorizontalIcon class="self-center w-6 h-6 mr-1" />
        <p class="">Column Select</p>
      </div>
    </PopoverButton>
    <PopoverPanel class="absolute mt-3 z-10 right-0 w-44 rounded bg-white ">
      <div v-for="value, key in columns" :key="key">
        <div class="flex flex-row p-2">
          <input
            v-model="columns[key]"
            class="mt-1 mr-3 text-orange"
            type="checkbox" :id="key"
            @change="update(columns)">
          <p class="text-[black]">{{ key.replaceAll('_', ' ') }}</p>
        </div>
      </div>
    </PopoverPanel>
  </Popover>
</template>
