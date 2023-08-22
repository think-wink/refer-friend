<script>

import axios from 'axios';
import ListCell from '../../../Components/SyncedTable/DataRow/ListCell.vue';
import DateCell from '../../../Components/SyncedTable/DataRow/DateCell.vue';
import TextCell from '../../../Components/SyncedTable/DataRow/TextCell.vue';
import EditLink from '../../../Components/Links/EditLink.vue';

export default {
  components: {
    EditLink,
    ListCell,
    DateCell,
    TextCell,
  },
  props: {
    row: Object,
  },
  data() {
    return {
      inner_row: { ...this.row },
    };
  },
  watch: {
    row(new_row) {
      this.inner_row = { ...new_row };
    },
  },
  methods: {
    async fetchRow() {
      const response = await axios.get(`/dashboard/users/admin/${this.row.hidden_id}/get`);
      const new_row = {};
      Object.keys(response.data.data).forEach((key) => {
        if (key in this.row) {
          new_row[key] = response.data.data[key];
        }
      });
      this.inner_row = new_row;
    },
  },
};
</script>

<template>
  <TextCell :data="inner_row.id" />
  <TextCell :data="inner_row.email" />
  <TextCell :data="inner_row.phone_number" />
  <TextCell :data="inner_row.first_name" />
  <TextCell :data="inner_row.last_name" />
  <TextCell :data="inner_row.reward_status" />
  <TextCell :data="inner_row.match_status" />
  <TextCell :data="inner_row.referrer_email" />
  <DateCell :data="inner_row.updated_at" />
  <DateCell :data="inner_row.created_at" />
  <td>
    <EditLink
     :url="`/dashboard/referred/${inner_row.hidden_id}/get`"
    />
  </td>
</template>
