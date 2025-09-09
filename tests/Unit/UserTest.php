<?php

use App\Models\Task;
use App\Models\User;

it('can have many tasks', function () {
    $user = User::factory()->create();
    $tasks = Task::factory(10)->create([
        'user_id' => $user->id,
    ]);

    expect($user->tasks)->toBeCollection();
    expect($user->tasks->count())->toBe($tasks->count());
    expect($user->tasks->first()->user_id)->toBe($user->id);
});
