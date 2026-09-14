<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Création de la table des commandes.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {

            // Identifiant de la commande
            $table->id();

            // Utilisateur qui passe la commande
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            // Numéro unique de la commande
            $table->string('order_number')->unique();

            // Montant total
            $table->decimal('total', 10, 2);

            // Statut de la commande
            $table->string('status')->default('pending');

            // Mode de livraison
            $table->string('delivery_method');

            // Ville de livraison
            $table->string('city');

            // Commune de livraison
            $table->string('commune');

            // Adresse précise de livraison
            $table->text('delivery_address');

            // Téléphone du client
            $table->string('phone');

            $table->timestamps();
        });
    }

    /**
     * Suppression de la table.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};