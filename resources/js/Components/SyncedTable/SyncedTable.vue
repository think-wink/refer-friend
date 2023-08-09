<script>
import { ref, computed } from 'vue';
import axios from 'axios';
import PrimaryButton from '../PrimaryButton.vue';

async function getColumns(url) {
  return axios.get(url).then((response) => response.data);
}

async function getData(url, query_options) {
  // copy options because we only want to use our edits in the request
  const options = JSON.parse(JSON.stringify(query_options));

  // convert bools to string so they can be encoded in query string
  options.sort.descending = query_options.sort.descending ? '1' : '0';
  Object.keys(options.columns).forEach((key) => {
    options.columns[key] = options.columns[key] ? '1' : '0';
  });
  let items = await axios.get(url, { params: options })
    .then((response) => response.data);
  if (typeof items === 'string') {
    items = JSON.parse(items);
  }
  const items_keys = Object.keys(items.data);
  const keys = items_keys.length > 0
    ? Object.keys(items.data[items_keys[0]])
    : [];
  return {
    table_data: items.data,
    paginator: items.meta,
    keys,
  };
}

async function storeSessionData(key, state) {
  sessionStorage.setItem(key, JSON.stringify(
    state,
  ));
}

function getDefaultData(data) {
  const columns = {};
  const filters = {};
  Object.keys(data).forEach((key) => {
    const item = data[key];
    columns[key] = item.default;
    if (item.search !== 'none') {
      filters[key] = '';
    }
  });
  return {
    page: 1,
    sort: {
      column: 'id',
      descending: false,
    },
    columns,
    filters,
  };
}

async function getSessionData(key, default_data) {
  const data = sessionStorage.getItem(key);
  if (data) {
    return JSON.parse(data);
  }
  return getDefaultData(default_data);
}

export default {
  components: {
    PrimaryButton,
  },
  props: {
    data_url: String,
    columns_url: String,
  },
  async setup(props) {
    const columns = await getColumns(props.columns_url);
    const get_data_options = await getSessionData(props.data_url, columns);
    return {
      data: ref(await getData(
        props.data_url,
        get_data_options,
      )),
      columns,
      get_data_options,
    };
  },
  methods: {
    async getNewData(options) {
      storeSessionData(this.data_url, options);
      this.data = await getData(
        this.data_url,
        options,
      );
    },
    async updateFilter(key, value) {
      this.get_data_options.filters[key] = value;
      this.get_data_options.page = 1;
      this.getNewData(this.get_data_options);
    },
    async updateSelectedColumns(columns) {
      this.get_data_options.columns = columns;
      this.getNewData(this.get_data_options);
    },
    async updateSortColumn(column) {
      if (column === this.get_data_options.sort.column) {
        this.get_data_options.sort.descending = !this.get_data_options.sort.descending;
      } else {
        this.get_data_options.sort.column = column;
      }
      await this.getNewData(this.get_data_options);
    },
    async updatePageNumber(url) {
      const match = url.match(/\d$/);
      this.get_data_options.page = match ? match[0] : 1;
      this.getNewData(this.get_data_options);
    },
  },
  data() {
    return {};
  },
  provide() {
    return {
      sort: computed(() => this.get_data_options.sort),
      updateSort: this.updateSortColumn,
      selected_columns: computed(() => this.data.keys),
    };
  },
};
</script>

<template >
  <div class="text-white flex flex-row-reverse flex-wrap gap-2">
    <slot
      name="actions"
      :column_data="columns"
      :state_data="get_data_options"
      :updateSelectedColumns="updateSelectedColumns"
      :updateFilters="updateFilter"
    />
  </div>
  <table class="w-full text-white text-left">
    <thead class="">
      <tr>
        <slot name="headings" />
      </tr>
    </thead>
    <tbody>
      <tr
        v-for="row in data.table_data"
        :key="row.hidden_id"
        class="border-b dark:bg-gray-900 dark:border-gray-700"
        >
        <slot :row="row" name="row" />
      </tr>
    </tbody>
  </table>
  <div class="flex flex-wrap pt-5">
    <div v-for="link in data.paginator.links" :key="link.label" class="p-2">
      <PrimaryButton @click="updatePageNumber(link.url)" :selected="link.active" >
        <p v-html="link.label"> </p>
      </PrimaryButton>
    </div>
  </div>
</template>
