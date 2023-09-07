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
      <div class="flex justify-center pt-5">
        <div class="w-full">
          <img src="https://media.tenor.com/EWZCUGkCcIsAAAAd/old-man-my-computer.gif" alt="wierd gif" width="500" height="250" class="mx-auto" />
        </div>
      </div>
    </div>
  </ReferFriendLayout>
</template>