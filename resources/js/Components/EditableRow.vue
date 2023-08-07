<script>
import axios from 'axios';
import { Link as ILink } from '@inertiajs/vue3';
import ConfirmationModel from './ConfirmationModel.vue';
import EnabledButton from './EnabledButton.vue';
import PopupButton from './PopupButton.vue';

export default {
  props: {
    row_props: Object,
    get_url: String,
    source_type: String,
  },
  components: {
    ConfirmationModel,
    EnabledButton,
    ILink,
    PopupButton,
  },
  data() {
    return {
      row: this.row_props.row,
      enable_visible: false,
    };
  },
  watch: {
    row_props(new_row) {
      this.row = new_row.row;
    },
  },
  methods: {
    enable() {
      if (this.row.enabled) {
        axios.get(`${this.get_url}/${this.row.hidden_id}/disable`);
      } else {
        axios.get(`${this.get_url}/${this.row.hidden_id}/enable`);
      }
      this.enable_visible = false;
      this.row.enabled = !this.row.enabled;
    },
    showEnable() {
      this.enable_visible = true;
    },
    hideEnable() {
      this.enable_visible = false;
    },
  },
};
</script>
<template>
  <slot :row="row"/>
  <td>
    <div class="flex flex-row gap-2">
      <ILink
        :href="`${get_url}/${row_props.row.hidden_id}`"
        class="border rounded border-orange px-4 py-1 my-1 text-center text-orange bg-primary
             hover:bg-orange hover:text-white"
      >
        Edit
      </ILink>
      <div class="">
        <EnabledButton
          :enabled="row.enabled"
          @click="showEnable"
        />
      </div>
    </div>
  </td>
  <ConfirmationModel
    :show="enable_visible"
    :close="() => hideEnable"
  >
    <template #title>
      {{ row.enabled ? 'Disable' : 'Enable'}} this {{ source_type }}
    </template>
    <template #body>
      Are you sure you want to this {{ row.enabled ? 'Disable' : 'Enable'}}
      {{ source_type }}
    </template>
    <template #buttons>
      <PopupButton @click="enable">
        {{ row.enabled ? 'Disable' : 'Enable' }}
      </PopupButton>
      <PopupButton @click="hideEnable"> Cancel </PopupButton>
    </template>
  </ConfirmationModel>
</template>
