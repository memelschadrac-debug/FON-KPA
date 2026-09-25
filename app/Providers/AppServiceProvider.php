<?php

namespace App\Providers;

use App\Models\Message;
use App\Models\Order;
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
        | DONNÉES GLOBALES DES VUES
        |--------------------------------------------------------------------------
        |
        | Ce View Composer est exécuté lors du rendu des vues.
        |
        | On y centralise certaines données qui doivent être disponibles
        | dans plusieurs parties de l'application.
        |
        */

        View::composer('*', function ($view) {

            /*
            |--------------------------------------------------------------------------
            | COMPTEUR GLOBAL DU PANIER
            |--------------------------------------------------------------------------
            |
            | Le nombre total d'articles du panier est disponible
            | sur toutes les pages de l'application.
            |
            */

            $cartCount = collect(session('cart', []))
                ->sum('quantity');

            $view->with('cartCount', $cartCount);

            /*
            |--------------------------------------------------------------------------
            | COMPTEURS DE L'ADMINISTRATION
            |--------------------------------------------------------------------------
            |
            | Ces données sont nécessaires uniquement pour le sidebar
            | de l'administration.
            |
            | On évite donc de faire ces requêtes sur le storefront.
            |
            */

            if (request()->is('admin/*') || request()->is('admin')) {

                /*
                |--------------------------------------------------------------------------
                | COMMANDES EN ATTENTE
                |--------------------------------------------------------------------------
                |
                | Une commande "pending" nécessite une action de
                | l'administrateur.
                |
                */

                $pendingOrdersCount = Order::query()
                    ->where('status', 'pending')
                    ->count();

                /*
                |--------------------------------------------------------------------------
                | MESSAGES NON LUS
                |--------------------------------------------------------------------------
                |
                | Un message est considéré comme non lu lorsque
                | read_at est NULL.
                |
                */

                $unreadMessagesCount = Message::query()
                    ->whereNull('read_at')
                    ->count();

                $view->with([
                    'pendingOrdersCount' => $pendingOrdersCount,
                    'unreadMessagesCount' => $unreadMessagesCount,
                ]);
            }
        });
    }
}
