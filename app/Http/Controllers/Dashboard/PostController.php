<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::query()

            ->select(['title', 'description', 'image', 'id', 'slug', 'created_at', 'updated_at', 'deleted_at'])

            ->withTrashed()

            ->latest()

            ->paginate()

            ->through(fn($post) => [
                'title' => $post->title,
                'description' => $post->description,
                'image' => $post->image,
                'id' => $post->id,
                'slug' => $post->slug,
                'created' => $post->created_at ? $post->created_at->format('d/m/Y H:i T') : null,
                'updated' => $post->updated_at ? $post->updated_at->format('d/m/Y H:i T') : null,
                'trashed' => $post->deleted_at ? $post->deleted_at->format('d/m/Y H:i T') : null,
            ]);

        return inertia('Dashboard/Posts/Posts', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Dashboard/Posts/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $validated = $request->validated();

        $filepath = $validated['image']->store('posts/images', ['disk' => 'public_uploads']);

        Post::create([...$validated, 'image' => $filepath]);

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $post = Post::findorfail($id);
        return inertia('Dashboard/Posts/Edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, String $id)
    {
        $post = Post::findOrFail($id);

        $oldImage = $post->image;

        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $filePath = $validated['image']->store('posts/images', ['disk' => 'public_uploads']);
            $validated['image'] = $filePath;
        }

        $post->update($validated);

        if ($request->hasFile('image') && $post->wasChanged('image')) {
            if ($oldImage) {
                Storage::disk('public_uploads')->delete($oldImage);
            }
        }

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function softDelete(String $id)
    {
        $post = Post::findorfail($id);

        $post->delete();
    }

    public function restore(String $id)
    {
        $post = Post::onlyTrashed()->findorfail($id);

        $post->restore();
    }

    public function destroy(String $id)
    {
        $post = Post::onlyTrashed()->findorfail($id);

        Storage::disk('public_uploads')->delete($post->image);

        $post->forcedelete();
    }
}
