<script>

import axios from 'axios';
import UpdateUser from './UpdateUser.vue';
import ListCell from '../../../Components/SyncedTable/DataRow/ListCell.vue';
import DateCell from '../../../Components/SyncedTable/DataRow/DateCell.vue';
import TextCell from '../../../Components/SyncedTable/DataRow/TextCell.vue';

export default {
  components: {
    UpdateUser,
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
  <TextCell :data="inner_row.name" />
  <TextCell :data="inner_row.email" />
  <DateCell :data="inner_row.updated_at" />
  <DateCell :data="inner_row.created_at" />
  <td>
    <UpdateUser :row="inner_row" @fetch-row="fetchRow" />
  </td>
</template>
