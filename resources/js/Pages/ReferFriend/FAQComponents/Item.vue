<script>
import { Disclosure, DisclosureButton, DisclosurePanel } from '@headlessui/vue'
import { PlusIcon, MinusIcon } from '@heroicons/vue/20/solid'; 

export default {
    props: {
        state: Object
    },
    emits: ['toggleOpen'],
    components: { Disclosure, DisclosureButton, DisclosurePanel, PlusIcon, MinusIcon },
    data() { 
        return {
            icon_style: 'w-8 h-8 self-center'
        }
    },
}
</script>

<template>
    <div>
        <button 
            @click="$emit('toggleOpen', state.id)"
            :class="[
                'w-full font-anton text-lg p-3 text-primary-dark text-left',
                !open ? 'bg-primary-light hover:bg-[#dddddd]' : ''
            ]">
                <span class="flex flex-row gap-3">
                    <PlusIcon :class="icon_style" v-if="state.open" />
                    <MinusIcon :class="icon_style" v-else />
                    <div v-html="state.title" />
                </span>
        </button>
        <div v-show="state.open">
            <div class="m-5">
                <div class="flex flex-col gap-3" v-html="state.content" />
            </div>
        </div>
    </div>
</template>