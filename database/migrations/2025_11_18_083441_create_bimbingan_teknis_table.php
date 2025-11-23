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
       Schema::create('bimbingan_teknis', function (Blueprint $table) {
        $table->id();
        $table->foreignId('petani_id')->constrained('petani')->onDelete('cascade');
        $table->string('judul');
        $table->text('materi');
        $table->date('tanggal');
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
