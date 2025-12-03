<?php

use Illuminate\Support\Facades\Route;

// Rute Default
Route::get('/', function () {
    return view('welcome');
});

// --- Rute Login Anda ---

// 1. Rute GET untuk menampilkan formulir login Anda (login.blade.php)
// Pastikan nama view() di sini sesuai dengan nama file Blade Anda (login)
Route::get('/login', function () {
    return view('login'); // <-- INI YANG MEMANGGIL login.blade.php Anda
})->name('login');

// 2. Rute POST untuk memproses pengiriman data dari formulir login
Route::post('/login', function () {
    // Logika otentikasi akan ditaruh di sini
    return redirect('/dashboard'); 
})->name('login.post'); 

// Rute sementara untuk demonstrasi redirect setelah login
Route::get('/dashboard', function () {
    return "Selamat datang di Dashboard!";
});