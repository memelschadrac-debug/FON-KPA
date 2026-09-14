<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OptionGroup;
use App\Models\Product;
use Illuminate\Http\Request;

class OptionGroupController extends Controller
{
    /**
     * Afficher la liste des groupes d'options.
     */
    public function index()
    {
        $optionGroups = OptionGroup::with('product')
            ->withCount('optionChoices')
            ->orderBy('sort_order')
            ->latest()
            ->paginate(15);

        return view('admin.option-groups.index', compact('optionGroups'));
    }

    /**
     * Afficher le formulaire de création.
     */
    public function create()
    {
        $products = Product::orderBy('name')->get();

        return view('admin.option-groups.create', compact('products'));
    }

    /**
     * Enregistrer un nouveau groupe.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => [
                'required',
                'exists:products,id',
            ],
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'is_required' => [
                'boolean',
            ],
            'min_choices' => [
                'required',
                'integer',
                'min:0',
            ],
            'max_choices' => [
                'required',
                'integer',
                'min:0',
                'gte:min_choices',
            ],
            'sort_order' => [
                'required',
                'integer',
                'min:0',
            ],
        ]);

        $validated['is_required'] = $request->boolean('is_required');

        OptionGroup::create($validated);

        return redirect()
            ->route('admin.option-groups.index')
            ->with('success', 'Groupe d’options créé avec succès.');
    }

    /**
     * Afficher les détails d'un groupe.
     */
    public function show(OptionGroup $optionGroup)
    {
        $optionGroup->load([
            'product',
            'optionChoices' => function ($query) {
                $query->orderBy('sort_order');
            },
        ]);

        return view('admin.option-groups.show', compact('optionGroup'));
    }

    /**
     * Afficher le formulaire de modification.
     */
    public function edit(OptionGroup $optionGroup)
    {
        $products = Product::orderBy('name')->get();

        return view('admin.option-groups.edit', compact(
            'optionGroup',
            'products'
        ));
    }

    /**
     * Modifier un groupe existant.
     */
    public function update(Request $request, OptionGroup $optionGroup)
    {
        $validated = $request->validate([
            'product_id' => [
                'required',
                'exists:products,id',
            ],
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'is_required' => [
                'boolean',
            ],
            'min_choices' => [
                'required',
                'integer',
                'min:0',
            ],
            'max_choices' => [
                'required',
                'integer',
                'min:0',
                'gte:min_choices',
            ],
            'sort_order' => [
                'required',
                'integer',
                'min:0',
            ],
        ]);

        $validated['is_required'] = $request->boolean('is_required');

        $optionGroup->update($validated);

        return redirect()
            ->route('admin.option-groups.show', $optionGroup)
            ->with('success', 'Groupe d’options modifié avec succès.');
    }

    /**
     * Supprimer un groupe.
     */
    public function destroy(OptionGroup $optionGroup)
    {
        // Les choix appartiennent au groupe.
        // On les supprime avant le groupe pour éviter
        // une erreur de contrainte de clé étrangère.
        $optionGroup->optionChoices()->delete();

        $optionGroup->delete();

        return redirect()
            ->route('admin.option-groups.index')
            ->with('success', 'Groupe d’options supprimé avec succès.');
    }
}