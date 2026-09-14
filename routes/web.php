<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Storefront\CartController;
use App\Http\Controllers\Storefront\OrderController;
use App\Http\Controllers\Storefront\DishesController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'storefront.home')
    ->name('home');

Route::get('/nos-plats', [DishesController::class, 'index'])
    ->name('plats.index');

//Route::view('/nos-plats', 'storefront.plats.index')
//    ->name('plats.index');

Route::view('/categories', 'storefront.categories.index')
    ->name('categories.index');

Route::view('/a-propos', 'storefront.about')
    ->name('about');

// =========================================================
// Contact
// =========================================================

Route::view('/contact', 'storefront.contact')
    ->name('contact');

Route::post('/contact', [ContactController::class, 'store'])
    ->name('contact.store');

// =========================================================
// PANIER
// =========================================================

Route::get('/panier', [CartController::class, 'index'])
    ->name('cart.index');

Route::post('/panier/{product}', [CartController::class, 'store'])
    ->name('cart.store');

Route::patch('/panier/{product}/quantity', [CartController::class, 'update'])
    ->name('cart.update');

Route::delete('/panier/{product}', [CartController::class, 'destroy'])
    ->name('cart.destroy');

Route::delete('/panier', [CartController::class, 'clear'])
    ->name('cart.clear');

// =========================================================
// COMMANDE
// =========================================================

Route::middleware('auth')->group(function () {

    // ---------------------------------------------------------
    // AFFICHER LA PAGE DE COMMANDE
    // ---------------------------------------------------------

    Route::get('/commande', function (\Illuminate\Http\Request $request) {

        $cart = $request->session()->get('cart', []);

        $totalArticles = collect($cart)->sum('quantity');

        $subtotal = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        return view('storefront.commande.index', [
            'cart' => $cart,
            'totalArticles' => $totalArticles,
            'subtotal' => $subtotal,
        ]);

    })->name('commande.index');


    // ---------------------------------------------------------
    // ENREGISTRER LA COMMANDE
    // ---------------------------------------------------------

    Route::post('/commande', [OrderController::class, 'store'])
        ->name('commande.store');


    // ---------------------------------------------------------
    // CONFIRMATION
    // ---------------------------------------------------------

    Route::get('/commande/{order}/confirmee', function (\App\Models\Order $order) {

        $order->load([
            'user',
            'items.product',
        ]);

        return view(
            'storefront.commande.success',
            compact('order')
        );

    })->name('commande.success');

});
// =========================================================
// DASHBOARD
// =========================================================

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})
    ->middleware(['auth', 'verified', 'admin'])
    ->name('dashboard');


// =========================================================
// PROFIL
// =========================================================

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});


// =========================================================
// AUTHENTIFICATION
// =========================================================

require __DIR__.'/auth.php';


// =========================================================
// ADMINISTRATION
// =========================================================

require __DIR__.'/admin.php';