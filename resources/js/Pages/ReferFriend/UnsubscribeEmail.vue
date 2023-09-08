<script>
  import ReferFriendLayout from "../../Layouts/ReferFriendLayout.vue";

  export default {
    props: ['type', 'uuid'],
    components: {
      ReferFriendLayout,
    },
    data(){
      return {
        message: '',
        error: '',
      }
    },
    methods: {
      async unsubscribe(){
        try {
            const response = await axios.post(`/api/${this.type}/${this.uuid}/unsubscribe`, {});
            this.message = response.data.message;
        } catch (error) {
          this.error = 'An Error Occurred';
        }
      }
    },
    mounted() {
      this.unsubscribe();
    }
  }
</script>

<template>
  <ReferFriendLayout>
    <div class="mx-auto py-12 text-center">
      <h1 class="text-2xl text-toolbar" v-if="message !== ''">
        {{ message }}
      </h1>
      <h1 class="text-2xl text-red" v-else>
        {{ error }}
      </h1>
    </div>
  </ReferFriendLayout>
</template>