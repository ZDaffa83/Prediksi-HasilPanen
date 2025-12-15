<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class LogAktivitas extends Model
{
    protected $table = 'log_aktivitas';
    protected $primaryKey = 'id_log';

    protected $fillable = [
        'id_user',
        'peran_user',
        'aktivitas',
        'waktu',
    ];

    // Catatan: Karena 'id_user' bisa merujuk ke Petani atau Admin,
    // kita tidak membuat relasi belongsTo secara eksplisit di sini (polimorfik).
    // Jika Anda ingin menggunakannya, Anda perlu implementasi Polymorphic Relationship.
}
