<template>
    <UserLayout>


        <div v-for="order in orders" :key="order.id" class="relative max-w-screen-xl p-4 m-5 mx-auto overflow-x-auto border-4 rounded-[2rem]">
            <div class="px-6 py-3 text-2xl">
                Order ID #
                <b>
                    {{ order.id }}
                </b>
                <div>
                    At: {{ formatDate(order.created_at) }}
                </div>
            </div>
            <table v-show="order.order_items.length > 0"
                   class="w-full text-left text-gray-100 dark:text-gray-400 mb-10 bg-green-200 rounded"  >
                <thead class="text-xs text-gray-700 uppercase  dark:bg-gray-700 dark:text-gray-400  whitespace-nowrap">
                <tr class="text-red-600" >


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
                    <td scope="row" class="px-6 py-4 font-sm text-gray-900 dark:text-white" >
                        {{index + 1}}.
                    </td>
                    <td scope="row" class="px-6 py-4 font-large text-gray-900 dark:text-white">
                        {{item.product.title}}
                    </td>
                    <td class="px-6 py-1 font-large text-gray-900 dark:text-white">
                        {{item.product.brand.name}}
                    </td>
                    <td class="px-6 py-4 font-large text-gray-900 dark:text-white">
                        {{item.product.category.name}}
                    </td>
                    <td class="px-6 py-4 font-large text-gray-900 dark:text-white">
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
        orders: Array,
        ordersBy: Array
    });

    const formatDate = (dateString) => {
        const options = { day: '2-digit', month: '2-digit', year: 'numeric' };
        const formattedDate = new Date(dateString).toLocaleDateString(undefined, options);
        return formattedDate;
    };
</script>
