import { Task } from '@/types/task';
import { InertiaLinkProps, useForm } from '@inertiajs/vue3';
import { clsx, type ClassValue } from 'clsx';
import { twMerge } from 'tailwind-merge';

export function cn(...inputs: ClassValue[]) {
    return twMerge(clsx(inputs));
}

export function urlIsActive(urlToCheck: NonNullable<InertiaLinkProps['href']>, currentUrl: string) {
    return toUrl(urlToCheck) === currentUrl;
}

export function toUrl(href: NonNullable<InertiaLinkProps['href']>) {
    return typeof href === 'string' ? href : href?.url;
}

export function updateCompleted(task: Task, value: boolean) {
    useForm({ ...task, completed: value, updateStatusOnly: true }).patch(`/tasks/${task.id}`, {
        preserveState: false,
        preserveScroll: true,
        only: ['tasks'],
        onSuccess: () => {
            task.completed = value;
            alert('Task updated sucessfully!');
        },
        onError: (errors) => {
            alert(`Failed to update task: ${errors}`);
        },
    });
}
