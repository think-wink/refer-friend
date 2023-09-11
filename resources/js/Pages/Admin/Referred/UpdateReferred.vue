<script>
import axios from 'axios';
import ConfirmationModel from '../../../Components/ConfirmationModel.vue';
import PopupButton from '../../../Components/PopupButton.vue';
import TextInput from '../../../Components/TextInput.vue';
import EnumInput from '../../../Components/EnumInput.vue';

import AppLayout from '../../../Layouts/AppLayout.vue';

export default {
  props: {
    row: Object,
    statusList: Object,
  },
  components: {
    AppLayout,
    ConfirmationModel,
    TextInput,
    PopupButton,
    EnumInput,
  },
  data() {
    return {
      update_form: {
        reward_status: '',
        email: '',
        phone_number: '',
        first_name: '',
        last_name: '',
        errors: {},
      },
      merge_form: {
        reward_status: '',
        merge_email: '',
        errors: {},
      },
      show_merge: false,
      show_update: false,
    };
  },
  methods: {
    async update(form, url) {
      try {
        const out_form = {};
        Object.keys(form).forEach( (key) => {
          if(form[key]) {
            out_form[key] = form[key];
          }
        });
        const result = await axios.post(url, out_form);
        console.log(result);
        location.reload();
      } catch(error) {
        if (error.response && error.response.status === 422) {
          form.errors = error.response.data.errors;
        } else {
          console.log(error);
        }
      } finally {
        this.show_update = false;
        this.show_merge = true;
      }
    },
    showUpdate() {
      this.show_update = true;
    },
    hideUpdate() {
      this.show_update = false;
    },
    showMerge() {
      this.show_merge = true;
    },
    hideMerge() {
      this.show_merge = false;
    },
  },
};
</script>

<template>
  <AppLayout>
    <div class="text-white">
      <TextInput
        class="mt-3 text-white"
        v-model="update_form.email"
        label="New Email"
        :error="update_form.errors.email"
      />
      {{row.data.email}}
      <EnumInput
        class="mt-3 text-white"
        v-model="update_form.reward_status"
        :options="statusList"
        label="Reward Status"
        :error="update_form.errors.reward_status"
      />
      {{row.data.reward_status}}
      <TextInput
        class="mt-3"
        v-model="update_form.phone_number"
        label="Phone number"
        :error="update_form.errors.phone_number"
      />
      {{row.data.phone_number}}
      <TextInput
        class="mt-3 text-white"
        v-model="update_form.first_name"
        label="First name"
        :error="update_form.errors.first_name"
      />
      {{row.data.first_name}}
      <TextInput
        class="mt-3 text-white"
        v-model="update_form.last_name"
        label="Last name"
        :error="update_form.errors.last_name"
      />
      {{row.data.last_name}}
      <button
        @click="showUpdate()"
        class="block border rounded border-orange p-1 align-middle mt-5
                text-center text-orange bg-primary hover:bg-orange hover:text-white"
        >
          <div> Update </div>
      
          <ConfirmationModel
            :show="show_update"
            :close="() => hideUpdate()"
          >
            <template #title>
              Updating Referred Friend
            </template>
            <template #body>
              <div>
                <p> Update this referred friend</p>
      
              </div>
            </template>
            <template #buttons>
              <PopupButton @click="() => update(update_form, `/api/referred/${this.row.data.hidden_id}/update`)"> Save </PopupButton>
              <PopupButton @click="hideUpdate"> Cancel </PopupButton>
            </template>
          </ConfirmationModel>
      </button>
      <p class="pt-5 text-white"> Merge Referred Friend record into this record</p>
      <p class="pt-5 text-white"> This should be done to clean up friends with match_status of "failed"</p>
      <TextInput
        class="mt-3 text-white"
        v-model="merge_form.merge_email"
        label="Merge Email"
        :error="merge_form.errors.merge_email"
      />
      <EnumInput
        class="mt-3 text-white"
        v-model="merge_form.reward_status"
        :options="statusList"
        label="Reward Status"
        :error="merge_form.errors.reward_status"
      />
      <button
        @click="showMerge()"
        class="block border rounded border-orange p-1 align-middle mt-5
                text-center text-orange bg-primary hover:bg-orange hover:text-white"
      >
        <div> Merge </div>
    
        <ConfirmationModel
          :show="show_merge"
          :close="() => hideMerge()"
        >
          <template #title>
            Merging Referred Friend
          </template>
          <template #body>
            <div>
              <p> Merge this referred friend</p>
            </div>
          </template>
          <template #buttons>
            <PopupButton @click="() => update(merge_form, `/api/referred/${this.row.data.hidden_id}/merge`)"> Save </PopupButton>
            <PopupButton @click="() => hideMerge()"> Cancel </PopupButton>
          </template>
          </ConfirmationModel>
      </button>
    </div>
  </AppLayout>
</template>
