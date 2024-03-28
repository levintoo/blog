<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $latestPosts = Post::query()

            ->limit(3)

            ->select('title','slug','created_at','description','tag','image')

            ->latest()

            ->get()->map(fn($post) => [
                'title' => $post->title,
                'description' => $post->description,
                'created' => $post->created_at->diffForHumans(),
                'tag' => $post->tag,
                'slug' => $post->slug,
                'image' => $post->image
        ]);
        $topPosts = Post::query()

            ->limit(3)

            ->select('title','slug','created_at','description','tag','image')

            ->inRandomOrder()

            ->oldest()

            ->get()->map(fn($post) => [
                'title' => $post->title,
                'description' => $post->description,
                'created' => $post->created_at->diffForHumans(),
                'tag' => $post->tag,
                'slug' => $post->slug,
                'image' => $post->image
        ]);
        return inertia('Welcome', compact('latestPosts','topPosts'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
