<?php

namespace App\Http\Controllers\Storefront;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    
/**
 * Afficher le panier.
 */
    public function index(Request $request)
    {
        // Récupérer le panier depuis la session Laravel.
        $cart = $request->session()->get('cart', []);

        // Calculer le nombre total d'articles.
        $totalArticles = collect($cart)->sum('quantity');

        // Calculer le sous-total.
        $subtotal = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        return view(
            'storefront.cart.index',
            compact(
                'cart',
                'totalArticles',
                'subtotal'
            )
        );
    }


    /**
     * Ajouter un produit au panier.
     */
    public function store(Request $request, Product $product)
    {
        /*
        |--------------------------------------------------------------------------
        | Vérifier la disponibilité du produit
        |--------------------------------------------------------------------------
        */

        if (!$product->is_available) {

            return response()->json([
                'success' => false,
                'message' => 'Ce plat n’est actuellement pas disponible.',
            ], 422);
        }


        /*
        |--------------------------------------------------------------------------
        | Récupérer le panier actuel
        |--------------------------------------------------------------------------
        */

        $cart = $request->session()->get('cart', []);


        $productId = (string) $product->id;


        /*
        |--------------------------------------------------------------------------
        | Ajouter ou augmenter la quantité
        |--------------------------------------------------------------------------
        */

        if (isset($cart[$productId])) {

            $cart[$productId]['quantity']++;

        } else {

            $cart[$productId] = [

                'id' => $product->id,

                'name' => $product->name,

                'price' => (float) $product->price,

                'quantity' => 1,

            ];
        }


        /*
        |--------------------------------------------------------------------------
        | Sauvegarder le panier dans la SESSION
        |--------------------------------------------------------------------------
        */

        $request->session()->put(
            'cart',
            $cart
        );


        /*
        |--------------------------------------------------------------------------
        | Calculer le nombre TOTAL d'articles
        |--------------------------------------------------------------------------
        */

        $cartCount = collect($cart)
            ->sum('quantity');


        /*
        |--------------------------------------------------------------------------
        | Réponse JSON
        |--------------------------------------------------------------------------
        */

        return response()->json([

            'success' => true,

            'message' => 'Plat ajouté au panier.',

            'count' => $cartCount,

        ]);
    }


    /**
     * Modifier la quantité.
     */
    public function update(
        Request $request,
        Product $product
    ) {

        $cart = $request->session()->get(
            'cart',
            []
        );


        $productId = (string) $product->id;


        if (!isset($cart[$productId])) {

            return back();

        }


        $validated = $request->validate([

            'quantity' => [
                'required',
                'integer',
                'min:1',
                'max:99',
            ],

        ]);


        $cart[$productId]['quantity'] =
            $validated['quantity'];


        $request->session()->put(
            'cart',
            $cart
        );


        return back();
    }


    /**
     * Supprimer un produit.
     */
    public function destroy(
        Request $request,
        Product $product
    ) {

        $cart = $request->session()->get(
            'cart',
            []
        );


        $productId = (string) $product->id;


        unset($cart[$productId]);


        $request->session()->put(
            'cart',
            $cart
        );


        return back()->with(
            'success',
            'Plat supprimé du panier.'
        );
    }


    /**
     * Vider complètement le panier.
     */
    public function clear(Request $request)
    {
        $request->session()->forget('cart');


        return back()->with(
            'success',
            'Votre panier a été vidé.'
        );
    }
}