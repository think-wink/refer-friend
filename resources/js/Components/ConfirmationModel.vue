<script setup>
import {
  Dialog,
  DialogPanel,
  DialogTitle,
  DialogDescription,
} from '@headlessui/vue';

defineProps({
  show: {
    type: Boolean,
  },
  close: {
    type: Function,
  },
});

</script>

<template>
  <Dialog :open="show" @close="close" class="relative z-10">
    <div class="fixed inset-0 overflow-y-auto">
      <div class="flex min-h-full items-center justify-center p-4 text-center">
        <DialogPanel class="w-full max-w-md transform overflow-hidden rounded-2xl bg-white
                            p-6 text-left align-middle shadow-xl transition-all">
          <DialogTitle class="text-lg font-medium leading-6 text-gray-900 p-3">
            <slot name="title" />
          </DialogTitle>
          <DialogDescription class="p-3">
            <slot name="body" />
          </DialogDescription>
          <div class="pt-6 grid grid-cols-2 justify-items-center">
            <slot name="buttons" />
          </div>
        </DialogPanel>
      </div>
    </div>
  </Dialog>
</template>
