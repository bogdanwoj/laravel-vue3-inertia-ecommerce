<template>
    <UserLayout>
        <div class="flex items-center justify-center mt-5 ">
            <div class="w-full h-full max-w-sm bg-white border-2 border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700  p-3">
                <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ product.title }}</h5>

                <div class="border-b-2 " :style="{ minHeight: '16rem' }">
                    <div v-if="product.product_images.length <= 1" class="h-full w-full">
                        <img v-if="product.product_images.length > 0" :src="`/${product.product_images[0].image}`"
                             :alt="product.imageAlt"
                             class="h-full w-full object-cover object-center lg:h-full lg:w-full" />
                        <img v-else
                             src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/No-Image-Placeholder.svg/330px-No-Image-Placeholder.svg.png"
                             :alt="product.imageAlt"
                             class="h-full w-full object-cover object-center lg:h-full lg:w-full" />
                    </div>

                    <div v-else id="indicators-carousel" class="relative w-full" data-carousel="static">
                        <!-- Carousel wrapper -->
                        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                            <!-- Item 1 -->
                            <div v-for="image in product.product_images" :key="image.id" class="hidden duration-700 ease-in-out" data-carousel-item="active">
                                <img v-if="product.product_images.length > 0" :src="`/${image.image}`"
                                     :alt="product.imageAlt"
                                     class="h-full w-full object-cover object-center lg:h-full lg:w-full" />
                            </div>
                        </div>
                        <!-- Slider controls -->
                            <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                                    </svg>
                                    <span class="sr-only">Previous</span>
                                </span>
                            </button>
                            <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                    </svg>
                                    <span class="sr-only">Next</span>
                                </span>
                            </button>
                    </div>
                </div>
                <div class="px-5 pb-5">

                    <div class="flex items-center mt-2.5 mb-5">
                        <span> Brand: {{ product.brand.name }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-3xl font-bold text-gray-900 dark:text-white">Price ${{ product.price }}</span>
                    </div>
                    <div class="flex items-center justify-center mt-4">
                        <a  @click="addToCart(product)" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 cursor-pointer">Add to cart</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="items-center mt-10 p-5 border-t-4 overflow-y-auto max-h-20 " :style="{ minHeight: '16rem' }">
            <span class="text-3xl">Product Description</span>
            <div class="">
                {{ product.description }}
            </div>
        </div>
    </UserLayout>
</template>

<script setup>

import UserLayout from "@/Pages/User/Layouts/UserLayout.vue";
import {router} from "@inertiajs/vue3";

defineProps({
    product: Object
})

const addToCart = (product) => {
    router.post(route('cart.store',product), {
        onSuccess: (page) => {
            if (page.props.flash.success) {
                Swal.fire({
                    toast: true,
                    icon: "success",
                    position: "top-end",
                    showConfirmButton: false,
                    title: page.props.flash.success
                });
            }
        },
    })
}
</script>
