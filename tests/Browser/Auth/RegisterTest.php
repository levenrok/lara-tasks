<?php

test('registration page is displayed', function () {
    $page = visit(route('register'));

    $page->assertPathIs('/register')
        ->assertSee('Create an account');
});

test('new users can register using the registration page', function () {
    $page = visit(route('register'));

    $page->assertPathIs('/register')
        ->assertSee('Create an account')
        ->fill('name', fake()->name())
        ->fill('email', fake()->email())
        ->fill('password', 'password')
        ->fill('password_confirmation', 'password')
        ->click('Create account');

    $this->assertAuthenticated();
});

test('login link takes to the login page', function () {
    $page = visit(route('register'));

    $page->click('Log in')
        ->assertPathIs('/login');
});
