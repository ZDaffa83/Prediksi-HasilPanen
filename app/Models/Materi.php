<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Materi extends Model
{
    protected $table = 'materi';
    protected $primaryKey = 'id_materi';

    protected $fillable = [
        'nama_materi',
        'tipe',
        'deskripsi',
        'id_bimbingan',
    ];

    // Relasi Many-to-One: Materi merujuk pada satu Bimbingan Teknis
    public function bimbinganTeknis()
    {
        return $this->belongsTo(BimbinganTeknis::class, 'id_bimbingan', 'UniqueId');
    }
}
