<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;

// Rute Default
Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login'); 
})->name('login');


Route::post('/login', function (Request $request) {
    
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
        // Login Berhasil
        $request->session()->regenerate();
        return redirect()->intended('/dashboard'); 
    }

    // Login Gagal
    return back()->withInput()->with('loginError', 'E-mail atau password yang Anda masukkan salah.');

})->name('login.post');


Route::get('/dashboard', function () {
    return "Selamat datang di Dashboard!";
});