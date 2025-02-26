<?php declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;
use Platform\Accounts\Presentation\Http\Controllers\EditsAccountController;
use Platform\Accounts\Presentation\Http\Controllers\ShowsAccountController;
use Platform\Accounts\Presentation\Http\Controllers\StoresAccountController;
use Platform\Accounts\Presentation\Http\Controllers\CreatesAccountController;
use Platform\Accounts\Presentation\Http\Controllers\IndexesAccountController;
use Platform\Accounts\Presentation\Http\Controllers\UpdatesAccountController;

/**
 * GET  /register
 * POST /register
 */
Route::middleware('guest')->domain(Config::string('app.url'))->group(function () {
    Route::get('/register', CreatesAccountController::class)->name('accounts.create');
    Route::post('/register', StoresAccountController::class)->name('accounts.store');
});

/**
 * GET      /accounts
 * GET      /accounts/{id}
 * GET      /accounts/{id}/edit
 * PATCH    /accounts/{id}
 * DELETE   /accounts/{id}
 */
Route::middleware(['tenant', 'auth'])->domain("{subdomain}".".".Config::string('app.url'))->group(function () {
    Route::get('accounts/', IndexesAccountController::class)->name('accounts.index');
    Route::get('accounts/{id}', ShowsAccountController::class)->name('accounts.show');
    Route::get('accounts/{id}/edit', EditsAccountController::class)->name('accounts.edit');
    Route::patch('accounts/{id}', UpdatesAccountController::class)->name('accounts.update');
});
