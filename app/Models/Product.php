<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    // Champs que Laravel autorise lors du remplissage automatique du modèle.
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'price',
        'preparation_time',
        'status',
        'is_available',
        'is_featured',
    ];

    // Convertit automatiquement certaines valeurs dans le type approprié.
    protected $casts = [
        'price' => 'decimal:2',
        'is_available' => 'boolean',
        'is_featured' => 'boolean',
    ];

    // Un produit appartient à une seule catégorie.
    // Exemple : le "Garba" appartient à la catégorie "Plats ivoiriens".
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // Un produit peut avoir plusieurs images.
    public function productImages(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    // Alias utilisé notamment pour charger facilement les images
    // avec leur média : product -> images -> media.
    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    // Un produit peut avoir plusieurs groupes d'options.
    // Exemple : "Accompagnement", "Suppléments", "Boisson".
    public function optionGroups(): HasMany
    {
        return $this->hasMany(OptionGroup::class);
    }
}