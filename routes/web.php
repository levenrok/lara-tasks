<?php

use App\Models\Task;
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
    $user_tasks = $user->tasks()->latest()->get();

    return Inertia::render('tasks/Index', [
        'user_tasks' => $user_tasks,
    ]);
})->middleware(['auth', 'verified'])->name('tasks');

Route::get('/tasks/create', function () {
    return Inertia::render('tasks/Create');
})->middleware(['auth', 'verified'])->name('create-tasks');

Route::get('/tasks/{id}', function ($id) {
    $user = User::with('tasks')->find(auth()->id());
    $user_task = $user->tasks()->find($id);

    return Inertia::render('tasks/Show', [
        'user_task' => $user_task,
    ]);
})->middleware(['auth', 'verified'])->name('task');

Route::post('/tasks', function () {
    request()->validate([
        'name' => ['required', 'min:3'],
        'description' => ['max:255'],
        'date' => ['date'],
    ]);

    Task::create([
        'name' => request('name'),
        'description' => request('description'),
        'date' => request('date'),
        'completed' => false,
        'user_id' => auth()->user()->id,
    ]);

    return redirect('/tasks');
})->middleware(['auth', 'verified']);

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
