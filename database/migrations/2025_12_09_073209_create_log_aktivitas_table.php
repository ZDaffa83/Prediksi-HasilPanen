<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('log_aktivitas', function (Blueprint $table) {
            $table->id('id_log'); // PK
            $table->unsignedBigInteger('id_user'); // Bisa FK ke admin/petani
            $table->string('peran_user'); // (Misalnya: 'Admin' atau 'Petani')
            $table->string('aktivitas');
            $table->timestamp('waktu');
            
            // Catatan: Karena id_user bisa merujuk ke 'admin' atau 'petani', 
            // kita tidak membuat foreign key eksplisit di sini.
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_aktivitas');
    }
};
