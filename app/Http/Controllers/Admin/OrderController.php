<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    /**
     * Affiche la liste de toutes les commandes.
     */
    public function index(): View
    {
        $orders = Order::with('user')
            ->latest()
            ->paginate(10);

        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Affiche le détail d'une commande.
     */
    public function show(Order $order): View
    {
        $order->load([
            'user',
            'items.product',
        ]);

        return view('admin.orders.show', compact('order'));
    }

    /**
     * Met à jour le statut d'une commande.
     */
   public function updateStatus(
        Request $request,
        Order $order
    ): RedirectResponse {
        $validated = $request->validate([
            'status' => [
                'required',
                'in:pending,confirmed,preparing,shipped,delivered,cancelled',
            ],
        ]);

        $currentStatus = $order->status;
        $newStatus = $validated['status'];

        /*
        |--------------------------------------------------------------------------
        | Transitions autorisées
        |--------------------------------------------------------------------------
        | Chaque statut possède explicitement les statuts vers lesquels
        | la commande peut évoluer.
        |
        | Cela empêche notamment :
        | - de livrer directement une commande en attente ;
        | - de revenir en arrière après livraison ;
        | - de modifier une commande déjà annulée.
        */
        $allowedTransitions = [
            'pending' => [
                'confirmed',
                'cancelled',
            ],

            'confirmed' => [
                'preparing',
                'cancelled',
            ],

            'preparing' => [
                'shipped',
            ],

            'shipped' => [
                'delivered',
            ],

            'delivered' => [],

            'cancelled' => [],
        ];

        /*
        |--------------------------------------------------------------------------
        | Même statut
        |--------------------------------------------------------------------------
        | Si l'administrateur soumet le statut déjà enregistré,
        | on ne considère pas cela comme une transition invalide.
        */
        if ($currentStatus === $newStatus) {
            return redirect()
                ->back()
                ->with('success', 'Le statut de la commande est déjà à jour.');
        }

        /*
        |--------------------------------------------------------------------------
        | Vérification de la transition
        |--------------------------------------------------------------------------
        */
        if (! in_array(
            $newStatus,
            $allowedTransitions[$currentStatus] ?? [],
            true
        )) {
            return redirect()
                ->back()
                ->withErrors([
                    'status' => sprintf(
                        'Impossible de passer la commande de "%s" à "%s".',
                        $currentStatus,
                        $newStatus
                    ),
                ])
                ->withInput();
        }

        /*
        |--------------------------------------------------------------------------
        | Mise à jour
        |--------------------------------------------------------------------------
        */
        $order->update([
            'status' => $newStatus,
        ]);

        return redirect()
            ->back()
            ->with('success', 'Statut de la commande mis à jour.');
    }
    /**
     * Supprime une commande.
     */
    public function destroy(Order $order): RedirectResponse
    {
        /*
        |--------------------------------------------------------------------------
        | Protection de l'historique des commandes
        |--------------------------------------------------------------------------
        | Une commande qui a été confirmée, préparée, expédiée ou livrée
        | doit rester dans l'historique commercial.
        |
        | Seules les commandes encore en attente ou déjà annulées
        | peuvent être supprimées définitivement.
        */
        if (! in_array($order->status, ['pending', 'cancelled'], true)) {
            return redirect()
                ->back()
                ->withErrors([
                    'order' => 'Cette commande ne peut plus être supprimée car elle fait partie de l’historique commercial.',
                ]);
        }

        $order->delete();

        return redirect()
            ->route('admin.orders.index')
            ->with('success', 'Commande supprimée avec succès.');
    }
}