<?php

namespace App\Http\Controllers\Storefront;

use App\Http\Controllers\Controller;
use App\Mail\OrderConfirmationMail;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderItemOption;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class OrderController extends Controller
{
    /**
     * =========================================================
     * PASSER LA COMMANDE
     * =========================================================
     */
    public function store(Request $request): RedirectResponse
    {
        /*
        |--------------------------------------------------------------------------
        | Validation des informations de commande
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([
            'first_name' => [
                'required',
                'string',
                'max:100',
            ],

            'last_name' => [
                'required',
                'string',
                'max:100',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
            ],

            'phone' => [
                'required',
                'string',
                'max:30',
            ],

            'address' => [
                'required',
                'string',
                'max:255',
            ],

            'city' => [
                'required',
                'string',
                'max:100',
            ],

            'district' => [
                'required',
                'string',
                'max:100',
            ],

            'delivery_method' => [
                'required',
                'in:delivery,pickup',
            ],

            'payment_method' => [
                'required',
                'in:mobile_money,cash,card',
            ],

            'note' => [
                'nullable',
                'string',
                'max:1000',
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Récupérer le panier
        |--------------------------------------------------------------------------
        */

        $cart = $request->session()->get('cart', []);

        /*
        |--------------------------------------------------------------------------
        | Vérifier que le panier n'est pas vide
        |--------------------------------------------------------------------------
        */

        if (empty($cart)) {
            return redirect()
                ->route('cart.index')
                ->with(
                    'error',
                    'Votre panier est vide.'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | Récupérer les IDs des produits
        |--------------------------------------------------------------------------
        */

        $productIds = collect($cart)
            ->pluck('product_id')
            ->filter()
            ->map(fn ($id) => (int) $id)
            ->unique()
            ->values();

        /*
        |--------------------------------------------------------------------------
        | Vérifier qu'il existe au moins un produit valide
        |--------------------------------------------------------------------------
        */

        if ($productIds->isEmpty()) {
            return redirect()
                ->route('cart.index')
                ->with(
                    'error',
                    'Votre panier ne contient aucun produit valide.'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | Charger les produits et leurs options
        |--------------------------------------------------------------------------
        |
        | Important :
        | On recharge les données depuis la base.
        |
        | Le panier ne doit jamais être considéré comme une source
        | de vérité pour les prix.
        |
        */

        $products = Product::query()
            ->whereIn('id', $productIds)
            ->with([
                'optionGroups' => function ($query) {
                    $query
                        ->orderBy('sort_order')
                        ->with([
                            'optionChoices' => function ($query) {
                                $query->orderBy('sort_order');
                            },
                        ]);
                },
            ])
            ->get()
            ->keyBy('id');

        /*
        |--------------------------------------------------------------------------
        | Vérifier que tous les produits existent encore
        |--------------------------------------------------------------------------
        */

        if ($products->count() !== $productIds->count()) {
            return redirect()
                ->route('cart.index')
                ->with(
                    'error',
                    'Un ou plusieurs plats de votre panier ne sont plus disponibles.'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | Préparer les lignes de commande
        |--------------------------------------------------------------------------
        */

        $orderLines = [];
        $total = 0;

        /*
        |--------------------------------------------------------------------------
        | Vérifier chaque ligne du panier
        |--------------------------------------------------------------------------
        */

        foreach ($cart as $lineKey => $item) {

            /*
            |--------------------------------------------------------------------------
            | Produit
            |--------------------------------------------------------------------------
            */

            $productId = (int) ($item['product_id'] ?? 0);

            $product = $products->get($productId);

            /*
            |--------------------------------------------------------------------------
            | Produit introuvable
            |--------------------------------------------------------------------------
            */

            if (!$product) {
                return redirect()
                    ->route('cart.index')
                    ->with(
                        'error',
                        'Un plat de votre panier n’existe plus.'
                    );
            }

            /*
            |--------------------------------------------------------------------------
            | Vérifier la disponibilité du produit
            |--------------------------------------------------------------------------
            */

            if (!$product->is_available) {
                return redirect()
                    ->route('cart.index')
                    ->with(
                        'error',
                        "Le plat « {$product->name} » n’est plus disponible."
                    );
            }

            /*
            |--------------------------------------------------------------------------
            | Quantité
            |--------------------------------------------------------------------------
            */

            $quantity = (int) ($item['quantity'] ?? 0);

            if ($quantity < 1 || $quantity > 99) {
                return redirect()
                    ->route('cart.index')
                    ->with(
                        'error',
                        "La quantité du plat « {$product->name} » est invalide."
                    );
            }

            /*
            |--------------------------------------------------------------------------
            | Récupérer les options du panier
            |--------------------------------------------------------------------------
            */

            $storedOptions = collect(
                $item['options'] ?? []
            );

            /*
            |--------------------------------------------------------------------------
            | Récupérer uniquement les IDs des choix
            |--------------------------------------------------------------------------
            |
            | Nous ne faisons jamais confiance au prix présent dans
            | la session ou envoyé par le navigateur.
            |
            */

            $choiceIds = $storedOptions
                ->pluck('choice_id')
                ->filter()
                ->map(fn ($id) => (int) $id)
                ->unique()
                ->values();

            /*
            |--------------------------------------------------------------------------
            | Construire toutes les options disponibles pour le produit
            |--------------------------------------------------------------------------
            */

            $allChoices = $product->optionGroups
                ->flatMap(function ($group) {
                    return $group->optionChoices;
                })
                ->keyBy('id');

            /*
            |--------------------------------------------------------------------------
            | Vérifier que chaque choix appartient réellement au produit
            |--------------------------------------------------------------------------
            */

            foreach ($choiceIds as $choiceId) {

                if (!$allChoices->has($choiceId)) {
                    return redirect()
                        ->route('cart.index')
                        ->with(
                            'error',
                            "Une option sélectionnée pour « {$product->name} » est invalide."
                        );
                }
            }

            /*
            |--------------------------------------------------------------------------
            | Vérifier les règles de chaque groupe d'options
            |--------------------------------------------------------------------------
            */

            foreach ($product->optionGroups as $group) {

                $groupSelectedChoices = $choiceIds
                    ->filter(function ($choiceId) use (
                        $allChoices,
                        $group
                    ) {

                        if (!$allChoices->has($choiceId)) {
                            return false;
                        }

                        return (int) $allChoices
                            ->get($choiceId)
                            ->option_group_id === (int) $group->id;
                    })
                    ->values();

                $selectedCount = $groupSelectedChoices->count();

                $minChoices = (int) $group->min_choices;

                $maxChoices = (int) $group->max_choices;

                /*
                |--------------------------------------------------------------------------
                | Groupe obligatoire
                |--------------------------------------------------------------------------
                */

                if (
                    $group->is_required
                    && $selectedCount < 1
                ) {
                    return redirect()
                        ->route('cart.index')
                        ->with(
                            'error',
                            "Veuillez sélectionner une option dans « {$group->name} » pour « {$product->name} »."
                        );
                }

                /*
                |--------------------------------------------------------------------------
                | Minimum de choix
                |--------------------------------------------------------------------------
                */

                if ($selectedCount < $minChoices) {
                    return redirect()
                        ->route('cart.index')
                        ->with(
                            'error',
                            "Veuillez sélectionner au moins {$minChoices} option(s) dans « {$group->name} »."
                        );
                }

                /*
                |--------------------------------------------------------------------------
                | Maximum de choix
                |--------------------------------------------------------------------------
                */

                if (
                    $maxChoices > 0
                    && $selectedCount > $maxChoices
                ) {
                    return redirect()
                        ->route('cart.index')
                        ->with(
                            'error',
                            "Vous pouvez sélectionner au maximum {$maxChoices} option(s) dans « {$group->name} »."
                        );
                }
            }

            /*
            |--------------------------------------------------------------------------
            | Vérifier la disponibilité des choix
            |--------------------------------------------------------------------------
            */

            foreach ($choiceIds as $choiceId) {

                $choice = $allChoices->get($choiceId);

                if (!$choice->is_available) {
                    return redirect()
                        ->route('cart.index')
                        ->with(
                            'error',
                            "L’option « {$choice->name} » n’est plus disponible."
                        );
                }
            }

            /*
            |--------------------------------------------------------------------------
            | Calculer le supplément des options
            |--------------------------------------------------------------------------
            */

            $optionsPrice = $choiceIds->sum(
                function ($choiceId) use ($allChoices) {

                    return (float) $allChoices
                        ->get($choiceId)
                        ->price_modifier;
                }
            );

            /*
            |--------------------------------------------------------------------------
            | Prix de base
            |--------------------------------------------------------------------------
            */

            $basePrice = (float) $product->price;

            /*
            |--------------------------------------------------------------------------
            | Prix unitaire final
            |--------------------------------------------------------------------------
            */

            $unitPrice = $basePrice + $optionsPrice;

            /*
            |--------------------------------------------------------------------------
            | Sous-total
            |--------------------------------------------------------------------------
            */

            $subtotal = $unitPrice * $quantity;

            /*
            |--------------------------------------------------------------------------
            | Ajouter au total
            |--------------------------------------------------------------------------
            */

            $total += $subtotal;

            /*
            |--------------------------------------------------------------------------
            | Préparer les snapshots des options
            |--------------------------------------------------------------------------
            |
            | Nous sauvegardons les informations importantes de l'option
            | au moment de la commande.
            |
            */

            $options = $choiceIds
                ->map(function ($choiceId) use ($allChoices) {

                    $choice = $allChoices->get($choiceId);

                    $group = $choice->optionGroup;

                    return [
                        'option_group_id' => (int) $group->id,

                        'option_choice_id' => (int) $choice->id,

                        'group_name' => $group->name,

                        'choice_name' => $choice->name,

                        'price_modifier' => (float) $choice->price_modifier,
                    ];
                })
                ->sortBy([
                    ['option_group_id', 'asc'],
                    ['option_choice_id', 'asc'],
                ])
                ->values()
                ->all();

            /*
            |--------------------------------------------------------------------------
            | Préparer la ligne de commande
            |--------------------------------------------------------------------------
            */

            $orderLines[] = [

                'line_key' => $lineKey,

                'product' => $product,

                'quantity' => $quantity,

                'unit_price' => $unitPrice,

                'subtotal' => $subtotal,

                'options' => $options,
            ];
        }

        /*
        |--------------------------------------------------------------------------
        | Vérifier le total
        |--------------------------------------------------------------------------
        */

        if ($total <= 0) {
            return redirect()
                ->route('cart.index')
                ->with(
                    'error',
                    'Le montant de votre commande est invalide.'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | Créer la commande dans une transaction
        |--------------------------------------------------------------------------
        */

        $order = DB::transaction(function () use (
            $validated,
            $orderLines,
            $total
        ) {

            /*
            |--------------------------------------------------------------------------
            | Générer un numéro de commande unique
            |--------------------------------------------------------------------------
            */

            do {
                $orderNumber =
                    'FK-' .
                    strtoupper(
                        Str::random(8)
                    );

            } while (
                Order::where(
                    'order_number',
                    $orderNumber
                )->exists()
            );

            /*
            |--------------------------------------------------------------------------
            | Créer la commande
            |--------------------------------------------------------------------------
            */

            $order = Order::create([

                'user_id' => auth()->id(),

                'order_number' => $orderNumber,

                'total' => $total,

                'status' => 'pending',

                'delivery_method' =>
                    $validated['delivery_method'],

                'city' =>
                    $validated['city'],

                'commune' =>
                    $validated['district'],

                'delivery_address' =>
                    $validated['address'],

                'phone' =>
                    $validated['phone'],
            ]);

            /*
            |--------------------------------------------------------------------------
            | Créer les lignes de commande
            |--------------------------------------------------------------------------
            */

            foreach ($orderLines as $line) {

                $orderItem = OrderItem::create([

                    'order_id' =>
                        $order->id,

                    'product_id' =>
                        $line['product']->id,

                    'quantity' =>
                        $line['quantity'],

                    'unit_price' =>
                        $line['unit_price'],

                    'subtotal' =>
                        $line['subtotal'],
                ]);

                /*
                |--------------------------------------------------------------------------
                | Créer les snapshots des options
                |--------------------------------------------------------------------------
                */

                foreach ($line['options'] as $option) {

                    OrderItemOption::create([

                        'order_item_id' =>
                            $orderItem->id,

                        'option_group_id' =>
                            $option['option_group_id'],

                        'option_choice_id' =>
                            $option['option_choice_id'],

                        'group_name' =>
                            $option['group_name'],

                        'choice_name' =>
                            $option['choice_name'],

                        'price_modifier' =>
                            $option['price_modifier'],
                    ]);
                }
            }

            return $order;
        });

        /*
        |--------------------------------------------------------------------------
        | Vider le panier
        |--------------------------------------------------------------------------
        */

        $request->session()->forget('cart');

        /*
        |--------------------------------------------------------------------------
        | Envoyer l'email de confirmation
        |--------------------------------------------------------------------------
        |
        | La page success est une nouvelle requête après la redirection.
        | Il est donc inutile de préparer image_url ici.
        |
        */

        Mail::to(
            $validated['email']
        )->send(
            new OrderConfirmationMail($order)
        );

        /*
        |--------------------------------------------------------------------------
        | Redirection vers la page de succès
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route(
                'commande.success',
                $order
            )
            ->with(
                'success',
                'Votre commande a été enregistrée avec succès.'
            );
    }

    /**
     * =========================================================
     * PAGE DE CONFIRMATION DE COMMANDE
     * =========================================================
     */
    public function success(Order $order): View
    {
        /*
        |--------------------------------------------------------------------------
        | Autorisation
        |--------------------------------------------------------------------------
        |
        | Un utilisateur connecté ne doit pas pouvoir consulter
        | la commande d'un autre utilisateur.
        |
        */

        if (
            auth()->check()
            && $order->user_id !== auth()->id()
        ) {
            abort(403);
        }

        /*
        |--------------------------------------------------------------------------
        | Charger les relations nécessaires
        |--------------------------------------------------------------------------
        |
        | On recharge ici les données car la page success est
        | appelée après une redirection HTTP.
        |
        */

        $order->load([
            'user',
            'items.product.productImages.media',
            'items.options',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Préparer les URLs des images
        |--------------------------------------------------------------------------
        |
        | Cette logique doit être exécutée ici.
        |
        | Elle permet à la Blade d'utiliser simplement :
        |
        | $item->image_url
        |
        */

        foreach ($order->items as $item) {

            $item->image_url = $this->getPrimaryImageUrl(
                $item->product
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Afficher la page
        |--------------------------------------------------------------------------
        */

        return view(
            'storefront.commande.success',
            compact('order')
        );
    }

    /**
     * =========================================================
     * URL DE L'IMAGE PRINCIPALE
     * =========================================================
     *
     * Priorité :
     *
     * 1. Image principale
     * 2. Première image
     * 3. null
     */
    private function getPrimaryImageUrl(
        ?Product $product
    ): ?string {

        /*
        |--------------------------------------------------------------------------
        | Produit inexistant
        |--------------------------------------------------------------------------
        */

        if (!$product) {
            return null;
        }

        /*
        |--------------------------------------------------------------------------
        | Récupérer l'image principale
        |--------------------------------------------------------------------------
        |
        | La relation productImages doit idéalement être triée
        | avec :
        |
        | is_primary DESC
        | sort_order ASC
        |
        */

        $productImage = $product->productImages->first();

        /*
        |--------------------------------------------------------------------------
        | Vérifier l'image et son média
        |--------------------------------------------------------------------------
        */

        if (
            !$productImage
            || !$productImage->media
        ) {
            return null;
        }

        /*
        |--------------------------------------------------------------------------
        | Récupérer le média
        |--------------------------------------------------------------------------
        */

        $media = $productImage->media;

        /*
        |--------------------------------------------------------------------------
        | Déterminer le disque
        |--------------------------------------------------------------------------
        */

        $disk = $media->disk ?: 'public';

        /*
        |--------------------------------------------------------------------------
        | Vérifier que le fichier existe réellement
        |--------------------------------------------------------------------------
        */

        if (
            !$media->path
            || !Storage::disk($disk)->exists(
                $media->path
            )
        ) {
            return null;
        }

        /*
        |--------------------------------------------------------------------------
        | Générer l'URL publique
        |--------------------------------------------------------------------------
        */

        return Storage::disk($disk)->url(
            $media->path
        );
    }
}