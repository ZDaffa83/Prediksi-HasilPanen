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
    Schema::create('monitoring_data', function (Blueprint $table) {
        $table->id();
        $table->foreignId('lahan_id')->constrained('lahan')->onDelete('cascade');
        $table->date('tanggal');
        $table->text('kondisi_tanaman')->nullable();
        $table->integer('hama')->default(0);
        $table->integer('penyakit')->default(0);
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
