<script>
import { Popover, PopoverButton, PopoverPanel } from '@headlessui/vue';
import { AdjustmentsVerticalIcon } from '@heroicons/vue/24/solid';

export default {
  components: {
    Popover,
    PopoverButton,
    PopoverPanel,
    AdjustmentsVerticalIcon,
  },
  props: {
    initial_filters: Object,
    columns: Object,
    update: Function,
  },
  data() {
    return {
      filters: this.initial_filters,
    };
  },
};
</script>

<template>
  <Popover class="relative">
    <PopoverButton>
      <div class="flex flex-row bg-orange px-4 my-2 py-2 rounded">
        <AdjustmentsVerticalIcon
          class="self-center w-6 h-6 mr-1"
        />
        <p class="">Filter</p>
      </div>
    </PopoverButton>
    <PopoverPanel class="absolute mt-3 z-10 right-0 w-72 bg-white rounded text-[black]">

      <div v-for="value, key in columns" :key="key">
        <div class="grid grid-cols-2 p-2" v-if="value.search === 'enum'">
          <p class="mt-2">{{key.replaceAll('_', ' ')}}: </p>
          <select
            :id="key"
            class="border border-orange text-black"
            v-model="filters[key]"
            @change="update(key, $event.target.value)"
          >
            <option value="">All Option </option>
            <!-- we can check if the given key is a string. this means it was set in the
              controller. If it is not a string it means it is an assigned array
              index and we should default to the value.  -->
            <option
              v-for="value, key2 in value.levels"
              :key="`${key}.${key2}`"
              :value="typeof key2 === 'string' ? key2 : value"
            >
              {{ value }}
            </option>
          </select>
        </div>
      </div>
    </PopoverPanel>
  </Popover>
</template>
