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
        <div class="p-4 flex flex-col space-y-4">
            <div class="p-2 rounded-md border">
                <h2 class="text-2xl">Name</h2>
                <p>{{ user_task.name }}</p>
            </div>
            <div class="p-2 rounded-md border">
                <h2 class="text-2xl">Description</h2>
                <p>{{ user_task.description }}</p>
            </div>
            <div class="p-2 rounded-md border">
                <h2 class="text-2xl">Date</h2>
                <p>{{ user_task.date }}</p>
            </div>
            <div class="p-2 rounded-md border">
                <h2 class="text-2xl">Completed</h2>
                <p :class="{'text-green-500 text-bold underline': user_task.completed}">Complete</p>
                <p :class="{'text-red-500 text-bold underline': !user_task.completed}">Not Complete</p>
            </div>
        </div>
    </AppLayout>
</template>
