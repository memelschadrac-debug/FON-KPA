<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Media extends Model
{
    // Champs autorisés lors du remplissage automatique du modèle.
    protected $fillable = [
        'disk',
        'path',
        'filename',
        'mime_type',
        'size',
        'width',
        'height',
        'alt',
        'caption',
    ];

    // Un fichier média peut être utilisé par plusieurs images de produits.
    public function productImages(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }
}