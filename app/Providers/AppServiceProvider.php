<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Compteur global du panier
        |--------------------------------------------------------------------------
        |
        | Le nombre total d'articles du panier est disponible
        | sur toutes les pages de l'application.
        |
        */

        View::composer('*', function ($view) {

            $cartCount = collect(session('cart', []))
                ->sum('quantity');

            $view->with('cartCount', $cartCount);
        });
    }
}