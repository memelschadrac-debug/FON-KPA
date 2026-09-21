<?php

namespace App\Http\Controllers\Storefront;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class DishesController extends Controller
{
    public function index(): View
    {
        /*
        |--------------------------------------------------------------------------
        | CATÉGORIES
        |--------------------------------------------------------------------------
        | On récupère uniquement les 4 catégories utilisées
        | par le catalogue FON-KPA.
        |
        | "Tous les plats" n'est PAS une catégorie en base de données.
        | C'est simplement un filtre affiché dans l'interface.
        |--------------------------------------------------------------------------
        */

        $categorySlugs = [
            'accompagnement',
            'boisson',
            'sauce',
            'grillade',
        ];

        $categories = Category::withCount('products')
            ->whereIn('slug', $categorySlugs)
            ->get()
            ->sortBy(function ($category) use ($categorySlugs) {
                return array_search(
                    $category->slug,
                    $categorySlugs
                );
            })
            ->values();

        /*
        |--------------------------------------------------------------------------
        | PRODUITS
        |--------------------------------------------------------------------------
        | On récupère les produits avec :
        |
        | - leur catégorie
        | - leurs images
        | - leur média associé
        | - leurs groupes d'options
        | - les choix disponibles dans chaque groupe
        |--------------------------------------------------------------------------
        */

        $products = Product::with([
            'category',

            'productImages' => function ($query) {
                $query
                    ->with('media')
                    ->orderByDesc('is_primary')
                    ->orderBy('sort_order');
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
            ->orderByDesc('is_featured')
            ->latest()
            ->get();

        /*
        |--------------------------------------------------------------------------
        | DONNÉES PRODUITS POUR ALPINE.JS
        |--------------------------------------------------------------------------
        | On prépare les données côté PHP afin de fournir à Alpine.js
        | toutes les informations nécessaires au catalogue et
        | à la personnalisation des plats.
        |--------------------------------------------------------------------------
        */

        $productsData = $products->map(function ($product) {

            /*
            |--------------------------------------------------------------------------
            | IMAGE PRINCIPALE
            |--------------------------------------------------------------------------
            |
            | Les images FON-KPA sont stockées via le disque Laravel "public".
            |
            | Exemple :
            |
            | storage/app/public/images/products/mon-image.jpg
            |
            | On ne transmet donc PAS directement $media->path.
            | On génère l'URL publique avec Storage::disk()->url().
            |--------------------------------------------------------------------------
            */

            $image = null;

            $primaryImage = $product->productImages->first();

            if (
                $primaryImage &&
                $primaryImage->media &&
                $primaryImage->media->path
            ) {
                $media = $primaryImage->media;

                // On utilise le disque enregistré en base.
                // Si aucun disque n'est défini, "public" est utilisé.
                $disk = $media->disk ?: 'public';

                // On vérifie que le fichier existe réellement
                // avant de transmettre son URL au frontend.
                if (Storage::disk($disk)->exists($media->path)) {
                    $image = Storage::disk($disk)->url($media->path);
                }
            }

            /*
            |--------------------------------------------------------------------------
            | GROUPES D'OPTIONS
            |--------------------------------------------------------------------------
            |
            | Les options restent entièrement dynamiques.
            | Rien n'est codé en dur dans le frontend.
            |--------------------------------------------------------------------------
            */

            $optionGroups = $product->optionGroups
                ->map(function ($group) {

                    return [
                        'id' => $group->id,

                        'name' => $group->name,

                        'is_required' => (bool) $group->is_required,

                        'min_choices' => (int) $group->min_choices,

                        'max_choices' => (int) $group->max_choices,

                        'choices' => $group->optionChoices
                            ->map(function ($choice) {

                                return [
                                    'id' => $choice->id,

                                    'name' => $choice->name,

                                    'price_modifier' =>
                                        (float) $choice->price_modifier,

                                    'available' =>
                                        (bool) $choice->is_available,
                                ];
                            })
                            ->values(),
                    ];
                })
                ->values();

            /*
            |--------------------------------------------------------------------------
            | PRODUIT
            |--------------------------------------------------------------------------
            */

            return [
                'id' => $product->id,

                'name' => $product->name,

                'category' =>
                    $product->category?->slug ?? 'all',

                'price' =>
                    (float) $product->price,

                'available' =>
                    (bool) $product->is_available,

                'badge' =>
                    $product->is_featured
                        ? 'Populaire'
                        : '',

                /*
                |--------------------------------------------------------------------------
                | URL DE L'IMAGE
                |--------------------------------------------------------------------------
                |
                | Alpine.js reçoit maintenant une vraie URL exploitable
                | par <img :src="product.image">.
                |--------------------------------------------------------------------------
                */

                'image' => $image,

                'description' =>
                    $product->description ?? '',

                /*
                |--------------------------------------------------------------------------
                | OPTIONS DU PRODUIT
                |--------------------------------------------------------------------------
                */

                'option_groups' => $optionGroups,
            ];
        })->values();

        /*
        |--------------------------------------------------------------------------
        | DONNÉES CATÉGORIES POUR ALPINE.JS
        |--------------------------------------------------------------------------
        */

        $categoriesData = $categories
            ->map(function ($category) {

                return [
                    'id' => $category->id,

                    'name' => $category->name,

                    'slug' => $category->slug,

                    'products_count' =>
                        $category->products_count,
                ];
            })
            ->values();

        /*
        |--------------------------------------------------------------------------
        | VUE
        |--------------------------------------------------------------------------
        */

        return view('storefront.plats.index', [
            'products' => $products,

            'categories' => $categories,

            'productsData' => $productsData,

            'categoriesData' => $categoriesData,
        ]);
    }

    public function data()
{
    $categorySlugs = [
        'accompagnement',
        'boisson',
        'sauce',
        'grillade',
    ];

    $categories = Category::withCount('products')
        ->whereIn('slug', $categorySlugs)
        ->get()
        ->sortBy(function ($category) use ($categorySlugs) {
            return array_search(
                $category->slug,
                $categorySlugs
            );
        })
        ->values();

    $products = Product::with([
        'category',

        'productImages' => function ($query) {
            $query
                ->with('media')
                ->orderByDesc('is_primary')
                ->orderBy('sort_order');
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
        ->orderByDesc('is_featured')
        ->latest()
        ->get();

    $productsData = $products->map(function ($product) {

        $image = null;

        $primaryImage = $product->productImages->first();

        if (
            $primaryImage &&
            $primaryImage->media &&
            $primaryImage->media->path
        ) {
            $media = $primaryImage->media;

            $disk = $media->disk ?: 'public';

            if (\Illuminate\Support\Facades\Storage::disk($disk)->exists($media->path)) {
                $image = \Illuminate\Support\Facades\Storage::disk($disk)->url($media->path);
            }
        }

        $optionGroups = $product->optionGroups
            ->map(function ($group) {

                return [
                    'id' => $group->id,
                    'name' => $group->name,
                    'is_required' => (bool) $group->is_required,
                    'min_choices' => (int) $group->min_choices,
                    'max_choices' => (int) $group->max_choices,

                    'choices' => $group->optionChoices
                        ->map(function ($choice) {
                            return [
                                'id' => $choice->id,
                                'name' => $choice->name,
                                'price_modifier' => (float) $choice->price_modifier,
                                'available' => (bool) $choice->is_available,
                            ];
                        })
                        ->values(),
                ];
            })
            ->values();

        return [
            'id' => $product->id,
            'name' => $product->name,
            'category' => $product->category?->slug ?? 'all',
            'price' => (float) $product->price,
            'available' => (bool) $product->is_available,
            'badge' => $product->is_featured ? 'Populaire' : '',
            'image' => $image,
            'description' => $product->description ?? '',
            'option_groups' => $optionGroups,
        ];
    })->values();

    $categoriesData = $categories
        ->map(function ($category) {
            return [
                'id' => $category->id,
                'name' => $category->name,
                'slug' => $category->slug,
                'products_count' => $category->products_count,
            ];
        })
        ->values();

    return response()->json([
        'products' => $productsData,
        'categories' => $categoriesData,
    ]);
}
}