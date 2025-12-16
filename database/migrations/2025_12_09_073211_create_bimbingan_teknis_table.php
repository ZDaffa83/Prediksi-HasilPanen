<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bimbingan_teknis', function (Blueprint $table) {
            $table->id('UniqueId'); // PK
            $table->string('topik');
            $table->date('tanggal');
            $table->string('instruktur');
            
            // FK
            $table->unsignedBigInteger('id_petani');
            $table->foreign('id_petani')->references('id_petani')->on('petani')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bimbingan_teknis');
    }
};
