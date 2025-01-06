<?php declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    // Route::inertia('/login', 'Users/Login')->name('auth.login');
    // Route::post('/login', StoreAuthSessionController::class);
});

// Route::middleware('auth')->group(function () {
//  Route::destroy('/logout', DestroyAuthSessionController::class);
// });
