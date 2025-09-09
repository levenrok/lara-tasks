<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Task } from '@/types/task';
import { Head, useForm } from '@inertiajs/vue3';

const delete_form = useForm({});

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
            <button
                class="rounded-md bg-red-600 px-3 py-2 text-sm font-bold text-white shadow-xs hover:bg-red-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600"
                form="delete"
            >
                Delete
            </button>
        </div>
        <form @submit.prevent="delete_form.delete(`/tasks/${task.id}`)" class="hidden" id="delete"></form>
    </AppLayout>
</template>
