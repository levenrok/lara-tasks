<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { tasks } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Tasks',
        href: tasks().url,
    },
];

defineProps({
    user_task: Object,
});
</script>

<template>
    <Head title="Tasks" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex flex-col space-y-4 p-4">
            <div class="rounded-md border p-2">
                <h2 class="text-2xl">Name</h2>
                <p>{{ user_task.name }}</p>
            </div>
            <div class="rounded-md border p-2">
                <h2 class="text-2xl">Description</h2>
                <p>{{ user_task.description }}</p>
            </div>
            <div class="rounded-md border p-2">
                <h2 class="text-2xl">Date</h2>
                <p>{{ user_task.date }}</p>
            </div>
            <div class="rounded-md border p-2">
                <h2 class="text-2xl">Completed</h2>
                <p :class="{ 'text-bold text-green-500 underline': user_task.completed }">Complete</p>
                <p :class="{ 'text-bold text-red-500 underline': !user_task.completed }">Not Complete</p>
            </div>
        </div>
    </AppLayout>
</template>
