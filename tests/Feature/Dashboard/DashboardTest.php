<?php

use App\Models\User;
use Inertia\Testing\AssertableInertia as Assert;

test('dashboard page is displayed', function () {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get('/dashboard');

    $response->assertStatus(200);
});

test('dashboard page is not displayed without authentication', function () {
    $response = $this->get('/dashboard');

    $response->assertStatus(302);
});

test('dashboard page contains stats', function () {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get('/dashboard');

    $response->assertInertia(fn (Assert $page) => $page
        ->component('Dashboard/Dashboard')
        ->has('stats')
    );

    $response->assertStatus(200);
});
