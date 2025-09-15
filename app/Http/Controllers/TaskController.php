<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use App\Models\User;
use Inertia\Inertia;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::with('tasks')->find(auth()->id());
        $tasks = $user->tasks()->latest()->get();

        return Inertia::render('tasks/Index', [
            'tasks' => $tasks,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('tasks/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        Task::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'date' => $request['date'],
            'completed' => false,
            'user_id' => auth()->id(),
        ]);

        return to_route('tasks');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return Inertia::render('tasks/Show', [
            'task' => $task,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return Inertia::render('tasks/Edit', [
            'task' => $task,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update([
            'name' => $request['name'],
            'description' => $request['description'],
            'date' => $request['date'],
            'completed' => $request['completed'],
        ]);

        // Route to the task info page only if the 'updateStatusOnly' prop is false
        // This prop is set to true in the index page form because routing is not needed
        if (! $request['updateStatusOnly']) {
            return to_route('tasks.show', $task->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return to_route('tasks');
    }
}
