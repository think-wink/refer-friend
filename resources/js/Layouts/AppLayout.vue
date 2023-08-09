<script setup>
import { Link } from '@inertiajs/vue3';
import { Popover, PopoverButton, PopoverPanel } from '@headlessui/vue';
import { Bars3Icon } from '@heroicons/vue/24/outline';
import NavBar from './Parts/NavBar.vue';

defineProps({
  title: String,
});

</script>

<template>
  <div class="">
      <header class="">
        <div class="grid grid-cols-2">
          <img src="/img/logo.png" class="px-6 py-2"/>
          <div class="self-center justify-self-end">
            <div class="flex flex-row">
              <p class="text-white self-center justify-self-end mx-3">
              Welcome back, <span class="capitalize"> {{ $page.props.auth.user.name }} </span>!
              </p>
            </div>
          </div>
        </div>
        <div class="bg-orange py-7 hidden laptop:flex flex-row w-full">
          <h2 class="pl-10 font-extrabold text-4xl text-white capitalize">
            {{ title }}
          </h2>
          <div class="flex flex-row-reverse w-full">
            <NavBar
              icon_style="w-6 h-6 self-center text-white"
              row_style="px-4 flex flex-col"
              :title="title"
            />
          </div>
        </div>
        <div class="flex laptop:hidden bg-orange">
          <Popover class="relative">
            <PopoverButton>
              <Bars3Icon
                class="self-center w-12 h-12 text-white m-3"
              />
            </PopoverButton>
            <PopoverPanel>
              <div class="flex flex-col-reverse">
                <NavBar
                  icon_style="w-6 h-6 mr-2 mb-2 self-center text-white"
                  row_style="px-4 flex flex-row"
                  :title="title"
                />
              </div>
            </PopoverPanel>
          </Popover>
          <h2 class="absolute ml-16 font-extrabold text-4xl text-white capitalize mt-4">
            {{ title }}
          </h2>
        </div>
      </header>

      <!-- Page Content -->
      <main class="bg-primary min-h-[70vh]">
          <div class="p-5">
            <slot />
          </div>
      </main>

      <footer class="">
        <p class="text-text-second px-10 py-5">
          Copyright 2022 Think Wink Pty Ltd.
          <Link href="/" class="underline text-orange"> Privacy Policy </Link> &nbsp;|&nbsp;
          <Link href="/" class="underline text-orange"> Terms of Use </Link>
        </p>
      </footer>
  </div>
</template>
