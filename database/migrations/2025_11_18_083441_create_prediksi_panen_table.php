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
        Schema::create('prediksi_panen', function (Blueprint $table) {
        $table->id();
        $table->foreignId('lahan_id')->constrained('lahan')->onDelete('cascade');
        $table->date('perkiraan_panen');
        $table->float('estimasi_kg');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prediksi_panen');
    }
};
