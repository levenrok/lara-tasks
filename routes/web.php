<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/tasks', function () {
    $user_tasks = auth()->user()->tasks()->get();

    return Inertia::render('Tasks', [
        'user_tasks' => $user_tasks,
    ]);
})->middleware(['auth', 'verified'])->name('tasks');

Route::get('/tasks/{id}', function ($id) {
    $user_task = auth()->user()->tasks()->find($id);

    return Inertia::render('Task', [
        'user_task' => $user_task,
    ]);
})->middleware(['auth', 'verified'])->name('task');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
