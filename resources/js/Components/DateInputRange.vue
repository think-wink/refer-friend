<script>
import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css';
import InputLabel from './InputLabel.vue';

export default {
  props: {
    modelValue: Array,
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
    formatDate(date) {
      if (!date) {
        return '';
      }
      const day = date.getDate();
      const month = date.getMonth() + 1;
      const year = date.getFullYear();
      return `${day}/${month}/${year}`;
    },
    format(dates) {
      return `${this.formatDate(dates[0])} - ${this.formatDate(dates[1])}`;
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
      range
    />
    <p class="text-[red]"> {{ error }} </p>
  </div>
</template>
