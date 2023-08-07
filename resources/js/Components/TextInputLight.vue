<script setup>

import { ref } from 'vue';
import InputLabel from './InputLabel.vue';

defineProps({
  modelValue: [String, Number],
  read_only: {
    type: Boolean,
    default: false,
  },
  error: String,
  label: String,
  type: String,
});

defineEmits(['update:modelValue']);

const input = ref(null);

</script>

<template>
  <div v-if="(typeof modelValue) !== 'undefined'" class="bg-primary border-0">
    <InputLabel :value="label" />
    <input
      ref="input"
      :class="[
        'bg-white border rounded py-1 px-4 w-full text-primary',
        read_only ? 'opacity-50' : ''
      ]"
      :value="modelValue"
      @input="$emit('update:modelValue', $event.target.value)" :disabled="read_only" :type="type">
    <p v-if="error" class="text-[red]"> {{ error }} </p>
  </div>
</template>
