<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Lahan extends Model
{
    protected $table = 'lahan';
    protected $primaryKey = 'id_lahan';

    protected $fillable = [
        'nama_lahan',
        'lokasi',
        'jenis_tanah',
        'id_petani', // Foreign Key
    ];

    // Relasi Many-to-One: Lahan dimiliki oleh satu Petani
    public function petani()
    {
        return $this->belongsTo(Petani::class, 'id_petani', 'id_petani');
    }

    // Relasi One-to-Many: Lahan memiliki banyak data Tanam
    public function tanam()
    {
        return $this->hasMany(Tanam::class, 'id_lahan', 'id_lahan');
    }

    // Relasi One-to-Many: Lahan memiliki banyak data Monitoring
    public function monitoringData()
    {
        return $this->hasMany(MonitoringData::class, 'id_lahan', 'id_lahan');
    }
}
