<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tanam extends Model
{
    protected $table = 'tanam';
    protected $primaryKey = 'id_tanam';

    protected $fillable = [
        'tanggal_tanam',
        'jenis_tanaman',
        'jumlah_bibit',
        'id_lahan',
        'id_petani',
    ];

    // Relasi Many-to-One: Data Tanam milik satu Petani
    public function petani()
    {
        return $this->belongsTo(Petani::class, 'id_petani', 'id_petani');
    }

    // Relasi Many-to-One: Data Tanam dilakukan di satu Lahan
    public function lahan()
    {
        return $this->belongsTo(Lahan::class, 'id_lahan', 'id_lahan');
    }

    // Relasi One-to-Many: Tanam memiliki banyak Perawatan HPT
    public function perawatanHPT()
    {
        return $this->hasMany(PerawatanHPT::class, 'id_tanam', 'id_tanam');
    }

    // Relasi One-to-Many: Tanam memiliki banyak data Monitoring
    public function monitoringData()
    {
        return $this->hasMany(MonitoringData::class, 'id_tanam', 'id_tanam');
    }

    // Relasi One-to-Many: Tanam memiliki banyak Prediksi Panen
    public function prediksiPanen()
    {
        return $this->hasMany(PrediksiPanen::class, 'id_tanam', 'id_tanam');
    }
}
