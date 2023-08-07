<script>
import { ref } from 'vue';
import { Link, useForm } from '@inertiajs/vue3';
import ActionMessage from '../../../Components/ActionMessage.vue';
import FormSection from '../../../Components/FormSection.vue';
import InputError from '../../../Components/InputError.vue';
import InputLabel from '../../../Components/InputLabel.vue';
import PrimaryButton from '../../../Components/PrimaryButton.vue';
import TextInput from '../../../Components/TextInput.vue';
import ImageUpload from '../../../Components/ImageUpload.vue';

export default {
  components: {
    ActionMessage,
    FormSection,
    InputError,
    InputLabel,
    PrimaryButton,
    TextInput,
    ImageUpload,
    // eslint-disable-next-line vue/no-reserved-component-names
    Link,
  },
  props: {
    user: Object,
  },
  data() {
    return {
      form: this.makeUserForm(this.user),
      verificationLinkSent: ref(null),
    };
  },
  watch: {
    user(new_user) {
      this.form = this.makeUserForm(new_user);
    },
  },
  methods: {
    makeUserForm(data) {
      return useForm({
        _method: 'PUT',
        profile_photo_path: data.profile_photo_url,
        name: data.name,
        email: data.email,
      });
    },
    updateProfileInformation() {
      this.form.post(`/dashboard/users/${this.user.id}/store`, {
        errorBag: 'updateProfileInformation',
        preserveScroll: true,
        resetOnSuccess: true,
      });
    },
    sendEmailVerification() {
      this.verificationLinkSent.value = true;
    },
  },
};
</script>

<template>
  <FormSection @submitted="updateProfileInformation">
    <template #title>
      Profile Information
    </template>

    <template #description>
      Update your account's profile information and email address.
    </template>

    <template #form>
      <ImageUpload
        v-model="form.profile_photo_path"
        :error="form.errors.image"
        label="Image"
      />
      <!-- Name -->
      <div class="col-span-6 sm:col-span-4 mt-3">
        <InputLabel for="name" value="Name" />
        <TextInput
          id="name"
          v-model="form.name" type="text" class="mt-1 block w-full" autocomplete="name" />
        <InputError :message="form.errors.name" class="mt-2" />
      </div>

      <!-- Email -->
      <div class="col-span-6 sm:col-span-4 mt-3">
        <InputLabel for="email" value="Email" />
        <TextInput
          id="email"
          v-model="form.email"
          type="email"
          class="mt-1 block w-full"
          autocomplete="username" />
        <InputError :message="form.errors.email" class="mt-2" />

        <div v-if="$page.props.jetstream.hasEmailVerification && user.email_verified_at === null">
          <p class="text-sm mt-2 dark:text-white">
            Your email address is unverified.

            <Link :href="route('verification.send')" method="post" as="button"
              class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
              @click.prevent="sendEmailVerification">
            Click here to re-send the verification email.
            </Link>
          </p>

          <div v-show="verificationLinkSent" class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
            A new verification link has been sent to your email address.
          </div>
        </div>
      </div>
    </template>

    <template #actions>
      <ActionMessage :on="form.recentlySuccessful" class="mr-3">
        Saved.
      </ActionMessage>

      <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
        Save
      </PrimaryButton>
    </template>
  </FormSection>
</template>
