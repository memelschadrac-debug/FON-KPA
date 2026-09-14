<?php

namespace App\Http\Controllers\Storefront;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
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
        | - leur catégorie
        | - leurs images
        | - leur média associé
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
        ])
            ->orderByDesc('is_featured')
            ->latest()
            ->get();


        /*
        |--------------------------------------------------------------------------
        | DONNÉES PRODUITS POUR ALPINE.JS
        |--------------------------------------------------------------------------
        | On prépare les données côté PHP afin d'éviter
        | les traitements complexes directement dans Blade.
        |--------------------------------------------------------------------------
        */

        $productsData = $products->map(function ($product) {

            $image = null;

            $primaryImage = $product->productImages->first();

            if ($primaryImage && $primaryImage->media) {
                $image = $primaryImage->media->path;
            }

            return [
                'id' => $product->id,
                'name' => $product->name,

                'category' => $product->category?->slug ?? 'all',

                'price' => (float) $product->price,

                'available' => (bool) $product->is_available,

                'badge' => $product->is_featured
                    ? 'Populaire'
                    : '',

                'image' => $image,

                'description' => $product->description ?? '',
            ];
        })->values();


        /*
        |--------------------------------------------------------------------------
        | DONNÉES CATÉGORIES POUR ALPINE.JS
        |--------------------------------------------------------------------------
        */

        $categoriesData = $categories->map(function ($category) {

            return [
                'id' => $category->id,
                'name' => $category->name,
                'slug' => $category->slug,
                'products_count' => $category->products_count,
            ];

        })->values();


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
}