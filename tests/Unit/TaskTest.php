<?php

use App\Models\Task;
use App\Models\User;

it('belongs to a user', function () {
    $user = User::factory()->create();
    $task = Task::factory()->create([
        'user_id' => $user->id,
    ]);

    expect($task->user->is($user))->toBeTrue();
});
