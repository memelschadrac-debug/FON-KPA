<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->as('admin.')
    ->group(function (): void {

        // Tableau de bord administrateur
        Route::get('/', DashboardController::class)->name('dashboard');

        // Gestion des catégories
        Route::resource('categories', CategoryController::class);
    });