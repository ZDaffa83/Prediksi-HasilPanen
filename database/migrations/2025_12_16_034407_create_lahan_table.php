<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('lahan', function (Blueprint $table) {
            $table->id('id_lahan'); // Primary Key BIGINT UNSIGNED
            $table->string('nama_lahan');
            $table->string('lokasi');
            $table->string('jenis_tanah');

            // Foreign Key ke tabel petani
            $table->unsignedBigInteger('id_petani');
            $table->foreign('id_petani')
                  ->references('id_petani')
                  ->on('petani')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lahan');
    }
};
