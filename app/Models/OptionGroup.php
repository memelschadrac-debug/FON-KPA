<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OptionGroup extends Model
{
    // Champs autorisés lors du remplissage automatique du modèle.
    protected $fillable = [
        'product_id',
        'name',
        'is_required',
        'min_choices',
        'max_choices',
        'sort_order',
    ];

    // Convertit automatiquement ces valeurs dans les bons types.
    protected $casts = [
        'is_required' => 'boolean',
    ];

    // Un groupe d'options appartient à un seul produit.
    // Exemple : "Accompagnements" appartient au "Poulet braisé".
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    // Un groupe d'options possède plusieurs choix.
    // Exemple : Accompagnements → Attiéké, Alloco, Riz.
    public function optionChoices(): HasMany
    {
        return $this->hasMany(OptionChoice::class);
    }
}