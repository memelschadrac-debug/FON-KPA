<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductImage extends Model
{
    // Champs que Laravel autorise lors du remplissage automatique.
    protected $fillable = [
        'product_id',
        'media_id',
        'sort_order',
        'is_primary',
        'alt',
    ];

    // Convertit automatiquement is_primary en true/false.
    protected $casts = [
        'is_primary' => 'boolean',
    ];

    // Une image appartient à un seul produit.
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    // Une image utilise un fichier provenant de la médiathèque.
    public function media(): BelongsTo
    {
        return $this->belongsTo(Media::class);
    }
}
