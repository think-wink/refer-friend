<script setup>
import { ref } from 'vue';
import axios from 'axios';
import { Popover, PopoverButton, PopoverPanel } from '@headlessui/vue';
import { AdjustmentsHorizontalIcon, AdjustmentsVerticalIcon } from '@heroicons/vue/24/solid';
import PrimaryButton from './PrimaryButton.vue';
</script>

<script>
export default {
  props: ['table_url', 'box_filter_column'],
  data() {
    const data = {
      table_data: [],
      keys: [],
      search_terms: {},
      paginator: {},
      columns: {},
      show_column_select: true,
      sort_column: 'id',
      sort_descending: true,
      page_url: `${this.table_url}/data`,
    };

    // Update state from session storage. don't update search terms as we need to request for this.
    const local_values = this.getSessionData();

    if (local_values === null) {
      return data;
    }

    Object.keys(data).forEach((key) => {
      if (Object.keys(local_values).includes(key) && key !== 'search_terms') {
        const default_value = data[key];
        const old_value = local_values[key];
        if (typeof default_value === typeof old_value) {
          data[key] = old_value;
        }
      }
    });

    return data;
  },
  methods: {
    showColumnSelect() {
      this.show_column_select = !this.show_column_select;
    },
    getData(url = this.page_url) {
      if (!url) {
        return;
      }
      this.page_url = url;
      let out_terms = null;
      if (this.search_terms) {
        out_terms = JSON.parse(JSON.stringify(this.search_terms));
        Object.keys(out_terms).forEach((key) => {
          out_terms[key].checked = out_terms[key].checked ? 1 : 0;
        });
      }
      axios.get(url, {
        params: {
          search_terms: out_terms,
          sort_column: this.sort_column,
          sort_descending: this.sort_descending ? '1' : '0',
        },
      }).then((response) => {
        if (typeof response.data === 'string') {
          response.data = JSON.parse(response.data);
        }
        const data = Object(response.data);
        this.paginator = data.meta;
        this.setTableData(data.data);
        this.setKeys(data.data);
        sessionStorage.setItem(this.table_url, this.toJSON());
      });
    },
    toJSON() {
      return JSON.stringify({
        table_data: this.table_data,
        keys: this.keys,
        current_page: this.current_page,
        search_terms: this.search_terms,
        show_column_select: this.show_column_select,
        sort_column: this.sort_column,
        sort_descending: this.sort_descending,
        page_url: this.page_url,

      });
    },
    setKeys(data) {
      const keys = Object.keys(data);
      if (keys.length > 0) {
        this.keys = Object.keys(this.table_data[keys[0]]);
      }
    },
    getSessionData() {
      return JSON.parse(sessionStorage.getItem(this.table_url));
    },
    getColumns() {
      axios.get(`${this.table_url}/columns`).then((response) => {
        this.columns = response.data;

        let session = this.getSessionData();
        if (session !== null) {
          session = session.search_terms;
        }
        Object.keys(this.columns).forEach((key) => {
          const default_col = {
            value: '',
            checked: this.columns[key][['default']],
          };

          if (session && key in session) {
            const { value, checked } = session[key];
            if ((typeof value) === (typeof default_col.value)) {
              default_col.value = session[key].value;
            }
            if ((typeof checked) === (typeof default_col.checked)) {
              default_col.checked = session[key].checked;
            }
          }
          this.search_terms[key] = default_col;
        });
        this.getData();
      });
    },
    setTableData(data) {
      this.table_data = ref(data);
    },
    updateSortColumn(column) {
      if (column === this.sort_column) {
        this.sort_descending = !this.sort_descending;
      } else {
        this.sort_column = column;
      }
      this.getData();
    },
  },
  mounted() {
    this.getColumns();
  },
};
</script>

<template>
  <div class="text-white flex flex-row-reverse flex-wrap">
    <Popover class="relative">
      <PopoverButton>
        <div class="flex flex-row bg-orange px-4 py-2 rounded my-2">
          <AdjustmentsHorizontalIcon
            class="self-center w-6 h-6 mr-1"
          />
          <p class="">Column Select</p>
        </div>
      </PopoverButton>
      <PopoverPanel class="absolute mt-3 z-10 right-0 w-44 rounded bg-white ">
        <div v-for="value, key in columns" :key="key" >
          <div class="flex flex-row p-2">
            <input
              v-model="search_terms[key]['checked']"
              class="mt-1 mr-3 text-orange"
              type="checkbox"
              :id="key"
              @change="getData()"
            >
            <p class="text-[black]">{{key.replaceAll('_', ' ')}}</p>
          </div>
        </div>
      </PopoverPanel>
    </Popover>
    <Popover class="relative mr-3">
      <PopoverButton>
        <div class="flex flex-row bg-orange px-4 my-2 py-2 rounded">
          <AdjustmentsVerticalIcon
            class="self-center w-6 h-6 mr-1"
          />
          <p class="">Filter</p>
        </div>
      </PopoverButton>
      <PopoverPanel class="absolute mt-3 z-10 right-0 w-72 bg-white rounded text-[black]">
        <div v-for="value, key in columns" :key="key">
          <div class="grid grid-cols-2 p-2" v-if="value.search === 'enum'">
            <p class="mt-2">{{key.replaceAll('_', ' ')}}: </p>
            <select
              :id="key"
              class="border border-orange text-black"
              v-model="search_terms[key].value"
              @change="getData()"
            >
              <option value="">All Option </option>
              <!-- we can check if the given key is a string. this means it was set in the
                controller. If it is not a string it means it is an assigned array
                index and we should default to the value.  -->
              <option
                v-for="value, key2 in value['levels']"
                :key="`${key}.${key2}`"
                :value="typeof key2 === 'string' ? key2 : value"
              >
                {{ value }}
              </option>
            </select>
          </div>
        </div>
      </PopoverPanel>
    </Popover>
    <div
      v-if="search_terms[box_filter_column]"
      class="border border-[#999] rounded mx-2 my-2 flex flex-row">
      <input
          v-model="search_terms[box_filter_column].value"
          class=" bg-primary p-2"
          placeholder="Search here"
          @keyup="getData()"
          @change="getData()"
      />
      <button class="bg-orange px-2"> Search </button>
    </div>
    <slot name="buttons" :search_terms="search_terms"/>
  </div>
  <table class="w-full text-white text-left">
    <thead class="">
      <tr>
        <slot
          name="colNames"
          :keys="keys"
          :func="updateSortColumn"
          :sort_column="sort_column"
          :sort_descending="sort_descending"
        />
      </tr>
    </thead>
    <tbody>
      <tr
        v-for="row in table_data"
        :key="`row-${row.hidden_id}`"
        class="border-b dark:bg-gray-900 dark:border-gray-700"
        >
        <slot :key="`slot-${row.hidden_id}`" name="row" :row="row" />
      </tr>
    </tbody>
  </table>
  <div class="flex flex-wrap pt-5">
    <div v-for="i in paginator.links" :key="i" class="p-2">
      <PrimaryButton @click="getData(i.url)" :selected="i.label == paginator.current_page" >
        <p v-html="i.label" />
      </PrimaryButton>
    </div>
  </div>
</template>
