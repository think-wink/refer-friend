<script setup>
import axios from 'axios';
import AppLayout from '../../Layouts/AppLayout.vue';
import ConfirmationModel from '../../Components/ConfirmationModel.vue';
import PopupButton from '../../Components/PopupButton.vue';
</script>

<script>
export default {
  props: {
    tokens: Array,
  },
  data() {
    return {
      open: false,
      response: null,
    };
  },
  methods: {
    newToken() {
      axios.post('/dashboard/users/tokens/create').then((response) => {
        this.response = response.data;
        this.setOpen(true);
      });
    },
    setOpen(value) {
      this.open = value;
    },
  },
};
</script>

<template>
  <AppLayout title="API">
    <div class="grid grid-cols-2">
      <div class="ml-2 text-3xl text-white"> API Docs </div>
      <div class="justify-self-end">
        <button
            class="bg-orange text-white rounded py-2 mt-1 px-5 mr-5"
            @click="newToken"
          > Generate API key
        </button>
        <a
          class="bg-orange text-white rounded py-2 mt-1 px-5 inline-block"
          target="_blank"
          href="/docs"
        >  Main Docs Page</a>
      </div>
    </div>
      <ConfirmationModel
        :show="open"
          :close="() => setOpen(false)"
          >
          <template #title>
            <p class="break-all">your new api token is {{ response.token }}</p>
          </template>
          <template #buttons>
          <PopupButton @click="setOpen(false)"
          >
                close
          </PopupButton>
      </template>
    </ConfirmationModel>

    <iframe src="/docs" class="w-full h-[60vh] mt-4"> </iframe>
  </AppLayout>
</template>
