<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OptionChoice;
use App\Models\OptionGroup;
use Illuminate\Http\Request;

class OptionChoiceController extends Controller
{
    /**
     * Afficher la liste des choix.
     */
    public function index()
    {
        $optionChoices = OptionChoice::with([
            'optionGroup.product',
        ])
            ->orderBy('sort_order')
            ->latest()
            ->paginate(20);

        return view(
            'admin.option-choices.index',
            compact('optionChoices')
        );
    }

    /**
     * Afficher le formulaire de création.
     */
    public function create()
    {
        $optionGroups = OptionGroup::with('product')
            ->orderBy('sort_order')
            ->get();

        return view(
            'admin.option-choices.create',
            compact('optionGroups')
        );
    }

    /**
     * Enregistrer un nouveau choix.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'option_group_id' => [
                'required',
                'exists:option_groups,id',
            ],
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'price_modifier' => [
                'required',
                'numeric',
                'min:0',
            ],
            'is_available' => [
                'boolean',
            ],
            'sort_order' => [
                'required',
                'integer',
                'min:0',
            ],
        ]);

        $validated['is_available'] = $request->boolean('is_available');

        OptionChoice::create($validated);

        return redirect()
            ->route('admin.option-choices.index')
            ->with(
                'success',
                'Choix d’option créé avec succès.'
            );
    }

    /**
     * Afficher les détails d'un choix.
     */
    public function show(OptionChoice $optionChoice)
    {
        $optionChoice->load([
            'optionGroup.product',
        ]);

        return view(
            'admin.option-choices.show',
            compact('optionChoice')
        );
    }

    /**
     * Afficher le formulaire de modification.
     */
    public function edit(OptionChoice $optionChoice)
    {
        $optionGroups = OptionGroup::with('product')
            ->orderBy('sort_order')
            ->get();

        return view(
            'admin.option-choices.edit',
            compact(
                'optionChoice',
                'optionGroups'
            )
        );
    }

    /**
     * Modifier un choix existant.
     */
    public function update(
        Request $request,
        OptionChoice $optionChoice
    ) {
        $validated = $request->validate([
            'option_group_id' => [
                'required',
                'exists:option_groups,id',
            ],
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'price_modifier' => [
                'required',
                'numeric',
                'min:0',
            ],
            'is_available' => [
                'boolean',
            ],
            'sort_order' => [
                'required',
                'integer',
                'min:0',
            ],
        ]);

        $validated['is_available'] = $request->boolean(
            'is_available'
        );

        $optionChoice->update($validated);

        return redirect()
            ->route(
                'admin.option-choices.show',
                $optionChoice
            )
            ->with(
                'success',
                'Choix d’option modifié avec succès.'
            );
    }

    /**
     * Supprimer un choix.
     */
    public function destroy(OptionChoice $optionChoice)
    {
        $optionChoice->delete();

        return redirect()
            ->route('admin.option-choices.index')
            ->with(
                'success',
                'Choix d’option supprimé avec succès.'
            );
    }
}