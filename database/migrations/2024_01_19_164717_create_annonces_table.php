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
        Schema::create('annonces', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('contenu');
            $table->unsignedBigInteger('utilisateur_id');
            $table->unsignedBigInteger('filiere_id')->nullable();
            $table->unsignedBigInteger('module_id')->nullable(); // Ajoutez cette colonne si chaque annonce est liée à un module
            $table->timestamps();

            // Clés étrangères
            $table->foreign('utilisateur_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('filiere_id')->references('id')->on('filieres')->onDelete('set null');
            $table->foreign('module_id')->references('id')->on('modules')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annonces');
    }
};
