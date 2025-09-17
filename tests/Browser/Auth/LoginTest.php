<?php

use App\Models\User;

test('login page is displayed', function () {
    $page = visit(route('login'));

    $page->assertPathIs('/login')
        ->assertSee('Log in to your account');
});

test('users can authenticate using the login page', function () {
    $page = visit(route('login'));

    $user = User::factory()->create([
        'email' => fake()->email(),
        'password' => 'password',
    ]);

    $page->assertPathIs('/login')
        ->assertSee('Log in to your account')
        ->fill('email', $user->email)
        ->fill('password', 'password')
        ->click('Log in');

    $this->assertAuthenticated();
});
test('signup link takes to the registration page', function () {
    $page = visit(route('login'));

    $page->click('Sign up')
        ->assertPathIs('/register');
});
