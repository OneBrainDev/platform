<?php declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Platform\Accounts\Http\Controllers\EditAccountsController;
use Platform\Accounts\Http\Controllers\ShowAccountsController;
use Platform\Accounts\Http\Controllers\IndexAccountsController;
use Platform\Accounts\Http\Controllers\StoreRegisterController;
use Platform\Accounts\Http\Controllers\UpdateAccountsController;

Route::middleware('guest')->domain("{subdomain}".".".Config::string('app.url'))->group(function () {
    // Route::get('/register', function () {
    //     echo "hi";
    // });
    Route::inertia('/register', 'Accounts/CreateRegister')->name('register.create');
    Route::post('/register', StoreRegisterController::class)->name('register.store');
});

Route::middleware('auth')->prefix('accounts')->group(function () {
    Route::get('/', IndexAccountsController::class)->name('accounts.index');
    Route::get('/{accountID}', ShowAccountsController::class)->name('accounts.show');
    Route::get('/{accountID}/edit', EditAccountsController::class)->name('accounts.edit');
    Route::patch('/{accountID}', UpdateAccountsController::class)->name('accounts.update');
});
