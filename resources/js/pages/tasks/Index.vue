<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { tasks } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import { Loader2 } from 'lucide-vue-next';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Tasks',
        href: tasks().url,
    },
];

defineProps({
    user_tasks: Array,
});
</script>

<template>
    <Head title="Tasks" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex items-center justify-end p-2">
            <Link href="/tasks" class="hover:text-blue-500 hover:underline">
                <div class="flex flex-row space-x-1">
                    <div>
                        <Loader2 />
                    </div>
                    <div>Reload</div>
                </div>
            </Link>
        </div>
        <div class="space-y-4 p-2">
            <Link
                :href="`/tasks/${task.id}`"
                class="block rounded-lg border border-gray-200 px-4 py-6"
                v-for="task in user_tasks"
                v-bind:key="task.id"
            >
                <div class="text-sm font-bold text-blue-500">{{ task.date }}</div>
                <div class="flex flex-row space-x-2">
                    <div>
                        <input type="checkbox" :id="`task-${task.id}`" :checked="task.completed" />
                    </div>
                    <div>
                        <strong>{{ task.name }}</strong>
                        <p>{{ task.description }}</p>
                    </div>
                </div>
            </Link>
        </div>
    </AppLayout>
</template>
