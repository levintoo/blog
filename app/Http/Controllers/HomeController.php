<?php

namespace App\Http\Controllers;

use App\Enums\PostStatus;
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

            ->limit(9)

            ->select('status' ,'title','slug','created_at','description','tag','image')

            ->where('status', PostStatus::PUBLIC)

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

            ->where('status', PostStatus::PUBLIC)

            ->select('status','title','slug','created_at','description','tag','image')

            ->oldest()

            ->get()->map(fn($post) => [
                'title' => $post->title,
                'description' => $post->description,
                'created' => $post->created_at->diffForHumans(),
                'tag' => $post->tag,
                'slug' => $post->slug,
                'image' => $post->image
        ]);

        $bodyTitle = "Want to Become a Programming Pro? My Posts Will Show You How!";

        return inertia('Welcome', compact(['bodyTitle', 'latestPosts','topPosts']));
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
