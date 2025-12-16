<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RiwayatTanamController;

// Rute Default
Route::get('/', function () {
    return redirect()->route('login');
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

Route::get('/riwayat-tanam', function () {
    return view('riwayat_tanam');
});



//post get
Route::get('/riwayat-tanam', [RiwayatTanamController::class, 'index'])->name('riwayat.index');       // Read
Route::post('/riwayat-tanam', [RiwayatTanamController::class, 'store'])->name('riwayat.store');      // Create
Route::get('/riwayat-tanam/{id}', [RiwayatTanamController::class, 'show'])->name('riwayat.show');    // Read detail
Route::put('/riwayat-tanam/{id}', [RiwayatTanamController::class, 'update'])->name('riwayat.update'); // Update
Route::delete('/riwayat-tanam/{id}', [RiwayatTanamController::class, 'destroy'])->name('riwayat.destroy'); // Delete
