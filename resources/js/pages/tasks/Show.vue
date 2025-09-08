<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Task } from '@/types/task';
import { Head } from '@inertiajs/vue3';

defineProps<{
    task: Task;
}>();
</script>

<template>
    <Head title="Tasks" />

    <AppLayout>
        <div class="flex flex-col space-y-4 p-4">
            <div class="rounded-md border p-2">
                <h2 class="text-2xl">Name</h2>
                <p>{{ task.name }}</p>
            </div>
            <div class="rounded-md border p-2">
                <h2 class="text-2xl">Description</h2>
                <p>{{ task.description }}</p>
            </div>
            <div class="rounded-md border p-2">
                <h2 class="text-2xl">Date</h2>
                <p>{{ task.date }}</p>
            </div>
            <div class="rounded-md border p-2">
                <h2 class="text-2xl">Completed</h2>
                <p :class="{ 'text-bold text-green-500 underline': task.completed }">Complete</p>
                <p :class="{ 'text-bold text-red-500 underline': !task.completed }">Not Complete</p>
            </div>
        </div>
    </AppLayout>
</template>
