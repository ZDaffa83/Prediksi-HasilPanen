<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('perawatan_hpt', function (Blueprint $table) {
            $table->id('id_perawatan'); // PK
            $table->date('tanggal_perawatan');
            $table->string('metode_perawatan');
            $table->string('penggunaan_bahan');
            
            // FK
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
        Schema::dropIfExists('perawatan_hpts');
    }
};
