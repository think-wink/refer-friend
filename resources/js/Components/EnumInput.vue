<script setup>
import { onMounted, ref } from 'vue';
import InputLabel from './InputLabel.vue';

defineProps({
  modelValue: [String, Number],
  options: Object,
  read_only: {
    type: Boolean,
    default: false,
  },
  error: String,
  label: String,
});

defineEmits(['update:modelValue']);

const input = ref(null);

onMounted(() => {
  if (input.value.hasAttribute('autofocus')) {
    input.value.focus();
  }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
  <div v-if="(typeof modelValue) !== 'undefined'">
    <InputLabel :value="label" />
    <select
      ref="input"
      :value="modelValue"
      @input="$emit('update:modelValue', $event.target.value)"
      class="bg-input border-0 p-4 text-white w-full"
      :disabled="read_only"
      >
      <option
        :key="value"
        v-for="value, key in options"
        :value="typeof key === 'string' ? key : value"
      >
        {{ value }}
      </option>
    </select>
    <p class="text-[red]"> {{ error }} </p>
  </div>
</template>
