<?php

namespace App\Http\Controllers\Storefront;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Affiche les catégories disponibles sur le storefront.
     */
    public function index(): View
    {
        $categories = Category::query()
            ->where('is_active', true)
            ->withCount('products')
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | PRÉPARATION DES IMAGES DE CATÉGORIES
        |--------------------------------------------------------------------------
        |
        | L'image d'une catégorie est directement stockée dans :
        |
        | categories.image
        |
        | Exemple :
        | images/categories/garba-xxxxx.jpg
        |
        | Comme ces fichiers sont placés directement dans public/,
        | asset() permet de générer leur URL publique.
        |
        */

        $categories->each(function (Category $category) {
            $category->storefront_image = $category->image
                ? asset($category->image)
                : null;
        });

        return view(
            'storefront.categories.index',
            compact('categories')
        );
    }
}