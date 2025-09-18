<?php

use App\Http\Controllers\TaskController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

Route::get('/dashboard', function () {
    $user = User::with('tasks')->find(auth()->id());
    $tasks = $user->tasks()->latest()->get();

    return Inertia::render('Dashboard', [
        'tasks' => $tasks,
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('tasks', TaskController::class)->middleware(['auth', 'verified'])->names(['index' => 'tasks']);

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
