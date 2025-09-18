<script setup lang="ts">
import { Table, TableBody, TableCaption, TableCell, TableHead, TableHeader, TableRow } from '@/components/ui/table';
import AppLayout from '@/layouts/AppLayout.vue';
import { updateCompleted } from '@/lib/utils';
import { Task } from '@/types/task';
import { Head } from '@inertiajs/vue3';

defineProps<{
    tasks: Task[];
}>();
</script>

<template>
    <Head title="Dashboard" />

    <AppLayout>
        <div class="m-4 flex flex-col space-y-2">
            <div class="rounded-lg border border-gray-200 p-2">
                <h2 class="border-b border-gray-400 p-2 text-xl">Tasks</h2>
                <Table>
                    <TableCaption>A list of your tasks.</TableCaption>
                    <TableHeader>
                        <TableRow>
                            <TableHead class="max-w-[100px]"> Name </TableHead>
                            <TableHead class="hidden sm:table-cell">Description</TableHead>
                            <TableHead class="hidden sm:table-cell">Date</TableHead>
                            <TableHead class="text-center"> Completed </TableHead>
                        </TableRow>
                    </TableHeader>
                    <TableBody>
                        <TableRow v-for="task in tasks" :key="task.id">
                            <TableCell class="font-medium whitespace-normal">
                                {{ task.name }}
                            </TableCell>
                            <TableCell class="hidden max-w-[400px] whitespace-normal sm:table-cell">
                                {{ task.description }}
                            </TableCell>
                            <TableCell class="hidden sm:table-cell">
                                {{ task.date }}
                            </TableCell>
                            <TableCell class="text-center">
                                <input
                                    type="checkbox"
                                    :id="`task-${task.id}`"
                                    :checked="task.completed"
                                    @change="updateCompleted(task, ($event.target as HTMLInputElement).checked)"
                                    @click.stop
                                />
                            </TableCell>
                        </TableRow>
                    </TableBody>
                </Table>
            </div>
        </div>
    </AppLayout>
</template>
