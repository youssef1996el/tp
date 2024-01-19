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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
$table->unsignedBigInteger('groupe_id');
$table->string('day');
$table->timestamp('date_debut')->default(now()); // Set default value to current timestamp
$table->timestamp('date_fin')->default(now()); // Set default value to current timestamp
$table->unsignedBigInteger('room_id');
$table->string('nom_activite');
$table->timestamps();

$table->foreign('groupe_id')->references('id')->on('groups')->onDelete('cascade');
$table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
