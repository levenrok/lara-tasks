<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('tasks', function () {
    $user_tasks = auth()->user()->tasks()->get();

    return Inertia::render('Tasks', [
        'user_tasks' => $user_tasks,
    ]);
})->middleware(['auth', 'verified'])->name('tasks');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
