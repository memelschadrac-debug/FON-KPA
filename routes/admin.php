<?php

use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\OptionGroupController;
use App\Http\Controllers\Admin\OptionChoiceController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->as('admin.')
    ->group(function (): void {

        // Tableau de bord administrateur
        Route::get('/', DashboardController::class)->name('dashboard');

        // Gestion des plats
        Route::resource('products', ProductController::class);

        // Gestion des catégories
        Route::resource('categories', CategoryController::class);

          // Gestion des commandes
        Route::get('orders', [OrderController::class, 'index'])
            ->name('orders.index');

        Route::get('orders/{order}', [OrderController::class, 'show'])
            ->name('orders.show');

        Route::patch('orders/{order}/status', [OrderController::class, 'updateStatus'])
            ->name('orders.update-status');

        Route::delete('orders/{order}', [OrderController::class, 'destroy'])
            ->name('orders.destroy');

         // Médias
        Route::resource('media', MediaController::class)
        ->parameters([
            'media' => 'media',
        ])
        ->only([
            'index',
            'create',
            'store',
            'show',
            'destroy',
        ]);

        // Gestion des groupes d'options
        Route::resource('option-groups', OptionGroupController::class);

        // Gestion des choix d'options
        Route::resource('option-choices', OptionChoiceController::class);

         /*
        |--------------------------------------------------------------------------
        | Utilisateurs
        |--------------------------------------------------------------------------
        */

        Route::resource('users', UserController::class);

        Route::patch('users/{user}/deactivate', [UserController::class, 'deactivate'])
            ->name('users.deactivate');

        Route::patch('users/{user}/activate', [UserController::class, 'activate'])
            ->name('users.activate');

        // MESSAGES
    Route::get('messages', [MessageController::class, 'index'])
        ->name('messages.index');

    Route::post('messages/{message}/reply', [MessageController::class, 'reply'])
        ->name('messages.reply');

    Route::get('messages/{message}', [MessageController::class, 'show'])
        ->name('messages.show');

    Route::patch('messages/{message}', [MessageController::class, 'update'])
        ->name('messages.update');

    Route::delete('messages/{message}', [MessageController::class, 'destroy'])
        ->name('messages.destroy');
    });