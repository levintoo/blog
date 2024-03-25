<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\UserController as AdminUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Dashboard\PostController as AdminPostController;;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::middleware(['auth', 'verified'])

    ->prefix('dashboard')

    ->group(function () {

        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::controller(ProfileController::class)

            ->name('profile.')

            ->group(function () {

            Route::get('/profile', 'edit')->name('edit');

            Route::patch('/profile', 'update')->name('update');

            Route::delete('/profile', 'destroy')->name('destroy');
        });

        Route::prefix('posts')

            ->name('posts.')

            ->controller(AdminPostController::class)

            ->group(function () {

                Route::get('/', 'index')->name('index');

                Route::get('/create', 'create')->name('create');

                Route::post('/create', 'store')->name('store');

                Route::get('/edit/{slug}', 'edit')->name('edit');

                Route::patch('/edit/{slug}', 'update')->name('update');

                Route::delete('/{slug}/delete/soft', 'softDelete')->name('destroy.soft');

                Route::delete('/{slug}/delete/force', 'destroy')->name('destroy.force');

                Route::patch('/{slug}/restore', 'restore')->name('restore');
            });

        Route::prefix('users')

            ->name('users.')

            ->controller(AdminUserController::class)

            ->group(function () {

                Route::get('/', 'index')->name('index');

                Route::get('/create', 'create')->name('create');

                Route::post('/create', 'store')->name('store');

                Route::delete('/{id}/delete/soft', 'softDestroy')->name('destroy.soft');

                Route::delete('/{id}/delete/force', 'destroy')->name('destroy');

                Route::patch('/{id}/restore', 'restore')->name('restore');
            });
});

Route::get('about', function () {
    return inertia('About');
});

Route::get('privacy-policy', function () {
    return inertia('PrivacyPolicy');
});

Route::get('terms-of-service', function () {
    return inertia('TermsOfService');
});

Route::prefix('posts')

    ->name('posts.')

    ->controller(PostController::class)

    ->group(function () {

        Route::get('/latest', 'latest')->name('latest');

        Route::get('/top', 'top')->name('top');

    });

require __DIR__.'/auth.php';

Route::get('/{slug}', [PostController::class, 'show'])->name('show');
