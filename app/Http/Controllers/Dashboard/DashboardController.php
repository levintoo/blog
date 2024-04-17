<?php

namespace App\Http\Controllers\Dashboard;

use App\Enums\PostStatus;
use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stats = collect([
            'active' => Post::count(),
            'trashed' => Post::onlyTrashed()->count(),
            'total' => Post::withTrashed()->count(),
            'users' => User::withTrashed()->count(),
            'assets' => Asset::count(),
            'unlisted' => Post::where('status', PostStatus::UNLISTED)->count(),
            'public' => Post::where('status', PostStatus::PUBLIC)->count(),
        ]);

        return inertia('Dashboard/Dashboard', compact('stats'));
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
