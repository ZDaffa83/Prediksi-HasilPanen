<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Panelcontroller extends Controller
{
    public function index()
    {

        return view('admin.index');
    }
    public function manajemenPetani()
    {
        return view('admin.manajemen_petani');
    }

    public function manajemenLahan()
    {
        return view('admin.manajemen_lahan');
    }
    
    public function logAktivitas()
    {
        return view('admin.log_aktivitas');
    }
}
