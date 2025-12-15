<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerawatanHPT extends Model
{
    protected $table = 'perawatan_hpt';
    protected $primaryKey = 'id_perawatan';

    protected $fillable = [
        'tanggal_perawatan',
        'metode_perawatan',
        'penggunaan_bahan',
        'id_tanam',
    ];

    // Relasi Many-to-One: Perawatan HPT merujuk pada satu data Tanam
    public function tanam()
    {
        return $this->belongsTo(Tanam::class, 'id_tanam', 'id_tanam');
    }
}
