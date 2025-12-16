<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tanam', function (Blueprint $table) {
            $table->id('id_tanam'); // Primary Key BIGINT UNSIGNED
            $table->date('tanggal_tanam');
            $table->string('jenis_tanaman');
            $table->integer('jumlah_bibit');

            // Foreign Keys
            $table->unsignedBigInteger('id_lahan');
            $table->unsignedBigInteger('id_petani');

            $table->foreign('id_lahan')
                  ->references('id_lahan')
                  ->on('lahan')
                  ->onDelete('cascade');

            $table->foreign('id_petani')
                  ->references('id_petani')
                  ->on('petani')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tanam');
    }
};

