<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class MonitoringData extends Model
{
    protected $table = 'monitoring_data';
    protected $primaryKey = 'id_monitoring';

    protected $fillable = [
        'tanggal_monitoring',
        'suhu',
        'kelembapan',
        'status_tanaman',
        'id_lahan',
        'id_tanam',
    ];

    // Relasi Many-to-One: Monitoring Data terkait dengan satu Lahan
    public function lahan()
    {
        return $this->belongsTo(Lahan::class, 'id_lahan', 'id_lahan');
    }

    // Relasi Many-to-One: Monitoring Data terkait dengan satu Tanam
    public function tanam()
    {
        return $this->belongsTo(Tanam::class, 'id_tanam', 'id_tanam');
    }

    // Relasi One-to-One: Monitoring Data memiliki satu Prediksi Panen
    public function prediksiPanen()
    {
        return $this->hasOne(PrediksiPanen::class, 'id_monitoring', 'id_monitoring');
    }
}
