<?php
use Inertia\Testing\AssertableInertia as Assert;

test('home page is displayed', function () {
    $response = $this->get('/');

    $response->assertInertia(fn (Assert $page) => $page
        ->component('Welcome')
    );

    $response->assertStatus(200);
});

test('home page contains latest posts', function () {
    $response = $this->get('/');

    $response->assertInertia(fn (Assert $page) => $page
        ->component('Welcome')
        ->has('topPosts')
    );

    $response->assertStatus(200);
});

test('home page contains top posts', function () {
    $response = $this->get('/');

    $response->assertInertia(fn (Assert $page) => $page
        ->component('Welcome')
        ->has('latestPosts')
    );

    $response->assertStatus(200);
});
