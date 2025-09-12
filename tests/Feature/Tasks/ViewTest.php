<?php

use App\Models\Task;
use App\Models\User;

test('index page is rendered', function () {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get(route('tasks'));

    $response->assertStatus(200);
});

test('create page is rendered', function () {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get(route('tasks.create'));

    $response->assertStatus(200);
});

test('show page is rendered', function () {
    $user = User::factory()->create();
    $task = Task::factory()->create(['user_id' => $user->id]);

    $response = $this
        ->actingAs($user)
        ->get(route('tasks.show', $task->id));

    $response->assertStatus(200);
});

test('edit page is rendered', function () {
    $user = User::factory()->create();
    $task = Task::factory()->create(['user_id' => $user->id]);

    $response = $this
        ->actingAs($user)
        ->get(route('tasks.edit', $task->id));

    $response->assertStatus(200);
});
