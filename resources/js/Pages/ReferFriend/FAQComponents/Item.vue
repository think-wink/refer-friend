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
        <button :class="'w-full font-anton text-lg p-3 text-primary-dark text-left flex items-center '+(open ? ' bg-primary-light hover:bg-[#dddddd]' : '')" @click="$emit('toggleOpen', state.id)">
            <MinusIcon :class="icon_style" v-if="state.open" />
            <PlusIcon :class="icon_style" v-else />
            <span v-html="state.title" class="font-bold underline ml-2"></span>
        </button>
        <div v-show="state.open">
            <div class="m-5 border-b border-grey pb-2" >
                <div class="flex flex-col gap-3" v-html="state.content" />
            </div>
        </div>
    </div>
</template>