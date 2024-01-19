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
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->string('type_demande');
            $table->text('contenu_demande');
            $table->enum('etat_demande', ['en_attente', 'approuvé', 'rejeté'])->default('en_attente');
            $table->unsignedBigInteger('utilisateur_id');
            $table->timestamps();

            $table->foreign('utilisateur_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demandes');
    }
};
