<script>
import { ref } from 'vue';
import vueFilePond from 'vue-filepond';
// eslint-disable-next-line import/extensions
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.esm.js';
// eslint-disable-next-line import/extensions
import FilePondPluginImagePreview from 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.esm.js';
import 'filepond/dist/filepond.min.css';
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css';
import axios from 'axios';
import InputLabel from './InputLabel.vue';

const FilePond = vueFilePond(FilePondPluginFileValidateType, FilePondPluginImagePreview);
export default {
  props: {
    modelValue: String,
    read_only: {
      type: Boolean,
      default: false,
    },
    error: String,
    label: String,
  },
  components: { FilePond, InputLabel },
  emits: ['update:modelValue'],
  data() {
    let cors_hack = false;
    if (typeof this.modelValue === 'string') {
      cors_hack = this.modelValue.split('')[0] !== '/';
    }
    const init_files = this.modelValue && !cors_hack ? [
      {
        source: this.modelValue,
        options: {
          type: 'local',
        },
      },
    ] : [];
    return {
      pond: ref(null),
      cors_hack,
      server: {
        headers: {
          'X-CSRF-TOKEN': this.$page.props.csrf_token,
        },
        process: {
          url: '/dashboard/upload_image/',
          onload: this.fileUploaded,
        },
        revert: (uid, load) => {
          axios.delete(`/dashboard/remove_image/${this.modelValue.split('/')[1]}`);
          load();
        },
        load: (source, load, error) => {
          axios.get(source, { responseType: 'blob' }).then((response) => {
            load(response.data);
          }).catch((error_name) => {
            error(error_name);
          });
        },
      },
      files: init_files,
    };
  },
  methods: {
    fileUploaded(response) {
      this.$emit('update:modelValue', response);
    },
    handleFilePondInit() {
      this.$refs.pond.getFiles();
    },
    removeFile() {
      this.cors_hack = false;
      this.$emit('update:modelValue', null);
    },
  },
};

</script>

<template>
  <div class="h-72 mb-8">
    <InputLabel :value="label" />
    <div v-if="read_only">
      <img :src="modelValue" class="max-h-72"/>
    </div>
    <div v-else-if="cors_hack">
      <button
        class="bg-white text-orange border m-3 p-2 rounded absolute
        hover:bg-orange hover:text-white"
        @click="removeFile"
        >
        Remove
      </button>
      <img :src="modelValue" class="max-h-72"/>
    </div>
    <file-pond
      v-else
      name="image"
      ref="pond"
      class-name="my-pond w-full"
      label-idle="Drop files here..."
      accepted-file-types="image/jpeg, image/png image/gif"
      :allow-multiple="false"
      v-on:init="handleFilePondInit"
      :server="server"
      :files="files"
      v-on:removefile="removeFile"
      />
      <p v-if="error" class="text-[red]"> {{ error }} </p>
  </div>
</template>
