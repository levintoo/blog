<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Mail\Markdown;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function top()
    {
        return inertia('Posts/Top');
    }

    public function latest()
    {
        $posts = Post::query()->select('slug', 'description','tag','created_at','title','image')->latest()->paginate()->through(fn($post) => [
            'title' => $post->title,
            'image' => $post->image,
            'slug' => $post->slug,
            'description' => $post->description,
            'tag' => $post->tag,
            'created' => $post->created_at->diffForHumans()
        ]);
        return inertia('Posts/Latest', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(String $slug)
    {
        $post = Post::where('slug',$slug)->firstorfail();

        $post = collect([
            'body' => fn() => Markdown::parse($post->body)->toHtml(),
            'title' => $post->title,
            'description' => $post->description,
            'created' => $post->created_at->diffForHumans(),
            'tag' => $post->tag,
            'slug' => $post->slug,
        ]);

        return inertia('Posts/Show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
