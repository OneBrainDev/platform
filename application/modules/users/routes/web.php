<?php declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::prefix('users')->group(function () {
    Route::get('/', function () {
        echo "hello";
    })->name('users.index');
});
