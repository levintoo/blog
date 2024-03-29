<?php
use Inertia\Testing\AssertableInertia as Assert;

test('latest posts can be displayed', function () {
    $response = $this->get('/posts/latest');

    $response->assertStatus(200);
});

test('latest posts has posts', function () {
    $response = $this->get('/posts/latest');

    $response->assertInertia(fn (Assert $page) => $page
        ->component('Posts/Latest')
        ->has('posts')
    );

    $response->assertStatus(200);
});

test('top posts can be displayed', function () {
    $response = $this->get('/posts/top');

    $response->assertStatus(200);
});

test('top posts has posts', function () {
    $response = $this->get('/posts/top');

    $response->assertInertia(fn (Assert $page) => $page
        ->component('Posts/Top')
        ->has('posts')
    );

    $response->assertStatus(200);
});
