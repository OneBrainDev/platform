<?php declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::prefix('accounts')->name('accounts.')->group(function () {
    Route::get('/', function () {
        echo "hello";
    })->name('index');
});
