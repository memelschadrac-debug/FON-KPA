<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItemOption extends Model
{
    /**
     * Champs pouvant être remplis automatiquement.
     */
    protected $fillable = [
        'order_item_id',
        'option_group_id',
        'option_choice_id',
        'group_name',
        'choice_name',
        'price_modifier',
    ];

    /**
     * Conversion des types.
     */
    protected $casts = [
        'price_modifier' => 'decimal:2',
    ];

    /**
     * Cette option appartient à une ligne de commande.
     */
    public function orderItem(): BelongsTo
    {
        return $this->belongsTo(
            OrderItem::class,
            'order_item_id'
        );
    }

    /**
     * Groupe d'options d'origine.
     *
     * Cette relation permet de retrouver le groupe
     * actuellement présent dans le catalogue.
     */
    public function optionGroup(): BelongsTo
    {
        return $this->belongsTo(
            OptionGroup::class,
            'option_group_id'
        );
    }

    /**
     * Choix d'option d'origine.
     *
     * Cette relation permet de retrouver le choix
     * actuellement présent dans le catalogue.
     */
    public function optionChoice(): BelongsTo
    {
        return $this->belongsTo(
            OptionChoice::class,
            'option_choice_id'
        );
    }
}
