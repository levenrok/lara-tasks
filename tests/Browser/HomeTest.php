<?php

test('page is rendered', function() {
    $page = visit(route('home'));

    $page->assertSee('Welcome to LaraTasks');
});
