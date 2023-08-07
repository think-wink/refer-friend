<script setup>
import { router } from '@inertiajs/vue3';
import AppLayout from '../../Layouts/AppLayout.vue';
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import LogoutOtherBrowserSessionsForm from './Partials/LogoutOtherBrowserSessionsForm.vue';
import SectionBorder from '../../Components/SectionBorder.vue';
// import TwoFactorAuthenticationForm from './Partials/TwoFactorAuthenticationForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import PrimaryButton from '../../Components/PrimaryButton.vue';

defineProps({
  confirmsTwoFactorAuthentication: Boolean,
  sessions: Array,
});

const logout = () => {
  router.post(route('logout'));
};
</script>

<template>
  <AppLayout title="profile">
    <div class="mx-10">
      <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div v-if="$page.props.jetstream.canUpdateProfileInformation">
          <UpdateProfileInformationForm :user="$page.props.auth.user" />
          <SectionBorder />
        </div>

        <div v-if="$page.props.jetstream.canUpdatePassword">
          <UpdatePasswordForm class="mt-10 sm:mt-0" />

          <SectionBorder />
        </div>

        <!-- <div v-if="$page.props.jetstream.canManageTwoFactorAuthentication">
                    <TwoFactorAuthenticationForm
                        :requires-confirmation="confirmsTwoFactorAuthentication"
                        class="mt-10 sm:mt-0"
                    />

                    <SectionBorder />
                </div> -->

        <LogoutOtherBrowserSessionsForm :sessions="sessions" class="mt-10 sm:mt-0" />

        <template v-if="$page.props.jetstream.hasAccountDeletionFeatures">
          <SectionBorder />

          <DeleteUserForm class="mt-10 sm:mt-0" />
        </template>
        <div class="p-5">
          <PrimaryButton @click="logout"> Log Out</PrimaryButton>

        </div>
      </div>
    </div>
  </AppLayout>
</template>
