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
        Schema::create('soutenances', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('filiere_id')->nullable();
            $table->unsignedBigInteger('groupe_id')->nullable();
            $table->unsignedBigInteger('departement_id')->nullable();
            $table->unsignedBigInteger('module_id')->nullable(); // Add this line
            $table->timestamps();

            $table->foreign('filiere_id')->references('id')->on('filieres')->onDelete('set null');
            $table->foreign('module_id')->references('id')->on('modules')->onDelete('set null');
            $table->foreign('departement_id')->references('id')->on('departments')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soutenances');
    }
};
