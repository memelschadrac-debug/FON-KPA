<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'storefront.home')->name('home');

Route::view('/nos-plats', 'storefront.plats.index')
    ->name('plats.index');

Route::view('/categories', 'storefront.categories.index')
    ->name('categories.index');

Route::view('/a-propos', 'storefront.about')
    ->name('about');

Route::view('/contact', 'storefront.contact')
    ->name('contact');

Route::view('/panier', 'storefront.cart.index')
    ->name('cart.index');

Route::view('/commande', 'storefront.commande.index')
    ->name('commande.index');

Route::get('/commande/{commande}/confirmee', function (Commande $commande) {
    return view('commande.success', compact('commande'));
})->name('commande.success');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'admin'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
