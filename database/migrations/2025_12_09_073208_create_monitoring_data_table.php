<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('monitoring_data', function (Blueprint $table) {
            $table->id('id_monitoring'); // PK
            $table->timestamp('tanggal_monitoring');
            $table->decimal('suhu', 8, 2);
            $table->decimal('kelembapan', 8, 2);
            $table->string('status_tanaman');
            
            // FK
            $table->unsignedBigInteger('id_lahan');
            $table->foreign('id_lahan')->references('id_lahan')->on('lahan')->onDelete('cascade');

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
        Schema::dropIfExists('monitoring_data');
    }
};
