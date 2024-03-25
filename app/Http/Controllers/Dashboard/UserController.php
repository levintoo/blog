<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::withTrashed()->Paginate()->through(fn($user) => [
            'name' => $user->name,
            'email' => $user->email,
            'id' => $user->id,
            'verified' => !!$user->email_verified_at,
            'created' => $user->created_at ? $user->created_at->format('d/m/Y H:i T') : null,
            'updated' => $user->updated_at ? $user->updated_at->format('d/m/Y H:i T') : null,
            'trashed' => $user->deleted_at ? $user->deleted_at->format('d/m/Y H:i T') : null,
        ]);
        return inertia('Dashboard/Users/Users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Dashboard/Users/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();

        User::create([
            ...$validated,
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function softDestroy(String $id)
    {
        $user = User::findOrFail($id);

        if($user->id === Auth::id() || $user->email == config('app.admin_email')) {
            abort(403);
        }

        $user->delete();
    }

    public function destroy(String $id)
    {
        $user = User::findOrFail($id);

        if($user->id === Auth::id() || $user->email == config('app.admin_email')) {
            abort(403);
        }

        $user->forceDelete();
    }

    public function restore(String $id)
    {
        $user = User::onlyTrashed()->findOrFail($id);
        $user->restore();
    }
}
