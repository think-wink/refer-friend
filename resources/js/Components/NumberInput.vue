<script>
import InputLabel from './InputLabel.vue';

export default {
  props: {
    modelValue: [Number, String],
    read_only: {
      type: Boolean,
      default: false,
    },
    error: String,
    label: String,
  },
  components: { InputLabel },
  data() {
    const str = String(this.modelValue);
    const part_a = str.substring(0, str.length - 2);
    const part_b = str.substring(str.length - 2);
    return {
      value: `${part_a || '0'}.${part_b}`,
    };
  },
  emits: ['update:modelValue'],
  methods: {
    test() {
      return /^[0-9]+(\.[0-9]{1,2})?$/.test(this.value);
    },
    input(event) {
      const { value } = event.target;
      if (/^[0-9]+$/.test(value)) {
        this.$emit('update:modelValue', Number(`${value}00`));
      } else if (/^[0-9]+\.[0-9]{2}$/.test(value)) {
        const values = value.split('.');
        this.$emit('update:modelValue', Number(`${values[0]}${values[1]}`));
      } else if (/^[0-9]+\.[0-9]{1}$/.test(value)) {
        const values = value.split('.');
        this.$emit('update:modelValue', Number(`${values[0]}${values[1]}0`));
      } else {
        this.$emit('update:modelValue', null);
      }
      this.value = value;
    },
  },
};
</script>

<template>
  <div class="bg-primary border-0">
    <InputLabel :value="label" />
    <input
      ref="input"
      :class="['bg-input border-0 p-4 w-full text-white', read_only ? 'opacity-50' : '']"
      :value="value"
      :readonly="read_only"
      @input="input">
    <p v-if="error" class="text-[red]"> {{ error }} </p>
    <p v-else-if="!test()" class="text-[red]">Please enter a valid number</p>
  </div>
</template>
