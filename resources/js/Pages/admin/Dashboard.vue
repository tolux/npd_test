<script setup>
import { Head } from "@inertiajs/vue3";
import DropdownLink from "@/Components/DropdownLink.vue";
import Dropdown from "@/Components/Dropdown.vue";
</script>

<template>
    <Head title="Dashboard" />
    <div>
        <div class="min-h-screen bg-gray-100">
            <nav class="bg-white border-b border-gray-100">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between items-center h-16">
                        <div class="flex">Welcome Admin</div>

                        <div class="flex items-center">
                            <DropdownLink
                                :href="route('admin.logout')"
                                method="post"
                                as="button"
                                class="cursor-pointer"
                            >
                                Log Out
                            </DropdownLink>
                        </div>
                    </div>
                </div>
            </nav>
            <main></main>
        </div>
    </div>
</template>
