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
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Throwable;

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
        | IMPORTANT :
        |
        | Le panier/session n'est jamais considéré comme une source
        | de vérité pour :
        |
        | - le prix du produit ;
        | - le prix des options ;
        | - la disponibilité ;
        | - les règles des groupes d'options.
        |
        | Toutes ces informations viennent de la base.
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

        /*
        |--------------------------------------------------------------------------
        | Total en centimes
        |--------------------------------------------------------------------------
        |
        | Nous utilisons des entiers pour les calculs monétaires.
        |
        | Exemple :
        |
        | 3 500 FCFA
        |
        | devient :
        |
        | 350000 centimes
        |
        | Cela évite les problèmes classiques liés aux float.
        |
        */

        $totalCents = 0;

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
            | IMPORTANT :
            |
            | Le prix éventuellement présent dans le panier est ignoré.
            | Seul l'ID du choix est utilisé.
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
            | Calcul du prix des options
            |--------------------------------------------------------------------------
            |
            | Chaque montant est converti en centimes avant le calcul.
            |
            */

            $optionsPriceCents = $choiceIds->sum(
                function ($choiceId) use ($allChoices) {

                    return $this->moneyToCents(
                        $allChoices
                            ->get($choiceId)
                            ->price_modifier
                    );
                }
            );

            /*
            |--------------------------------------------------------------------------
            | Prix de base
            |--------------------------------------------------------------------------
            */

            $basePriceCents = $this->moneyToCents(
                $product->price
            );

            /*
            |--------------------------------------------------------------------------
            | Prix unitaire final
            |--------------------------------------------------------------------------
            */

            $unitPriceCents =
                $basePriceCents
                + $optionsPriceCents;

            /*
            |--------------------------------------------------------------------------
            | Sous-total
            |--------------------------------------------------------------------------
            */

            $subtotalCents =
                $unitPriceCents
                * $quantity;

            /*
            |--------------------------------------------------------------------------
            | Vérifier que le prix final est valide
            |--------------------------------------------------------------------------
            */

            if ($unitPriceCents <= 0 || $subtotalCents <= 0) {
                return redirect()
                    ->route('cart.index')
                    ->with(
                        'error',
                        "Le prix du plat « {$product->name} » est invalide."
                    );
            }

            /*
            |--------------------------------------------------------------------------
            | Ajouter au total
            |--------------------------------------------------------------------------
            */

            $totalCents += $subtotalCents;

            /*
            |--------------------------------------------------------------------------
            | Préparer les snapshots des options
            |--------------------------------------------------------------------------
            |
            | Nous sauvegardons les informations importantes au moment
            | de la commande afin que l'historique reste cohérent même
            | si le produit ou l'option est modifié plus tard.
            |
            */

            $options = $choiceIds
                ->map(function ($choiceId) use ($allChoices) {

                    $choice = $allChoices->get($choiceId);

                    $group = $choice->optionGroup;

                    return [
                        'option_group_id' =>
                            (int) $group->id,

                        'option_choice_id' =>
                            (int) $choice->id,

                        'group_name' =>
                            $group->name,

                        'choice_name' =>
                            $choice->name,

                        /*
                        |------------------------------------------------------
                        | On stocke une valeur monétaire exacte.
                        |------------------------------------------------------
                        */

                        'price_modifier' =>
                            $this->centsToMoney(
                                $this->moneyToCents(
                                    $choice->price_modifier
                                )
                            ),
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

                'line_key' =>
                    $lineKey,

                'product' =>
                    $product,

                'quantity' =>
                    $quantity,

                'unit_price' =>
                    $this->centsToMoney(
                        $unitPriceCents
                    ),

                'subtotal' =>
                    $this->centsToMoney(
                        $subtotalCents
                    ),

                'options' =>
                    $options,
            ];
        }

        /*
        |--------------------------------------------------------------------------
        | Vérifier le total final
        |--------------------------------------------------------------------------
        */

        if ($totalCents <= 0) {
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
            $totalCents
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

                'user_id' =>
                    auth()->id(),

                'order_number' =>
                    $orderNumber,

                'total' =>
                    $this->centsToMoney(
                        $totalCents
                    ),

                'status' =>
                    'pending',

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
        |
        | La commande a été validée et enregistrée avec succès.
        |
        */

        $request->session()->forget('cart');

        /*
        |--------------------------------------------------------------------------
        | Envoyer l'email de confirmation
        |--------------------------------------------------------------------------
        |
        | IMPORTANT :
        |
        | Une erreur de messagerie ne doit jamais annuler une commande
        | déjà enregistrée en base.
        |
        | Nous journalisons l'erreur afin de pouvoir la diagnostiquer.
        |
        */

        try {

            Mail::to(
                $validated['email']
            )->send(
                new OrderConfirmationMail($order)
            );

        } catch (Throwable $exception) {

            Log::error(
                'Échec de l’envoi de l’email de confirmation de commande.',
                [
                    'order_id' =>
                        $order->id,

                    'order_number' =>
                        $order->order_number,

                    'email' =>
                        $validated['email'],

                    'error' =>
                        $exception->getMessage(),
                ]
            );
        }

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
        | Un utilisateur connecté ne doit jamais pouvoir consulter
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
        */

        foreach ($order->items as $item) {

            $item->image_url =
                $this->getPrimaryImageUrl(
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
     * 1. Image marquée comme principale
     * 2. Première image disponible
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
        | Chercher d'abord l'image principale
        |--------------------------------------------------------------------------
        |
        | On ne dépend plus de l'ordre naturel de la relation.
        |
        */

        $productImage =
            $product->productImages
                ->first(
                    fn ($image) =>
                        (bool) $image->is_primary
                );

        /*
        |--------------------------------------------------------------------------
        | Fallback : première image
        |--------------------------------------------------------------------------
        */

        if (!$productImage) {
            $productImage =
                $product->productImages->first();
        }

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

    /**
     * =========================================================
     * CONVERTIR UN MONTANT EN CENTIMES
     * =========================================================
     *
     * Exemple :
     *
     * "3500.00" -> 350000
     * "1500.50" -> 150050
     *
     * On évite volontairement les float.
     */
    private function moneyToCents(
        mixed $amount
    ): int {

        $value = trim(
            (string) $amount
        );

        /*
        |--------------------------------------------------------------------------
        | Nettoyer le format monétaire
        |--------------------------------------------------------------------------
        */

        $value = str_replace(
            [' ', ','],
            ['', '.'],
            $value
        );

        /*
        |--------------------------------------------------------------------------
        | Vérifier le format
        |--------------------------------------------------------------------------
        */

        if (
            !preg_match(
                '/^-?\d+(?:\.\d{1,2})?$/',
                $value
            )
        ) {
            throw new \InvalidArgumentException(
                'Montant monétaire invalide.'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Séparer partie entière et décimale
        |--------------------------------------------------------------------------
        */

        [$whole, $decimal] = array_pad(
            explode('.', $value, 2),
            2,
            '0'
        );

        /*
        |--------------------------------------------------------------------------
        | Toujours travailler avec exactement deux décimales
        |--------------------------------------------------------------------------
        */

        $decimal = str_pad(
            substr($decimal, 0, 2),
            2,
            '0'
        );

        /*
        |--------------------------------------------------------------------------
        | Calcul exact en entier
        |--------------------------------------------------------------------------
        */

        $sign = str_starts_with(
            $whole,
            '-'
        )
            ? -1
            : 1;

        $whole = ltrim(
            $whole,
            '+-'
        );

        return $sign * (
            ((int) $whole * 100)
            + (int) $decimal
        );
    }

    /**
     * =========================================================
     * CONVERTIR DES CENTIMES EN MONTANT DÉCIMAL
     * =========================================================
     *
     * Exemple :
     *
     * 350000 -> "3500.00"
     * 150050 -> "1500.50"
     */
    private function centsToMoney(
        int $cents
    ): string {

        $sign = $cents < 0
            ? '-'
            : '';

        $cents = abs($cents);

        $whole = intdiv(
            $cents,
            100
        );

        $decimal = $cents % 100;

        return sprintf(
            '%s%d.%02d',
            $sign,
            $whole,
            $decimal
        );
    }
}
