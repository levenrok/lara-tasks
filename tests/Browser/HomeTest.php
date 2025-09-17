<?php

test('home page is displayed', function () {
    $page = visit(route('home'));

    $page->assertSee('Welcome to LaraTasks')
        ->assertSeeLink('Log in')
        ->assertSeeLink('Register');
});

test('login button takes to the login page', function () {
    $page = visit(route('home'));

    $page->click('Log in')
        ->assertPathIs('/login');
});

test('register button takes to the registration page', function () {
    $page = visit(route('home'));

    $page->click('Register')
        ->assertPathIs('/register');
});
