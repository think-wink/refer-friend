<script setup>
import { ref } from 'vue';
import axios from 'axios';
import { ArrowPathIcon } from '@heroicons/vue/24/outline';
import { useForm, router } from '@inertiajs/vue3';
import ConfirmationModel from './ConfirmationModel.vue';
import EnabledButton from './EnabledButton.vue';
import PopupButton from './PopupButton.vue';

</script>

<script>
export default {
  props: {
    details: Object,
    initial_enabled: Boolean,
    save_url: String,
    source_name: String,
    id: Number,
    source_data: Object,
    deletable: Boolean,
    errors: Object,
    columns: Array,
  },
  data() {
    return {
      form: this.makeForm(this.details),
      enabled: this.initial_enabled,
      loading: false,
      is_save_open: ref(false),
      is_unlock_open: ref(false),
      is_enable_open: ref(false),
      is_delete_open: ref(false),
      input_key: 1,
    };
  },
  watch: {
    details(data) {
      this.form = this.makeForm(data);
    },
  },
  methods: {
    makeForm(data) {
      const state = {};
      this.columns.forEach((key) => {
        if (typeof data[key] !== 'undefined') {
          state[key] = data[key];
        }
      });
      // eslint-disable-next-line no-underscore-dangle
      state._method = 'POST';
      return useForm({ ...state });
    },
    setIsSaveOpen(value) {
      this.is_save_open = value;
    },
    setIsUnlockOpen(value) {
      this.is_unlock_open = value;
    },
    setIsEnableOpen(value) {
      this.is_enable_open = value;
    },
    setIsDeleteOpen(value) {
      this.is_delete_open = value;
    },
    submit() {
      this.is_save_open = false;
      this.form.post(`${this.save_url}/store`, {
        preserveScroll: true,
      });
    },
    unlock() {
      this.is_unlock_open = false;
      router.get(`${this.save_url}/unlock`, undefined, { preserveScroll: true });
    },
    enable() {
      if (this.enabled) {
        axios.get(`${this.save_url}/disable`);
      } else {
        axios.get(`${this.save_url}/enable`);
      }
      this.is_enable_open = false;
      this.enabled = !this.enabled;
    },
    deleteItem() {
      router.get(`${this.save_url}/delete`, undefined, { preserveScroll: true });
      this.is_delete_open = false;
    },
  },
};
</script>

<template>
  <div class="col-span-4 mb-12">
    <div class="pb-5">
      <div :class="source_data ? 'grid grid-cols-2 gap-5':'' ">
        <p class="text-xl font-bold"> Edit {{source_name}}</p>
        <p v-if="source_data" class="text-xl font-bold"> Original Data</p>
      </div>
    </div>
    <div :class="source_data ? 'grid grid-cols-2 gap-4': ''">
      <div class="flex flex-col gap-4">
        <slot name="data" :data="form" :errors="form.errors || {}"/>
      </div>
      <div class="flex flex-col gap-4">
        <slot
          name="data"
          v-if="source_data"
          :data="source_data"
          :errors="{}"
          :read_only="true"
        />
      </div>
    </div>
    <div class="flex flex-row gap-3 mt-4">
      <ConfirmationModel
      :show="is_save_open"
      :close="() => setIsSaveOpen(false)"
      >
        <template #title>
          Save {{ source_name }}
        </template>
        <template #body>
          <p>Save your changes to this {{ source_name }}</p>
          <p>
            Are you sure you want to save your changes to this source ?
          </p>
          <p v-if="!source_data">
            This is will lock this source and it will no longer auto update via it's API.
          </p>
        </template>
        <template #buttons>
          <PopupButton @click="submit"> Save </PopupButton>
          <PopupButton @click="setIsSaveOpen(false)"> Cancel </PopupButton>
        </template>
      </ConfirmationModel>
      <button
        :disabled="form.processing"
        class="bg-[green] px-4 py-1 my-1 rounded"
        @click="setIsSaveOpen(true)"
      >
      <div class="flex flex-row">
        <ArrowPathIcon
          v-if="form.processing"
          class="animate-spin w-4 h-4 m-1 text-white"
          />
          <p>Save</p>
      </div>
    </button>

      <ConfirmationModel
      :show="is_unlock_open"
      :close="() => setIsUnlockOpen(false)"
      >
        <template #title>
          Unlock {{ source_name }}
        </template>
        <template #body>
          <p> Unlock this {{ source_name }}</p>
          <p>
            Are you sure you want to unlock this source {{ source_name }} ?
            this will remove any changes you have made and use data we receive from the
            API instead.
          </p>
        </template>
        <template #buttons>
          <PopupButton @click="unlock"> Save </PopupButton>
          <PopupButton @click="setIsUnlockOpen(false)"> Cancel </PopupButton>
        </template>
      </ConfirmationModel>

      <button
        v-if="source_data"
        class="bg-white text-[black] rounded px-4 py-1 my-1"
        @click="setIsUnlockOpen(true)"
      >
        Unlock
    </button>

      <ConfirmationModel
      :show="is_enable_open"
      :close="() => setIsEnableOpen(false)"
      >
        <template #title>
          {{ enabled ? 'Disable' : 'Enable'}} {{ source_name }}
        </template>
        <template #body>
          <p>
            {{ enabled ? 'Disable' : 'Enable'}} this {{ source_name }}</p>
          <p>
            Are you sure you want to {{ enabled ? 'Disable' : 'Enable'}}
            this source {{ source_name }} ?
          </p>
        </template>
        <template #buttons>
          <PopupButton @click="enable"> Save </PopupButton>
          <PopupButton @click="setIsEnableOpen(false)"> Cancel </PopupButton>
        </template>
      </ConfirmationModel>

      <EnabledButton
        :enabled="enabled"
        @click="setIsEnableOpen(true)"
      />

      <ConfirmationModel
      :show="is_delete_open"
      :close="() => setIsDeleteOpen(false)"
      >
        <template #title>
          Delete {{ source_name }}
        </template>
        <template #body>
          <p>
            Are you sure you want to delete {{ source_name }}
          </p>
        </template>
        <template #buttons>
          <PopupButton @click="deleteItem"> Delete </PopupButton>
          <PopupButton @click="setIsDeleteOpen(false)"> Cancel </PopupButton>
        </template>
      </ConfirmationModel>

      <button
        v-if="deletable"
        class="bg-[red] px-4 py-1 my-1 rounded"
        @click="setIsDeleteOpen(true)"
      >
        Delete
      </button>
    </div>
  </div>
</template>
