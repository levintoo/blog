<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ProfileController;
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

                Route::delete('/{slug}/delete', 'destroy')->name('destroy');
            });
});

Route::prefix('posts')

    ->name('posts.')

    ->controller(PostController::class)

    ->group(function () {

        Route::get('/latest', 'latest')->name('latest');

        Route::get('/top', 'top')->name('top');

        Route::get('/{slug}', 'show')->name('show');
    });

require __DIR__.'/auth.php';
