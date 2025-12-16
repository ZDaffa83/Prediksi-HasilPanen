<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class BimbinganTeknis extends Model
{
    protected $table = 'bimbingan_teknis';
    protected $primaryKey = 'UniqueId';

    protected $fillable = [
        'topik',
        'tanggal',
        'instruktur',
        'id_petani',
    ];

    // Relasi Many-to-One: Bimbingan Teknis ditujukan kepada satu Petani
    public function petani()
    {
        return $this->belongsTo(Petani::class, 'id_petani', 'id_petani');
    }

    // Relasi One-to-Many: Bimbingan Teknis memiliki banyak Materi
    public function materi()
    {
        return $this->hasMany(Materi::class, 'id_bimbingan', 'UniqueId');
    }
}
