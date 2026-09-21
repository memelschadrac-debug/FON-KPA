<?php

namespace App\Http\Controllers\Storefront;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class CartController extends Controller
{
    /**
     * Afficher le panier.
     */
    public function index(Request $request): View
    {
        /*
        |--------------------------------------------------------------------------
        | Récupérer le panier depuis la session
        |--------------------------------------------------------------------------
        */

        $cart = $request->session()->get('cart', []);


        /*
        |--------------------------------------------------------------------------
        | Aucun panier
        |--------------------------------------------------------------------------
        */

        if (empty($cart)) {
            return view(
                'storefront.cart.index',
                [
                    'cart' => [],
                    'totalArticles' => 0,
                    'subtotal' => 0,
                ]
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
            ->unique()
            ->values();


        /*
        |--------------------------------------------------------------------------
        | Charger les produits
        |--------------------------------------------------------------------------
        |
        | On charge :
        |
        | - les images
        | - les groupes d'options
        | - les choix d'options
        |
        | Cela permet d'afficher correctement les personnalisations
        | même si une ancienne ligne du panier ne contient pas encore
        | le snapshot complet.
        |
        */

        $products = Product::query()
            ->whereIn('id', $productIds)
            ->with([
                'productImages' => function ($query) {
                    $query
                        ->orderByDesc('is_primary')
                        ->orderBy('sort_order')
                        ->with('media');
                },

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
        | Préparer les lignes du panier
        |--------------------------------------------------------------------------
        */

        $cart = collect($cart)
            ->map(function ($item) use ($products) {

                /*
                |--------------------------------------------------------------------------
                | Produit
                |--------------------------------------------------------------------------
                */

                $product = $products->get(
                    $item['product_id'] ?? null
                );


                /*
                |--------------------------------------------------------------------------
                | Image principale
                |--------------------------------------------------------------------------
                */

                $item['image'] = $this->getPrimaryImageUrl(
                    $product
                );


                /*
                |--------------------------------------------------------------------------
                | Options
                |--------------------------------------------------------------------------
                |
                | Normalement les options sont déjà présentes dans la session.
                |
                | Exemple :
                |
                | [
                |     [
                |         'group_id' => 1,
                |         'group' => 'Accompagnement au choix',
                |         'choice_id' => 1,
                |         'choice' => 'Attiéké',
                |         'price_modifier' => 0,
                |     ],
                | ]
                |
                | On les reconstruit si nécessaire afin de garantir
                | un affichage cohérent du panier.
                |
                */

                $storedOptions = collect(
                    $item['options'] ?? []
                );


                /*
                |--------------------------------------------------------------------------
                | Si les options sont déjà complètes
                |--------------------------------------------------------------------------
                */

                $options = $storedOptions
                    ->map(function ($option) {
                        return [
                            'group_id' => isset($option['group_id'])
                                ? (int) $option['group_id']
                                : null,

                            'group' => $option['group']
                                ?? 'Option',

                            'choice_id' => isset($option['choice_id'])
                                ? (int) $option['choice_id']
                                : null,

                            'choice' => $option['choice']
                                ?? '',

                            'price_modifier' => isset($option['price_modifier'])
                                ? (float) $option['price_modifier']
                                : 0,
                        ];
                    })
                    ->filter(function ($option) {
                        return !empty($option['choice_id']);
                    })
                    ->values();


                /*
                |--------------------------------------------------------------------------
                | Reconstruire les options à partir des choice_id
                |--------------------------------------------------------------------------
                |
                | Cette partie protège le panier contre les anciennes
                | structures de session.
                |
                */

                if (
                    $product
                    && $options->isNotEmpty()
                ) {

                    $choiceIds = $options
                        ->pluck('choice_id')
                        ->map(fn ($id) => (int) $id)
                        ->unique()
                        ->values();


                    $availableChoices = $product->optionGroups
                        ->flatMap(function ($group) {

                            return $group->optionChoices
                                ->map(function ($choice) use ($group) {

                                    return [
                                        'group_id' => (int) $group->id,
                                        'group' => $group->name,

                                        'choice_id' => (int) $choice->id,
                                        'choice' => $choice->name,

                                        'price_modifier' =>
                                            (float) $choice->price_modifier,
                                    ];
                                });

                        })
                        ->keyBy('choice_id');


                    $options = $choiceIds
                        ->map(function ($choiceId) use ($availableChoices) {

                            return $availableChoices->get(
                                $choiceId
                            );

                        })
                        ->filter()
                        ->values();
                }


                /*
                |--------------------------------------------------------------------------
                | Sauvegarder les options préparées dans la ligne
                |--------------------------------------------------------------------------
                */

                $item['options'] = $options->all();


                return $item;

            })
            ->all();


        /*
        |--------------------------------------------------------------------------
        | Sauvegarder la structure normalisée dans la session
        |--------------------------------------------------------------------------
        |
        | Ce n'est pas obligatoire pour l'affichage actuel, mais cela permet
        | de remettre proprement les anciennes lignes du panier au nouveau
        | format.
        |
        */

        $request->session()->put(
            'cart',
            $cart
        );


        /*
        |--------------------------------------------------------------------------
        | Nombre total d'articles
        |--------------------------------------------------------------------------
        */

        $totalArticles = collect($cart)
            ->sum(function ($item) {
                return (int) ($item['quantity'] ?? 0);
            });


        /*
        |--------------------------------------------------------------------------
        | Sous-total
        |--------------------------------------------------------------------------
        |
        | Le prix enregistré dans le panier correspond déjà au prix
        | unitaire avec options.
        |
        */

        $subtotal = collect($cart)
            ->sum(function ($item) {

                return (float) ($item['price'] ?? 0)
                    * (int) ($item['quantity'] ?? 0);

            });


        /*
        |--------------------------------------------------------------------------
        | Retourner la vue
        |--------------------------------------------------------------------------
        */

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
     * Ajouter un produit personnalisé au panier.
     */
    public function store(
        Request $request,
        Product $product
    ): JsonResponse {

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
        | Valider les données envoyées par le frontend
        |--------------------------------------------------------------------------
        |
        | Le frontend envoie uniquement les IDs des options.
        | Le prix n'est JAMAIS accepté depuis JavaScript.
        |
        */

        $validator = Validator::make(
            $request->all(),
            [

                'options' => [
                    'nullable',
                    'array',
                ],

                'options.*' => [
                    'integer',
                    'distinct',
                ],

                'quantity' => [
                    'nullable',
                    'integer',
                    'min:1',
                    'max:99',
                ],

            ]
        );


        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Les options sélectionnées sont invalides.',
                'errors' => $validator->errors(),
            ], 422);
        }


        /*
        |--------------------------------------------------------------------------
        | Récupérer les choix sélectionnés
        |--------------------------------------------------------------------------
        */

        $selectedChoiceIds = collect(
            $request->input('options', [])
        )
            ->map(fn ($id) => (int) $id)
            ->unique()
            ->values();


        /*
        |--------------------------------------------------------------------------
        | Quantité
        |--------------------------------------------------------------------------
        */

        $quantity = (int) $request->input(
            'quantity',
            1
        );


        /*
        |--------------------------------------------------------------------------
        | Charger les groupes et choix
        |--------------------------------------------------------------------------
        */

        $product->load([
            'optionGroups' => function ($query) {

                $query
                    ->orderBy('sort_order')
                    ->with([
                        'optionChoices' => function ($query) {

                            $query
                                ->orderBy('sort_order');

                        },
                    ]);

            },

            'productImages' => function ($query) {

                $query
                    ->orderByDesc('is_primary')
                    ->orderBy('sort_order')
                    ->with('media');

            },
        ]);


        $groups = $product->optionGroups;


        /*
        |--------------------------------------------------------------------------
        | Construire la liste des choix disponibles
        |--------------------------------------------------------------------------
        */

        $allChoices = $groups
            ->flatMap(function ($group) {

                return $group->optionChoices;

            })
            ->keyBy('id');


        /*
        |--------------------------------------------------------------------------
        | Vérifier que chaque choix appartient au produit
        |--------------------------------------------------------------------------
        */

        foreach ($selectedChoiceIds as $choiceId) {

            if (!$allChoices->has($choiceId)) {

                return response()->json([
                    'success' => false,
                    'message' => 'Une des options sélectionnées est invalide.',
                ], 422);
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Vérifier les règles des groupes
        |--------------------------------------------------------------------------
        */

        foreach ($groups as $group) {

            $groupSelectedChoices = $selectedChoiceIds
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

                return response()->json([
                    'success' => false,
                    'message' =>
                        "Veuillez sélectionner une option dans « {$group->name} ».",
                ], 422);
            }


            /*
            |--------------------------------------------------------------------------
            | Minimum
            |--------------------------------------------------------------------------
            */

            if ($selectedCount < $minChoices) {

                return response()->json([
                    'success' => false,
                    'message' =>
                        "Veuillez sélectionner au moins {$minChoices} option(s) dans « {$group->name} ».",
                ], 422);
            }


            /*
            |--------------------------------------------------------------------------
            | Maximum
            |--------------------------------------------------------------------------
            */

            if (
                $maxChoices > 0
                && $selectedCount > $maxChoices
            ) {

                return response()->json([
                    'success' => false,
                    'message' =>
                        "Vous pouvez sélectionner au maximum {$maxChoices} option(s) dans « {$group->name} ».",
                ], 422);
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Vérifier la disponibilité des choix
        |--------------------------------------------------------------------------
        */

        foreach ($selectedChoiceIds as $choiceId) {

            $choice = $allChoices->get($choiceId);

            if (!$choice->is_available) {

                return response()->json([
                    'success' => false,
                    'message' =>
                        "L’option « {$choice->name} » n’est plus disponible.",
                ], 422);
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Construire le snapshot des options
        |--------------------------------------------------------------------------
        */

        $selectedOptions = $selectedChoiceIds
            ->map(function ($choiceId) use ($allChoices) {

                $choice = $allChoices->get($choiceId);

                $group = $choice->optionGroup;

                return [
                    'group_id' => (int) $group->id,
                    'group' => $group->name,

                    'choice_id' => (int) $choice->id,
                    'choice' => $choice->name,

                    'price_modifier' =>
                        (float) $choice->price_modifier,
                ];
            })
            ->sortBy([
                ['group_id', 'asc'],
                ['choice_id', 'asc'],
            ])
            ->values()
            ->all();


        /*
        |--------------------------------------------------------------------------
        | Calculer le prix final
        |--------------------------------------------------------------------------
        */

        $basePrice = (float) $product->price;

        $optionsPrice = collect($selectedOptions)
            ->sum('price_modifier');

        $unitPrice = $basePrice + $optionsPrice;


        /*
        |--------------------------------------------------------------------------
        | Générer une clé unique pour la configuration
        |--------------------------------------------------------------------------
        */

        $configurationKey = collect($selectedOptions)
            ->pluck('choice_id')
            ->sort()
            ->values()
            ->implode('|');


        $lineKey = hash(
            'sha256',
            $product->id . '|' . $configurationKey
        );


        /*
        |--------------------------------------------------------------------------
        | Récupérer le panier actuel
        |--------------------------------------------------------------------------
        */

        $cart = $request->session()->get(
            'cart',
            []
        );


        /*
        |--------------------------------------------------------------------------
        | Ajouter ou augmenter la quantité
        |--------------------------------------------------------------------------
        */

        if (isset($cart[$lineKey])) {

            $newQuantity =
                (int) $cart[$lineKey]['quantity']
                + $quantity;

            $cart[$lineKey]['quantity'] =
                min($newQuantity, 99);

        } else {

            $cart[$lineKey] = [

                'product_id' => $product->id,

                'name' => $product->name,

                'price' => $unitPrice,

                'quantity' => $quantity,

                /*
                |--------------------------------------------------------------------------
                | Snapshot des options
                |--------------------------------------------------------------------------
                */

                'options' => $selectedOptions,
            ];
        }


        /*
        |--------------------------------------------------------------------------
        | Sauvegarder le panier
        |--------------------------------------------------------------------------
        */

        $request->session()->put(
            'cart',
            $cart
        );


        /*
        |--------------------------------------------------------------------------
        | Nombre total d'articles
        |--------------------------------------------------------------------------
        */

        $cartCount = collect($cart)
            ->sum('quantity');


        /*
        |--------------------------------------------------------------------------
        | Image
        |--------------------------------------------------------------------------
        */

        $imageUrl = $this->getPrimaryImageUrl(
            $product
        );


        /*
        |--------------------------------------------------------------------------
        | Réponse JSON
        |--------------------------------------------------------------------------
        */

        return response()->json([

            'success' => true,

            'message' => 'Plat ajouté au panier.',

            'count' => $cartCount,

            'line_key' => $lineKey,

            'image' => $imageUrl,

        ]);
    }


    /**
     * Modifier la quantité d'une ligne du panier.
     */
    public function update(
        Request $request,
        string $line
    ): RedirectResponse {

        $cart = $request->session()->get(
            'cart',
            []
        );


        if (!isset($cart[$line])) {

            return back()->with(
                'error',
                'Cette ligne n’existe plus dans votre panier.'
            );
        }


        $validated = $request->validate([
            'quantity' => [
                'required',
                'integer',
                'min:1',
                'max:99',
            ],
        ]);


        $cart[$line]['quantity'] =
            (int) $validated['quantity'];


        $request->session()->put(
            'cart',
            $cart
        );


        return back()->with(
            'success',
            'Quantité mise à jour.'
        );
    }


    /**
     * Supprimer une ligne du panier.
     */
    public function destroy(
        Request $request,
        string $line
    ): RedirectResponse {

        $cart = $request->session()->get(
            'cart',
            []
        );


        if (isset($cart[$line])) {
            unset($cart[$line]);
        }


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
    public function clear(
        Request $request
    ): RedirectResponse {

        $request->session()->forget('cart');


        return back()->with(
            'success',
            'Votre panier a été vidé.'
        );
    }


    /**
     * Récupérer l'URL de l'image principale.
     *
     * Priorité :
     * 1. image principale
     * 2. première image
     * 3. null
     */
    private function getPrimaryImageUrl(
        ?Product $product
    ): ?string {

        if (!$product) {
            return null;
        }


        $productImage = $product->productImages
            ->first();


        if (!$productImage || !$productImage->media) {
            return null;
        }


        $media = $productImage->media;


        $disk = $media->disk ?: 'public';


        if (
            !$media->path
            || !Storage::disk($disk)->exists($media->path)
        ) {
            return null;
        }


        return Storage::disk($disk)->url(
            $media->path
        );
    }
}