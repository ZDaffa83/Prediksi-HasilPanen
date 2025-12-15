<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prediksi_panen', function (Blueprint $table) {
            $table->id('id_prediksi'); // PK
            $table->string('hasil_prediksi');
            $table->decimal('tingkat_kepercayaan', 5, 2); // Contoh: 95.50
            $table->timestamp('tanggal_prediksi');
            
            // FK
            $table->unsignedBigInteger('id_monitoring');
            $table->foreign('id_monitoring')->references('id_monitoring')->on('monitoring_data')->onDelete('cascade');

            $table->unsignedBigInteger('id_tanam');
            $table->foreign('id_tanam')->references('id_tanam')->on('tanam')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prediksi_panens');
    }
};
