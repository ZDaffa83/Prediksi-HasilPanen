<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('materi', function (Blueprint $table) {
            $table->id('id_materi'); // PK
            $table->string('nama_materi');
            $table->string('tipe'); // (Misalnya: PDF, Video, Teks)
            $table->text('deskripsi');
            
            // FK
            $table->unsignedBigInteger('id_bimbingan');
            $table->foreign('id_bimbingan')->references('UniqueId')->on('bimbingan_teknis')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materi');
    }
};
