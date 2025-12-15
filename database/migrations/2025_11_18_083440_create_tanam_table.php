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
        Schema::create('tanam', function (Blueprint $table) {
        $table->id();
        $table->foreignId('lahan_id')->constrained('lahan')->onDelete('cascade');
        $table->string('komoditas');
        $table->date('tanggal_tanam');
        $table->integer('jumlah_bibit')->nullable();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tanam');
    }
};
