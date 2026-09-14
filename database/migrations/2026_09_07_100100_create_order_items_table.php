<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Crée la table contenant les produits de chaque commande.
     */
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {

            // Identifiant unique de la ligne
            $table->id();

            // Commande à laquelle appartient cette ligne
            $table->foreignId('order_id')
                ->constrained()
                ->cascadeOnDelete();

            // Produit commandé
            $table->foreignId('product_id')
                ->constrained()
                ->restrictOnDelete();

            // Quantité commandée
            $table->unsignedInteger('quantity');

            // Prix unitaire au moment de la commande
            $table->decimal('unit_price', 10, 2);

            // Total de cette ligne
            $table->decimal('subtotal', 10, 2);

            $table->timestamps();
        });
    }

    /**
     * Supprime la table des produits commandés.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};