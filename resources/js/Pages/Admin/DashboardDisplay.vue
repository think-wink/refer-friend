<script>
import DashboardBody from './DashboardBody.vue';
import AppLayout from '../../Layouts/AppLayout.vue';

export default {
  components: { DashboardBody, AppLayout },
  methods: {
  },
};

</script>

<template>
  <AppLayout title="dashboard">
    <Suspense>
      <DashboardBody />
    </Suspense>
    <template #fallback>
      Loading ...
    </template>
  </AppLayout>
</template>
