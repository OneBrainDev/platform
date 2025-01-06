<?php declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('workspaces')->group(function () {
    // Route::get('/', IndexWorkspacesController::class)->name('workspaces.index');
    // Route::inertia('/create', 'Workspaces/CreateWorkspace')->name('workspaces.create');
    // Route::get('/{workspaceID}', ShowWorkspacesController::class)->name('workspaces.show');
    // Route::get('/{workspaceID}/edit', EditWorkspacesController::class)->name('workspaces.edit');
    // Route::post('/', StoreWorkspacesController::class)->name('workspaces.store');
    // Route::patch('/{workspaceID}', UpdateWorkspacesController::class)->name('workspaces.update');
    // Route::destroy('/{workspaceID}', DestroyWorkspacesController::class)->name('workspaces.destroy');
});
