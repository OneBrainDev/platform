<?php declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::prefix('user')->name('user.')->group(function () {
    Route::get('/', function () {
        echo "hello";
    })->name('index');
});


