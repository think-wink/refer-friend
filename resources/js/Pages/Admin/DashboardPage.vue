<script>
import AppLayout from '../../Layouts/AppLayout.vue';
import EmailStats from "../../Components/Stats/EmailStats.vue";
import SubscribedStats from "../../Components/Stats/SubscribedStats.vue";

export default {
  components: {
    AppLayout,
    EmailStats,
    SubscribedStats,
  },
};
</script>

<template>
  <AppLayout>
    <div class="mx-auto divide-y divide-grey-dark text-white" style="max-width: 1200px;">
      <EmailStats />
      <SubscribedStats />
    </div>
  </AppLayout>
</template>
