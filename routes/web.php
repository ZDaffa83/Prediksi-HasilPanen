<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController; 
use App\Http\Controllers\FiturController;
use App\Http\Controllers\AdminPanelController;


// Rute Default (Splash Page)
Route::get('/', function () {
    return view('welcome'); 
});

// Rute Login (Halaman Form)
Route::get('/login', function () {
    return view('login'); 
})->name('login');


// Rute POST Login (Hanya menggunakan satu guard: 'web' - tabel users)
Route::post('/login', function (Request $request) {
    
    $credentials = $request->validate([
        'email' => ['required', 'email'], 
        'password' => ['required'],
    ]);
    if (Auth::attempt($credentials)) { 
        $request->session()->regenerate();
        return redirect()->intended(route('dashboard')); 
    }

    // Login Gagal
    return back()->withInput()->with('loginError', 'E-mail atau password yang Anda masukkan salah.');

})->name('login.post');


// Rute Logout
Route::post('/logout', function (Request $request) {
    Auth::logout(); 

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect(route('login'));
})->name('logout');


// --- RUTE TERLINDUNGI (Protected Routes menggunakan guard 'web' saja) ---

Route::middleware('auth')->group(function () {
    // Dashboard Utama
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Fitur Petani
    Route::get('/prediksi_panen', [FiturController::class, 'prediksiPanen'])->name('fitur.prediksi');
    Route::get('/perawatan_hpt', [FiturController::class, 'perawatanHPT'])->name('fitur.perawatan');
    
    // Rute Admin (diasumsikan Admin juga login ke tabel users)
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminPanelController::class, 'dashboardAdmin'])->name('dashboard');
        Route::get('/lahan', [AdminPanelController::class, 'kelolaLahan'])->name('lahan');
        Route::get('/petani', [AdminPanelController::class, 'kelolaPetani'])->name('petani');
        Route::get('/bimbingan', [AdminPanelController::class, 'kelolaBimbingan'])->name('bimbingan');
        Route::get('/log-aktivitas', [AdminPanelController::class, 'logAktivitas'])->name('log_aktivitas');
    });

});