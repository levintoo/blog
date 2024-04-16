<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAssetRequest;
use App\Models\Asset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Number;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assets = Asset::query()

            ->latest()

            ->paginate()

            ->through(fn($asset) => [
                'id' => $asset->id,
                'filePath' => Storage::disk('public_uploads')->url($asset->filename),
                'fileSize' => Number::fileSize(Storage::disk('public_uploads')->size($asset->filename)),
                'title' => $asset->title,
                'created' => $asset->created_at ? $asset->created_at->format('d/m/Y H:i T') : null,
                'updated' => $asset->updated_at ? $asset->updated_at->format('d/m/Y H:i T') : null,
            ]);

        return inertia('Dashboard/Assets/Assets', compact('assets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Dashboard/Assets/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAssetRequest $request)
    {
        $validated = $request->validated();

        $filepath = $validated['file']->store('posts/assets', ['disk' => 'public_uploads']);

        Asset::create([...$validated, 'filename' => $filepath]);

        return redirect()->route('assets.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Asset $asset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asset $asset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Asset $asset)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asset $asset)
    {
        Storage::disk('public_uploads')->delete($asset->filename);

        $asset->forcedelete();
    }
}
