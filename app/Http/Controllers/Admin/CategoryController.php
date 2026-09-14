<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Affiche la liste des catégories.
     */
    public function index()
    {
        $categories = Category::latest()->get();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Affiche le formulaire de création.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Enregistre une nouvelle catégorie.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],

            'slug' => [
                'required',
                'string',
                'max:255',
                'unique:categories,slug',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | ENREGISTREMENT DE L'IMAGE
        |--------------------------------------------------------------------------
        |
        | Les images sont enregistrées directement dans :
        | public/images/categories
        |
        | Le chemin enregistré en base sera par exemple :
        | images/categories/uuid.jpg
        |
        */

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();

            $file->move(
                public_path('images/categories'),
                $filename
            );

            $validated['image'] = 'images/categories/' . $filename;
        }

        Category::create($validated);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Catégorie créée avec succès.');
    }

    /**
     * Affiche le formulaire de modification.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Met à jour une catégorie.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'slug' => [
                'required',
                'string',
                'max:255',
                'unique:categories,slug,' . $category->id,
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | REMPLACEMENT DE L'IMAGE
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {

            /*
            | Supprime l'ancienne image uniquement si elle appartient
            | à notre dossier public/images/categories.
            */
            if (
                $category->image &&
                str_starts_with($category->image, 'images/categories/')
            ) {
                $oldImage = public_path($category->image);

                if (is_file($oldImage)) {
                    unlink($oldImage);
                }
            }

            /*
            | Enregistre la nouvelle image directement dans :
            | public/images/categories
            */
            $file = $request->file('image');

            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();

            $file->move(
                public_path('images/categories'),
                $filename
            );

            $validated['image'] = 'images/categories/' . $filename;
        }

        /*
        | Si aucune nouvelle image n'est envoyée,
        | l'ancienne valeur de image reste inchangée.
        */
        $category->update($validated);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Catégorie modifiée avec succès.');
    }

    /**
     * Supprime une catégorie.
     */
    public function destroy(Category $category)
    {
        /*
        |--------------------------------------------------------------------------
        | SUPPRESSION DE L'IMAGE
        |--------------------------------------------------------------------------
        */

        if (
            $category->image &&
            str_starts_with($category->image, 'images/categories/')
        ) {
            $imagePath = public_path($category->image);

            if (is_file($imagePath)) {
                unlink($imagePath);
            }
        }

        $category->delete();

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Catégorie supprimée avec succès.');
    }
}