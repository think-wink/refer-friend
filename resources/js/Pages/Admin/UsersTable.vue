<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import AppLayout from '../../Layouts/AppLayout.vue';
import SyncedTable from '../../Components/SyncedTable.vue';
import ConfirmationModel from '../../Components/ConfirmationModel.vue';
import RowTitle from '../../Components/RowTitle.vue';
import TableCell from '../../Components/TableCell.vue';
import TextInputLight from '../../Components/TextInputLight.vue';
import PopupButton from '../../Components/PopupButton.vue';
</script>

<script>
export default {
  props: {
    table: Object,
    user_url: String,
    roles: Array,
  },
  data() {
    return {
      table_key: ref(0),
      show_update_user: false,
      show_create: false,
      user_row: {},
      update_user_form: null,
      new_user_form: useForm({
        email: '',
      }),
    };
  },
  methods: {
    hideUpdateUser() {
      this.show_update_user = false;
    },
    setCreate(value) {
      this.show_create = value;
    },
    showUpdateUser(props) {
      this.user_row = props.row;
      const user_form = {
        new_email: '',
        new_password: '',
        password_confirm: '',
      };
      this.roles.forEach((value) => {
        if (this.user_row.role_names.includes(value.type)) {
          user_form[value.type] = true;
        } else {
          user_form[value.type] = false;
        }
      });
      this.update_user_form = useForm({ ...user_form });
      this.show_update_user = true;
    },
    updateUser() {
      this.update_user_form.put(`${this.user_url}${this.user_row.id}/store`, {
        onSuccess: () => {
          this.show_update_user = false;
          this.table_key += 1;
        },
      });
    },
    createNewUser() {
      this.new_user_form.post(`${this.user_url}create`, {
        preserveScroll: true,
        onSuccess: () => {
          this.setCreate(false);
          this.table_key += 1;
        },
      });
    },
    parseDate(value) {
      const date = new Date(value);
      return date.toLocaleString();
    },
  },
};
</script>

<template>
  <AppLayout title="users">
    <ConfirmationModel
      :show="show_update_user"
      :close="() => hideUpdateUser()"
    >
      <template #title>
        Updating User: {{ user_row.name }}
      </template>
      <template #body>
        <p class="text-xl">Roles</p>
        <div v-for="role in roles" :key="role.id" class="flex flex-row">
          <input
            v-model="update_user_form[role.type]"
            class="mt-1 mr-3 text-orange "
            type="checkbox"
          />
          <p> {{ role.type }}</p>
        </div>

        <TextInputLight
          class="mt-3 bg-white"
          v-model="update_user_form.new_email"
          label="New Email"
          :error="update_user_form.errors.new_email"
        />

        <TextInputLight
          class="mt-3 bg-white"
          v-model="update_user_form.new_password"
          label="New Password"
          type="password"
          :error="update_user_form.errors.new_password"
        />
        <TextInputLight
          class="mt-3 bg-white"
          v-model="update_user_form.password_confirm"
          label="Confirm Password"
          type="password"
          :error="update_user_form.errors.password_confirm"
        />
      </template>
      <template #buttons>
        <PopupButton @click="updateUser"> Save </PopupButton>
        <PopupButton @click="hideUpdateUser"> Cancel </PopupButton>
      </template>
    </ConfirmationModel>
    <SyncedTable
      v-bind="table"
      :key="table_key"
    >
      <template #buttons>
        <button class="mx-3 px-2 text-white bg-orange rounded my-2" @click="setCreate(true)">
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
      <template #colNames="row_props">
          <RowTitle :row_props="row_props" item_id="id" />
          <RowTitle :row_props="row_props" item_id="name" />
          <RowTitle :row_props="row_props" item_id="email" />
          <RowTitle :row_props="row_props" item_id="role_names" />
          <RowTitle :row_props="row_props" item_id="updated_at" />
          <RowTitle :row_props="row_props" item_id="created_at" />
          <th> Actions </th>
      </template>
      <template #row="row_props">
        <TableCell :row_props="row_props" item_id="id" />
        <TableCell :row_props="row_props" item_id="name" />
        <TableCell :row_props="row_props" item_id="email" />
        <TableCell :row_props="row_props" item_id="role_names" />
        <TableCell :row_props="row_props" item_id="updated_at" />
        <TableCell :row_props="row_props" item_id="created_at" />
        <td>
          <button
            @click="showUpdateUser(row_props)"
            :id="row_props.id"
            class="block border rounded border-orange p-1 align-middle
                   text-center text-orange bg-primary hover:bg-orange hover:text-white"
            >
            Update
          </button>
        </td>
      </template>
    </SyncedTable>
  </AppLayout>
</template>
