<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OptionChoice extends Model
{
    // Champs autorisés lors du remplissage automatique du modèle.
    protected $fillable = [
        'option_group_id',
        'name',
        'price_modifier',
        'is_available',
        'sort_order',
    ];

    // Convertit automatiquement les valeurs dans les bons types.
    protected $casts = [
        'price_modifier' => 'decimal:2',
        'is_available' => 'boolean',
    ];

    // Un choix appartient à un seul groupe d'options.
    // Exemple : "Attiéké" appartient au groupe "Accompagnements".
    public function optionGroup(): BelongsTo
    {
        return $this->belongsTo(OptionGroup::class);
    }
}