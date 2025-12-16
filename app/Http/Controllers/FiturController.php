<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FiturController extends Controller
{
    // Fungsi untuk menampilkan halaman yang menggunakan layout SB Admin 2
    public function prediksiPanen()
    {
        return view('prediksi_panen'); 
    }

    public function perawatanHPT()
    {
        return view('perawatan_hpt'); 
    }

    // fitur lain comingsoon
}