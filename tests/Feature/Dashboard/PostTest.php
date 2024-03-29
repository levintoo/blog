<?php

use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Inertia\Testing\AssertableInertia as Assert;
use App\Models\Post;
use function Pest\Laravel\patch;

test('posts page is displayed', function () {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get('/dashboard/posts');

    $response->assertStatus(200);
});

test('posts page is not displayed without authentication', function () {
    $response = $this->get('/dashboard/posts');

    $response->assertStatus(302);
});

test('posts page contains posts', function () {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get('/dashboard/posts');

    $response->assertInertia(fn (Assert $page) => $page
        ->component('Dashboard/Posts/Posts')
        ->has('posts')
    );

    $response->assertStatus(200);
});

test('create posts page is displayed', function () {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get('/dashboard/posts/create');

    $response->assertStatus(200);
});

test('create posts page is not displayed without authentication', function () {
    $response = $this->get('/dashboard/posts/create');

    $response->assertStatus(302);
});

test('user can create post', function () {

    $storage = Storage::class;

    $storage::fake('avatar');

    $file = UploadedFile::fake()->image('post.png');

    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->post('/dashboard/posts/create', [
        'title' => 'Test Post',
        'slug' => 'test-post',
        'tag' => 'test',
        'description' => 'This is a test post',
        'image' => $file,
        'body' => '# Test Post',
        ]);

    $this->assertDatabaseHas('posts', [
        'title' => 'Test Post',
        'slug' => 'test-post',
        'tag' => 'test',
        'description' => 'This is a test post',
        'image' => 'posts/images/'.$file->hashName(),
        'body' => '# Test Post',
    ]);

    $storage::disk('public_uploads')
        ->assertExists('/posts/images/'.$file->hashName())
        ->delete('/posts/images/'.$file->hashName());

    $response->assertStatus(302)
        ->assertRedirect('/dashboard/posts');
});

test('create post throws validation errors', function () {

    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->post('/dashboard/posts/create', [
            'title' => '',
            'slug' => '',
            'tag' => '',
            'description' => '',
            'image' => '',
            'body' => '',
        ]);

    $response->assertStatus(302);
    // TODO Complete the tests
});
