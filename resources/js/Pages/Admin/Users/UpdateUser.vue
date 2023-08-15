<script>
import { useForm } from '@inertiajs/vue3';

import ConfirmationModel from '../../../Components/ConfirmationModel.vue';
import PopupButton from '../../../Components/PopupButton.vue';
import TextInputLight from '../../../Components/TextInputLight.vue';

function makeForm(data) {
  return useForm({
    new_email: '',
    new_password: '',
    password_confirm: '',
  });
}

export default {
  props: {
    row: Object,
  },
  emits: ['fetchRow'],
  components: {
    ConfirmationModel,
    TextInputLight,
    PopupButton,
  },
  data() {
    return {
      form: makeForm(this.row),
      show: false,
    };
  },
  watch: {
    row(row) {
      this.form = makeForm(row);
    },
  },
  methods: {
    update() {
      this.form.put(`/dashboard/users/admin/${this.row.hidden_id}/store`, {
        onSuccess: () => {
          this.$emit('fetchRow');
          this.show = false;
        },
      });
    },
    showUpdate() {
      this.show = true;
    },
    hideUpdate() {
      this.show = false;
    },
  },
};
</script>
<template>
  <button
    @click="showUpdate()"
    class="block border rounded border-orange p-1 align-middle
            text-center text-orange bg-primary hover:bg-orange hover:text-white"
    >
    Update
  </button>
  <ConfirmationModel
      :show="show"
      :close="() => hideUpdate()"
    >
    <template #title>
      Updating User: {{ form.name }}
    </template>
    <template #body>
      <TextInputLight
        class="mt-3 bg-white"
        v-model="form.new_email"
        label="New Email"
        :error="form.errors.new_email"
      />

      <TextInputLight
        class="mt-3 bg-white"
        v-model="form.new_password"
        label="New Password"
        type="password"
        :error="form.errors.new_password"
      />
      <TextInputLight
        class="mt-3 bg-white"
        v-model="form.password_confirm"
        label="Confirm Password"
        type="password"
        :error="form.errors.password_confirm"
      />
    </template>
    <template #buttons>
      <PopupButton @click="update"> Save </PopupButton>
      <PopupButton @click="hideUpdate"> Cancel </PopupButton>
    </template>
  </ConfirmationModel>
</template>
