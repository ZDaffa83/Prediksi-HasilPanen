<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Petani extends Model
{
    protected $table = 'petani';
    protected $primaryKey = 'id_petani';

    protected $fillable = [
        'nama_petani',
        'alamat',
        'no_hp',
        'username',
        'password',
    ];

    // Relasi One-to-Many: Petani memiliki banyak Lahan
    public function lahan()
    {
        return $this->hasMany(Lahan::class, 'id_petani', 'id_petani');
    }

    // Relasi One-to-Many: Petani memiliki banyak data Tanam
    public function tanam()
    {
        return $this->hasMany(Tanam::class, 'id_petani', 'id_petani');
    }

    // Relasi One-to-Many: Petani memiliki banyak Bimbingan Teknis
    public function bimbinganTeknis()
    {
        return $this->hasMany(BimbinganTeknis::class, 'id_petani', 'id_petani');
    }
}
