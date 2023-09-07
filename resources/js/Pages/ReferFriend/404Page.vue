<script>
  import ReferFriendLayout from "../../Layouts/ReferFriendLayout.vue";

  export default {
    props: ['uuid'],
    components: {
      ReferFriendLayout,
    },
  }
</script>

<template>
  <ReferFriendLayout>
    <div class="mx-auto py-12">
      <div class="flex justify-center pt-5">
        <div class="text-center text-toolbar w-2/3">
          <h3 class="text-5xl font-bold font-merry">Oops! Something went wrong</h3>
          <p class="my-4">
            Sorry the page you are looking for cannot be found.
          </p>
        </div>
      </div>
    </div>
  </ReferFriendLayout>
</template>