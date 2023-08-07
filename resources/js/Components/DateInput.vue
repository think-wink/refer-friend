<script>
import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css';
import InputLabel from './InputLabel.vue';

export default {
  props: {
    modelValue: {
      validator(value) {
        const regex = /^\d{4}-\d{2}-\d{2}T\d{2}:\d{2}:\d{2}\.\d{3}Z$/;
        if (!value) {
          return true;
        }
        return regex.test(value);
      },
    },
    read_only: {
      type: Boolean,
      default: false,
    },
    error: String,
    label: String,
  },
  data() {
    return {
      date: this.modelValue,
    };
  },
  components: { VueDatePicker, InputLabel },
  emits: ['update:modelValue'],
  methods: {
    update() {
      this.$emit('update:modelValue', this.date);
    },
    format(date) {
      const day = date.getDate();
      const month = date.getMonth() + 1;
      const year = date.getFullYear();
      return `${day}/${month}/${year}`;
    },
  },
};
</script>

<template>
  <div >
    <InputLabel :value="label" />
    <VueDatePicker
      v-model="date"
      @update:model-value="update"
      :format="format"
      :disabled="read_only"
      :class="read_only ? 'opacity-50' : ''"
    />
    <p class="text-[red]"> {{ error }} </p>
  </div>
</template>
