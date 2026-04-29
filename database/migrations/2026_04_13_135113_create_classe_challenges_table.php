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
        Schema::create('classe_challenges', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->date('date_inscription');
            // Les deux clés étrangères
            $table->foreignUuid('classe_id')->constrained('classes')->onDelete('cascade');
            $table->foreignUuid('challenge_id')->constrained('challenges')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classe_challenges');
    }
};
