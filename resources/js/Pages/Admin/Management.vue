<script setup>
import AuthenticatedLayout from "@/Layouts/AdminAuthenticatedLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { reactive, onMounted } from "vue";
import { getToday, getOneYearAgo } from "@/common";
import Chart from "@/Components/Chart.vue";
import ResultTable from "@/Components/ManagementResultTable.vue";

onMounted(() => {
    form.startDate = getOneYearAgo();
    form.endDate = getToday();
});

const form = reactive({
    startDate: null,
    endDate: null,
    type: "perDay",
});

const data = reactive({});

const getData = async () => {
    try {
        await axios
            .get("/api/management/", {
                params: {
                    startDate: form.startDate,
                    endDate: form.endDate,
                    type: form.type,
                },
            })
            .then((res) => {
                data.data = res.data.data;
                if (res.data.labels) {
                    data.labels = res.data.labels;
                }
                data.totals = res.data.totals;
                data.type = res.data.type;
                console.log(res.data);
            });
    } catch (e) {
        console.log(e.message);
    }
};
</script>

<template>
    <Head title="ユーザー管理" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                ユーザー管理
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form @submit.prevent="getData">
                            集計方法<br />
                            <input
                                type="radio"
                                v-model="form.type"
                                value="perDay"
                                checked
                            /><span class="mr-2">ユーザー別</span>
                            <br />
                            From:
                            <input
                                type="date"
                                name="startDate"
                                v-model="form.startDate"
                                class="sm:mt-0 mt-2"
                            />
                            <br class="sm:hidden block" />
                            To:
                            <input
                                type="date"
                                name="endDate"
                                v-model="form.endDate"
                                class="sm:ml-0 ml-5 sm:mt-0 mt-2"
                            /><br />

                            <button
                                class="mt-4 flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg"
                            >
                                集計する
                            </button>
                        </form>
                        <div v-show="data.data">
                            <div>
                                <Chart :data="data" />
                            </div>
                            <ResultTable :data="data" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
