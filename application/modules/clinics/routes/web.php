<?php declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::prefix('clinics')->group(function () {
    Route::get('/', function () {
        echo "hello";
    })->name('clinics.index');
});
