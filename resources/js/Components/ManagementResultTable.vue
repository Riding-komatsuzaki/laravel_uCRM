<script setup>
const props = defineProps({
    data: Object,
});
</script>

<template>
    <div class="lg:w-2/3 w-full mx-auto overflow-auto">
        <table class="table-auto w-full text-left whitespace-no-wrap">
            <thead>
                <tr>
                    <th
                        class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl"
                    >
                        名前
                    </th>
                    <th
                        class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100"
                    >
                        金額
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in data.data" :key="item.user_name">
                    <td class="px-4 py-3">
                        {{ item.user_name }}
                    </td>
                    <td class="px-4 py-3">{{ item.total }}円</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
