<script setup lang="ts">
import { Table, TableBody, TableCaption, TableCell, TableHead, TableHeader, TableRow } from '@/components/ui/table';
import AppLayout from '@/layouts/AppLayout.vue';
import { Task } from '@/types/task';
import { Head } from '@inertiajs/vue3';

defineProps<{
    tasks: Task[];
}>();
</script>

<template>
    <Head title="Dashboard" />

    <AppLayout>
        <Table>
            <TableCaption>A list of your tasks.</TableCaption>
            <TableHeader>
                <TableRow>
                    <TableHead class="w-[100px]"> Name </TableHead>
                    <TableHead class="hidden sm:table-cell">Description</TableHead>
                    <TableHead class="hidden sm:table-cell">Date</TableHead>
                    <TableHead class="text-center"> Completed </TableHead>
                </TableRow>
            </TableHeader>
            <TableBody>
                <TableRow v-for="task in tasks" :key="task.id">
                    <TableCell class="font-medium">
                        {{ task.name }}
                    </TableCell>
                    <TableCell class="hidden max-w-[400px] whitespace-normal sm:table-cell">
                        {{ task.description }}
                    </TableCell>
                    <TableCell class="hidden sm:table-cell">
                        {{ task.date }}
                    </TableCell>
                    <TableCell class="text-center">
                        <input type="checkbox" :id="`task-${task.id}`" :checked="task.completed" />
                    </TableCell>
                </TableRow>
            </TableBody>
        </Table>
    </AppLayout>
</template>
