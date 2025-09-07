<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/tasks', function () {
    $user = User::with('tasks')->find(auth()->id());
    $user_tasks = $user->tasks;

    return Inertia::render('tasks/Index', [
        'user_tasks' => $user_tasks,
    ]);
})->middleware(['auth', 'verified'])->name('tasks');

Route::get('/tasks/{id}', function ($id) {
    $user = User::with('tasks')->find(auth()->id());
    $user_task = $user->tasks()->find($id);

    return Inertia::render('tasks/Show', [
        'user_task' => $user_task,
    ]);
})->middleware(['auth', 'verified'])->name('task');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
