<?php

namespace App\Http\Controllers\Storefront;

use App\Http\Controllers\Controller;
use App\Mail\OrderConfirmationMail;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    /**
     * Enregistre une nouvelle commande.
     */
    public function store(Request $request): RedirectResponse
    {
        // =====================================================
        // 1. VALIDATION DU FORMULAIRE
        // =====================================================

        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:30'],

            'address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:100'],
            'district' => ['required', 'string', 'max:100'],

            'delivery_method' => [
                'required',
                'in:delivery,pickup',
            ],

            'payment_method' => [
                'required',
                'in:mobile_money,cash,card',
            ],

            'note' => ['nullable', 'string', 'max:1000'],
        ]);


        // =====================================================
        // 2. RÉCUPÉRER LE PANIER
        // =====================================================

        $cart = $request->session()->get('cart', []);

        // Empêcher la création d'une commande vide
        if (empty($cart)) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Votre panier est vide.');
        }


        // =====================================================
        // 3. VÉRIFIER LES PRODUITS ET CALCULER LE TOTAL
        // =====================================================

        $total = 0;

        $products = Product::whereIn(
            'id',
            array_keys($cart)
        )
        ->get()
        ->keyBy('id');


        foreach ($cart as $productId => $item) {

            // Le produit n'existe plus
            if (!isset($products[$productId])) {
                return redirect()
                    ->route('cart.index')
                    ->with(
                        'error',
                        'Un produit de votre panier n’est plus disponible.'
                    );
            }

            $product = $products[$productId];

            // Vérifier que le produit est toujours disponible
            if (!$product->is_available) {
                return redirect()
                    ->route('cart.index')
                    ->with(
                        'error',
                        "Le plat « {$product->name} » n’est plus disponible."
                    );
            }

            $quantity = (int) $item['quantity'];

            // Sécurité supplémentaire
            if ($quantity < 1 || $quantity > 99) {
                return redirect()
                    ->route('cart.index')
                    ->with(
                        'error',
                        'La quantité d’un produit est invalide.'
                    );
            }

            // Utiliser le prix actuel de la base de données
            // et non celui envoyé par le navigateur.
            $unitPrice = (float) $product->price;

            $itemSubtotal = $unitPrice * $quantity;

            $total += $itemSubtotal;
        }


        // =====================================================
        // 4. CRÉER LA COMMANDE ET SES LIGNES
        // =====================================================

        $order = DB::transaction(function () use (
            $request,
            $validated,
            $cart,
            $products,
            $total
        ) {

            // Générer un numéro de commande unique
            do {
                $orderNumber = 'FK-' . strtoupper(
                    Str::random(8)
                );
            } while (
                Order::where(
                    'order_number',
                    $orderNumber
                )->exists()
            );


            // -------------------------------------------------
            // Création de la commande
            // -------------------------------------------------

            $order = Order::create([
                'user_id' => $request->user()->id,
                'order_number' => $orderNumber,
                'total' => $total,
                'status' => 'pending',

                'delivery_method' => $validated['delivery_method'],
                'city' => $validated['city'],
                'commune' => $validated['district'],
                'delivery_address' => $validated['address'],
                'phone' => $validated['phone'],
            ]);


            // -------------------------------------------------
            // Création des lignes de commande
            // -------------------------------------------------

            foreach ($cart as $productId => $item) {

                $product = $products[$productId];

                $quantity = (int) $item['quantity'];

                $unitPrice = (float) $product->price;

                $subtotal = $unitPrice * $quantity;


                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'unit_price' => $unitPrice,
                    'subtotal' => $subtotal,
                ]);
            }


            return $order;
        });


        // =====================================================
        // 5. VIDER LE PANIER
        // =====================================================

        $request->session()->forget('cart');


        // =====================================================
        // 6. CHARGER LES RELATIONS POUR L'EMAIL
        // =====================================================

        $order->load([
            'user',
            'items.product.images.media',
        ]);


        // =====================================================
        // 7. ENVOYER L'EMAIL DE CONFIRMATION
        // =====================================================


        Mail::to($validated['email'])
            ->send(
                new OrderConfirmationMail($order)
            );


        // =====================================================
        // 8. REDIRECTION VERS LA PAGE DE CONFIRMATION
        // =====================================================

        return redirect()
            ->route('commande.success', $order)
            ->with(
                'success',
                'Votre commande a été enregistrée avec succès.'
            );
    }
}