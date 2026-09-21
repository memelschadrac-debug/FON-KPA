<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Création des options associées aux lignes de commande.
     */
    public function up(): void
    {
        Schema::create('order_item_options', function (Blueprint $table) {

            $table->id();

            // Ligne de commande concernée
            $table->foreignId('order_item_id')
                ->constrained()
                ->cascadeOnDelete();

            // Références vers les options originales
            // nullable pour préserver l'historique
            // même si l'option est supprimée plus tard.
            $table->foreignId('option_group_id')
                ->nullable()
                ->constrained('option_groups')
                ->nullOnDelete();

            $table->foreignId('option_choice_id')
                ->nullable()
                ->constrained('option_choices')
                ->nullOnDelete();

            // Snapshot historique
            $table->string('group_name');

            $table->string('choice_name');

            $table->decimal('price_modifier', 10, 2)
                ->default(0);

            $table->timestamps();
        });
    }

    /**
     * Suppression de la table.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_item_options');
    }
};