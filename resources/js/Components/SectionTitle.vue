<template>
    <div class="md:col-span-1 flex justify-between text-white p-4">
        <div class="px-4 sm:px-0">
            <h3 class="text-2xl font-medium text-gray-900">
                <slot name="title" />
            </h3>

            <p class="mt-1 text-sm ">
                <slot name="description" />
            </p>
        </div>

        <div class="px-4 sm:px-0">
            <slot name="aside" />
        </div>
    </div>
</template>
