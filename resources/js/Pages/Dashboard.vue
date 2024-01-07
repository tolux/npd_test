<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";

import { useForm } from "@inertiajs/vue3";

import { ref } from "vue";
import { usePage } from "@inertiajs/vue3";
import { reactive } from "vue";

const page = usePage();

const form = useForm({
    csv: "",
});

const fileRef = ref(null);

const props = defineProps();

const pageMessages = reactive({
    successMessage: null,
    duplicateRecords: null,
});
function uploadCsv(e) {
    form.post(route("upload.csv"), {
        onSuccess: () => {
            fileRef.value = null;
            pageMessages.successMessage = page?.props?.flash?.success;
            pageMessages.duplicateRecords =
                page?.props?.flash?.duplicateRecords;
            setTimeout(() => {
                pageMessages.successMessage = null;
                pageMessages.duplicateRecords = null;
            }, 3000);
        },
    });
}
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                user Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4 text-center"
                >
                    <form @submit.prevent="uploadCsv">
                        <div
                            class="mb-3 flex items-center justify-center space-x-3"
                        >
                            <label for="csv_file" class="form-labe border p-2"
                                >Select CSV File</label
                            >
                            <input
                                type="file"
                                class="form-control"
                                id="csv_file"
                                name="csv"
                                :value="fileRef"
                                accept=".csv"
                                @input="form.csv = $event.target.files[0]"
                                required
                            />
                            <button
                                type="submit"
                                class="p-2 bg-blue-500 text-white rounded-md border"
                            >
                                upload
                            </button>
                        </div>

                        <div
                            v-if="pageMessages.successMessage"
                            class="text-green-500 text-center"
                        >
                            {{ pageMessages.successMessage }}

                            <span
                                class="text-yellow-500"
                                v-if="pageMessages.duplicateRecords > 0"
                            >
                                but there
                                {{
                                    pageMessages.duplicateRecords > 1
                                        ? "is"
                                        : "are"
                                }}
                                {{ pageMessages.duplicateRecords }}
                                duplicate file(s)
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
