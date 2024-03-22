<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\HomeController;
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

});

require __DIR__.'/auth.php';
