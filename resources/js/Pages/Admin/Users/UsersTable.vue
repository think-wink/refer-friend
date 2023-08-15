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
import UserRow from './UserRow.vue';

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
    UserRow
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
  <AppLayout title="users">
    <Suspense>
      <SyncedTable
        columns_url="/dashboard/users/columns"
        data_url="/dashboard/users/data"
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
          <button
            class="px-2 text-white bg-orange rounded my-2" 
            @click="setCreate(true)"
          >
            New User
          </button>
          <ConfirmationModel
            :show="show_create"
            :close="() => setCreate(false)"
          >
            <template #title>
              Create a new User
            </template>
            <template #body>
              <div class="flex flex-row">
                <p> Email: </p>
                <input
                  v-model="new_user_form.email"
                  class="mx-3 px-2 text-primary border border-primary"
                />
              </div>
              <p
                v-if="new_user_form.errors.email"
                class="text-[red]"
              >
                {{ new_user_form.errors.email}}
              </p>
          </template>
        <template #buttons>
          <PopupButton @click="createNewUser"> Save </PopupButton>
          <PopupButton @click="setCreate(false)"> Cancel </PopupButton>
        </template>
          </ConfirmationModel>
        </template>
        <template #headings>
            <RowHeading column_name="id" />
            <RowHeading column_name="name" />
            <RowHeading column_name="email" />
            <RowHeading column_name="updated_at" />
            <RowHeading column_name="created_at" />
            <th> Actions </th>
        </template>
        <template #row="row_props">
          <UserRow :row="row_props.row" /> 
        </template>
      </SyncedTable>
    </Suspense>
    <template #fallback>
      <div class="text-white"> Loading ...</div>
    </template>
  </AppLayout>
</template>
