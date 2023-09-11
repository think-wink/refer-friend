<script>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';

import ConfirmationModel from '../../../Components/ConfirmationModel.vue';
import PopupButton from '../../../Components/PopupButton.vue';

import AppLayout from '../../../Layouts/AppLayout.vue';
import SyncedTable from '../../../Components/SyncedTable/SyncedTable.vue';
import RowHeading from '../../../Components/SyncedTable/HeadingRow/RowHeading.vue';
import ColumnSelect from '../../../Components/SyncedTable/ActionsRow/ColumnSelect.vue';
import TextFilter from '../../../Components/SyncedTable/ActionsRow/TextFilter.vue';
import FilterEnums from '../../../Components/SyncedTable/ActionsRow/FilterEnums.vue';
import ReferredRow from './ReferredRow.vue'

export default {
  components: {
    ConfirmationModel,
    PopupButton,
    AppLayout,
    SyncedTable,
    RowHeading,
    ColumnSelect,
    TextFilter,
    FilterEnums,
    ReferredRow
  },
  props: {
    table: Object,
    user_url: String,
    roles: Array,
  },
  data() {
    return {
      table_key: ref(0),
      show_create: false,
      new_user_form: useForm({
        email: '',
      }),
    };
  },
  methods: {
    setCreate(value) {
      this.show_create = value;
    },
    createNewUser() {
      this.new_user_form.post('/dashboard/users/create', {
        preserveScroll: true,
        onSuccess: () => {
          this.setCreate(false);
          this.table_key += 1;
        },
      });
    },
  },
};
</script>

<template>
  <AppLayout title="referred_friends">
    <Suspense>
      <SyncedTable
        columns_url="/dashboard/referred/columns"
        data_url="/dashboard/referred/data"
        :key="table_key"
      >
        <template #actions="action_props">
          <ColumnSelect
            :initial_columns="action_props.state_data.columns"
            :update="action_props.updateSelectedColumns"
          />
          <FilterEnums
            :initial_filters="action_props.state_data.filters"
            :update="action_props.updateFilters"
            :columns="action_props.column_data"
          />
          <TextFilter
            :update="action_props.updateFilters"
            column_name="email"
          />
        </template>
        <template #headings>
            <RowHeading column_name="id" />
            <RowHeading column_name="email" />
            <RowHeading column_name="phone_number" />
            <RowHeading column_name="first_name" />
            <RowHeading column_name="last_name" />
            <RowHeading column_name="reward_status" />
            <RowHeading column_name="match_status" />
            <RowHeading column_name="referrer_email" />
            <RowHeading column_name="updated_at" />
            <RowHeading column_name="created_at" />
            <th> Actions </th>
        </template>
        <template #row="row_props">
          <ReferredRow :row="row_props.row" /> 
        </template>
      </SyncedTable>
    </Suspense>
    <template #fallback>
      <div class="text-white"> Loading ...</div>
    </template>
  </AppLayout>
</template>
