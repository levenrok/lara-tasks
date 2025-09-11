<?php

test('user must be authenticated to view tasks', function () {
    $response = $this->get(route('tasks'));

    $response->assertRedirect(route('login'));
});

test('user must be authenticated to create create', function () {
    $response = $this->get(route('tasks.create'));

    $response->assertRedirect(route('login'));
});
