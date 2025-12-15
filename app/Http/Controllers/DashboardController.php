<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Data dummy untuk ditampilkan di dashboard
        $data = [
            'suhu' => '29°C',
            'kelembapan' => '78%',
            'angin' => '8 Km/h',
        ];

        return view('dashboard', $data);
    }
}