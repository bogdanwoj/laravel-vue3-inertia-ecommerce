<template>
    <UserLayout>


        <div class="relative max-w-screen-xl py-20 mt-5 mx-auto overflow-x-auto  ">
            <table v-show="order.order_items.length > 0" v-for="order in orders" :key="order.id"
                   class="w-full text-left text-gray-100 dark:text-gray-400 mb-5 "  >
                <thead class="text-xs text-gray-700 uppercase  dark:bg-gray-700 dark:text-gray-400  whitespace-nowrap">
                <tr class="text-red-600" >
                    <th scope="col" class="px-6 py-3">
                        Order ID # <b>{{ order.id }}</b>
                    </th>

                </tr>
                <tr class="text-red-400" >
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Product name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Brand
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>

                </tr>
                </thead>
                <tbody>
                <tr v-for="(item, index) in order.order_items" :key="item.id"
                    class="bg-green-100 border-b-2 dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-sm text-gray-900 dark:text-white">
                        {{index + 1}}.
                    </th>
                    <th scope="row" class="px-6 py-4 font-large text-gray-900 dark:text-white">
                        {{item.product.title}}
                    </th>
                    <td class="px-6 py-4">
                        {{item.product.brand.name}}
                    </td>
                    <td class="px-6 py-4">
                        {{item.product.category.name}}
                    </td>
                    <td class="px-6 py-4">
                        ${{item.product.price}}
                    </td>
                </tr>
                </tbody>
            </table>
        </div>



    </UserLayout>
</template>

<script setup>
    import UserLayout from './Layouts/UserLayout.vue';

    defineProps({
        orders: Array
    })
</script>
