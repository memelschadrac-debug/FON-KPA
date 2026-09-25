<?php

namespace App\Http\Controllers\Storefront;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DishesController extends Controller
{
    /**
     * =========================================================================
     * PAGE : NOS PLATS
     * =========================================================================
     *
     * Charge les données initiales nécessaires au rendu de la page.
     *
     * Les mêmes données pourront ensuite être actualisées via l'endpoint
     * data() appelé par Alpine.js.
     */
    public function index(Request $request): View
{
    $catalog = $this->getCatalogData();

    /*
    |--------------------------------------------------------------------------
    | CATÉGORIE DEMANDÉE DANS L'URL
    |--------------------------------------------------------------------------
    |
    | Exemple :
    | /plats?category=grillades
    |
    | On récupère uniquement le slug.
    |
    */

    $selectedCategorySlug = $request->query('category');

    /*
    |--------------------------------------------------------------------------
    | VALIDATION DU SLUG
    |--------------------------------------------------------------------------
    |
    | Si quelqu'un met une catégorie inexistante dans l'URL,
    | on ne transmet pas une valeur invalide à Alpine.
    |
    */

    $validCategorySlugs = $catalog['categories']
        ->pluck('slug')
        ->filter()
        ->values();

    if (
        $selectedCategorySlug &&
        !$validCategorySlugs->contains($selectedCategorySlug)
    ) {
        $selectedCategorySlug = null;
    }

    return view('storefront.plats.index', [
        'products' => $catalog['products'],
        'categories' => $catalog['categories'],
        'productsData' => $catalog['productsData'],
        'categoriesData' => $catalog['categoriesData'],

        /*
        |--------------------------------------------------------------------------
        | FILTRE INITIAL
        |--------------------------------------------------------------------------
        */

        'selectedCategorySlug' => $selectedCategorySlug,
    ]);
}

    /**
     * =========================================================================
     * API : DONNÉES DU CATALOGUE
     * =========================================================================
     *
     * Cet endpoint est utilisé par Alpine.js pour actualiser le catalogue
     * sans recharger toute la page.
     *
     * Exemple :
     *
     * GET /plats/data
     */
    public function data(): JsonResponse
    {
        $catalog = $this->getCatalogData();

        return response()->json([
            'success' => true,
            'products' => $catalog['productsData'],
            'categories' => $catalog['categoriesData'],
        ]);
    }

