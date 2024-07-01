<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('approvisionnements', function (Blueprint $table) {
            $table->id();
            $table->string('nomAppro',50);
            $table->string('produit',50);
            $table->string('fournisseur',50);
            $table->integer('quantite');
            $table->integer('quantiteRestante');
            $table->date('datePeremption')->nullable();
            $table->unsignedBigInteger('produit_id');
            $table->foreign('produit_id')->references('id')->on('produits')->cascadeOnDelete();
            $table->unsignedBigInteger('fournisseur_id');
            $table->foreign('fournisseur_id')->references('id')->on('fournisseurs')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approvisionnements');
    }
};
