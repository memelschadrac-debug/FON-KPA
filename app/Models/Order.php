<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    /**
     * Champs pouvant être remplis automatiquement.
     */
    protected $fillable = [
        'user_id',
        'order_number',
        'total',
        'status',
        'delivery_method',
        'city',
        'commune',
        'delivery_address',
        'phone',
    ];

    /**
     * Une commande appartient à un utilisateur.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Une commande contient plusieurs produits.
     */
    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}