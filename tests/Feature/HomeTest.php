<?php

test('home page can be rendered', function () {
    $response = $this->get(route('home'));

    $response->assertStatus(200);
});
