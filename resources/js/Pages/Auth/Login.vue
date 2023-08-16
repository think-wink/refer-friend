<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

defineProps({
  canResetPassword: Boolean,
  status: String,
});

const form = useForm({
  email: '',
  password: '',
  remember: false,
});
const submit = () => {
  form.transform(data => ({
    ...data,
    remember: form.remember ? 'on' : '',
  })).post(route('login'), {
    onFinish: () => form.reset('password'),
  });
};
</script>

<template>
  <Head title="Log in" />

  <AuthenticationCard>
    <template #logo>
      <AuthenticationCardLogo />
    </template>
    <img src="/img/logo.png" class="mx-auto mb-5" />
    <div v-if="status" class="text-center font-medium text-sm text-orange">
      {{ status }}
    </div>
    <form @submit.prevent="submit">
      <div class="w-96 mx-auto">
        <div class="">
          <TextInput
            v-model="form.email"
            type="email"
            class="text-white"
            required
            autofocus
            autocomplete="username"
            placeholder="Username"
            :error="form.errors.email"
            label="Login"
          />
          <p class="ml-3 text-text-second text-sm pt-1"> Please enter your username</p>
        </div>
        <div class="mt-4">
          <TextInput
            id="password"
            v-model="form.password"
            :error="form.errors.password"
            type="password"
            label="Password"
            class=" text-white"
            required
            autocomplete="current-password"
            placeholder="Password" />
          <p class="ml-3 text-text-second text-sm"> Please enter your password and press submit</p>
        </div>
        <div class="flex flex-col items-end justify-end mt-4">
        <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
          submit
        </PrimaryButton>
      </div>
      </div>
    </form>
  </AuthenticationCard>
</template>
