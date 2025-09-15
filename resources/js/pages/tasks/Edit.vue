<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Task } from '@/types/task';
import { Head, Link, useForm } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [];

const props = defineProps<{
    task: Task;
}>();

const form = useForm({
    name: props.task.name,
    description: props.task.description,
    date: props.task.date,
    completed: !!props.task.completed,
    updateStatusOnly: false,
});
</script>

<template>
    <Head title="Edit Task" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <form @submit.prevent="form.patch(`/tasks/${task.id}`)">
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 py-4 dark:border-white/10">
                    <h2 class="text-base/7 font-semibold text-gray-900 dark:text-white">Edit Task</h2>
                    <p class="mt-1 text-sm/6 text-gray-600 dark:text-gray-400">Change the name, description, date and the status</p>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-4">
                            <label for="name" class="block text-sm/6 font-medium text-gray-900 dark:text-white">Name</label>
                            <div class="mt-2">
                                <div
                                    class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600 dark:bg-white/5 dark:outline-white/10 dark:focus-within:outline-indigo-500"
                                >
                                    <input
                                        id="name"
                                        type="text"
                                        name="name"
                                        v-model="form.name"
                                        class="block min-w-0 grow bg-white py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6 dark:bg-transparent dark:text-white dark:placeholder:text-gray-500"
                                        required
                                    />
                                </div>
                                <div v-if="form.errors.name" class="mt-1 text-sm text-red-500">{{ form.errors.name }}</div>
                            </div>
                        </div>

                        <div class="col-span-full">
                            <label for="description" class="block text-sm/6 font-medium text-gray-900 dark:text-white">Description</label>
                            <div class="mt-2">
                                <textarea
                                    id="description"
                                    name="description"
                                    v-model="form.description"
                                    rows="3"
                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 dark:bg-white/5 dark:text-white dark:outline-white/10 dark:placeholder:text-gray-500 dark:focus:outline-indigo-500"
                                ></textarea>
                                <div v-if="form.errors.description" class="mt-1 text-sm text-red-500">{{ form.errors.description }}</div>
                            </div>
                            <p class="mt-3 text-sm/6 text-gray-600 dark:text-gray-400">Write a short description about task.</p>
                        </div>

                        <div class="sm:col-span-4">
                            <label for="date" class="block text-sm/6 font-medium text-gray-900 dark:text-white">Date</label>
                            <div class="mt-2">
                                <div
                                    class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600 dark:bg-white/5 dark:outline-white/10 dark:focus-within:outline-indigo-500"
                                >
                                    <input
                                        id="date"
                                        type="date"
                                        name="date"
                                        v-model="form.date"
                                        class="block min-w-0 grow bg-white py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6 dark:bg-transparent dark:text-white dark:placeholder:text-gray-500"
                                    />
                                </div>
                                <div v-if="form.errors.date" class="mt-1 text-sm text-red-500">{{ form.errors.date }}</div>
                            </div>
                        </div>

                        <div class="sm:col-span-4">
                            <label for="completed" class="block text-sm/6 font-medium text-gray-900 dark:text-white">Completed</label>
                            <div class="mt-2">
                                <div
                                    class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600 dark:bg-white/5 dark:outline-white/10 dark:focus-within:outline-indigo-500"
                                >
                                    <input
                                        id="completed"
                                        type="checkbox"
                                        name="completed"
                                        v-model="form.completed"
                                        class="block min-w-0 grow bg-white py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6 dark:bg-transparent dark:text-white dark:placeholder:text-gray-500"
                                    />
                                </div>
                                <div v-if="form.errors.completed" class="mt-1 text-sm text-red-500">{{ form.errors.completed }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <Link :href="`/tasks/${task.id}`" class="text-sm/6 font-semibold text-gray-900 dark:text-white">Cancel </Link>
                <button
                    type="submit"
                    :disabled="form.processing"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 dark:bg-indigo-500 dark:shadow-none dark:focus-visible:outline-indigo-500"
                >
                    {{ form.processing ? 'Saving...' : 'Save' }}
                </button>
            </div>
        </form>
    </AppLayout>
</template>