    /**
     * =========================================================================
     * SOURCE UNIQUE DU CATALOGUE
     * =========================================================================
     *
     * Centralise toute la logique utilisée par :
     *
     * - index()
     * - data()
     *
     * Cela évite d'avoir deux versions différentes du catalogue.
     */
    private function getCatalogData(): array
    {
        /*
        |--------------------------------------------------------------------------
        | CATÉGORIES
        |--------------------------------------------------------------------------
        |
        | L'ordre est piloté par la colonne sort_order de la table categories.
        |
        | Aucune catégorie n'est codée en dur ici.
        |
        | Une nouvelle catégorie créée depuis l'administration sera donc
        | automatiquement récupérée par le storefront.
        |
        */

        $categories = Category::query()
            ->withCount('products')
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | PRODUITS
        |--------------------------------------------------------------------------
        |
        | On charge toutes les relations nécessaires au storefront afin
        | d'éviter les problèmes N+1.
        |
        */

        $products = Product::query()
            ->with([
                /*
                |--------------------------------------------------------------------------
                | CATÉGORIE
                |--------------------------------------------------------------------------
                */

                'category',

                /*
                |--------------------------------------------------------------------------
                | IMAGES
                |--------------------------------------------------------------------------
                |
                | L'image principale est placée en premier.
                | Ensuite on respecte sort_order.
                |
                */

                'productImages' => function ($query) {
                    $query
                        ->with('media')
                        ->orderByDesc('is_primary')
                        ->orderBy('sort_order');
                },

                /*
                |--------------------------------------------------------------------------
                | GROUPES D'OPTIONS
                |--------------------------------------------------------------------------
                */

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

            /*
            |--------------------------------------------------------------------------
            | ORDRE DU CATALOGUE
            |--------------------------------------------------------------------------
            |
            | Les produits mis en avant apparaissent avant les autres.
            | Ensuite les plus récents.
            |
            */

            ->orderByDesc('is_featured')
            ->latest()
            ->get();

        /*
        |--------------------------------------------------------------------------
        | TRANSFORMATION POUR ALPINE.JS
        |--------------------------------------------------------------------------
        */

        $productsData = $products
            ->map(function (Product $product) {

                /*
                |--------------------------------------------------------------------------
                | IMAGE
                |--------------------------------------------------------------------------
                */

                $imageUrl = null;

                $productImage = $product->productImages->first();

                if ($productImage && $productImage->media) {

                    $media = $productImage->media;

                    $disk = $media->disk ?: 'public';

                    /*
                    |--------------------------------------------------------------------------
                    | Vérification de l'existence réelle du fichier
                    |--------------------------------------------------------------------------
                    |
                    | Cela évite d'envoyer une URL vers une image supprimée ou
                    | inexistante.
                    |
                    */

                    if (
                        $media->path &&
                        Storage::disk($disk)->exists($media->path)
                    ) {
                        $imageUrl = Storage::disk($disk)
                            ->url($media->path);
                    }
                }

                /*
                |--------------------------------------------------------------------------
                | GROUPES D'OPTIONS
                |--------------------------------------------------------------------------
                */

                $optionGroups = $product->optionGroups
                    ->map(function ($group) {

                        return [
                            'id' => (int) $group->id,

                            'name' => $group->name,

                            'is_required' => (bool) $group->is_required,

                            'min_choices' => (int) $group->min_choices,

                            'max_choices' => (int) $group->max_choices,

                            'choices' => $group->optionChoices
                                ->map(function ($choice) {

                                    return [
                                        'id' => (int) $choice->id,

                                        'name' => $choice->name,

                                        'price_modifier' => (float) $choice->price_modifier,

                                        /*
                                        |--------------------------------------------------------------------------
                                        | DISPONIBILITÉ DU CHOIX
                                        |--------------------------------------------------------------------------
                                        |
                                        | La colonne réelle de OptionChoice est
                                        | "is_available".
                                        |
                                        | On expose volontairement "available"
                                        | au frontend afin de conserver le
                                        | contrat attendu par Alpine.js.
                                        |
                                        */

                                        'available' => (bool) $choice->is_available,
                                    ];
                                })
                                ->values()
                                ->all(),
                        ];
                    })
                    ->values()
                    ->all();

                /*
                |--------------------------------------------------------------------------
                | BADGE
                |--------------------------------------------------------------------------
                */

                $badge = $product->is_featured
                    ? 'Populaire'
                    : null;

                /*
                |--------------------------------------------------------------------------
                | DONNÉES ALPINE
                |--------------------------------------------------------------------------
                */

                return [

                    /*
                    |--------------------------------------------------------------------------
                    | IDENTIFIANT
                    |--------------------------------------------------------------------------
                    */

                    'id' => (int) $product->id,

                    /*
                    |--------------------------------------------------------------------------
                    | NOM
                    |--------------------------------------------------------------------------
                    */

                    'name' => $product->name,

                    /*
                    |--------------------------------------------------------------------------
                    | CATÉGORIE
                    |--------------------------------------------------------------------------
                    |
                    | La Blade filtre avec :
                    |
                    | product.category === category
                    |
                    | On envoie donc le slug.
                    |
                    */

                    'category' => $product->category?->slug,

                    /*
                    |--------------------------------------------------------------------------
                    | PRIX
                    |--------------------------------------------------------------------------
                    */

                    'price' => (float) $product->price,

                    /*
                    |--------------------------------------------------------------------------
                    | DISPONIBILITÉ DU PRODUIT
                    |--------------------------------------------------------------------------
                    */

                    'available' => (bool) $product->is_available,

                    /*
                    |--------------------------------------------------------------------------
                    | BADGE
                    |--------------------------------------------------------------------------
                    */

                    'badge' => $badge,

                    /*
                    |--------------------------------------------------------------------------
                    | IMAGE
                    |--------------------------------------------------------------------------
                    */

                    'image' => $imageUrl,

                    /*
                    |--------------------------------------------------------------------------
                    | DESCRIPTION
                    |--------------------------------------------------------------------------
                    */

                    'description' => $product->description,

                    /*
                    |--------------------------------------------------------------------------
                    | OPTIONS
                    |--------------------------------------------------------------------------
                    */

                    'option_groups' => $optionGroups,
                ];
            })
            ->values()
            ->all();

        /*
        |--------------------------------------------------------------------------
        | DONNÉES DES CATÉGORIES POUR ALPINE.JS
        |--------------------------------------------------------------------------
        |
        | La Blade attend :
        |
        | - item.id
        | - item.name
        | - item.slug
        | - item.products_count
        |
        */

        $categoriesData = $categories
            ->map(function (Category $category) {

                return [
                    'id' => (int) $category->id,

                    'name' => $category->name,

                    'slug' => $category->slug,

                    'products_count' => (int) $category->products_count,
                ];
            })
            ->values()
            ->all();

        /*
        |--------------------------------------------------------------------------
        | RETOUR
        |--------------------------------------------------------------------------
        */

        return [
            'products' => $products,

            'categories' => $categories,

            'productsData' => $productsData,

            'categoriesData' => $categoriesData,
        ];
    }
}