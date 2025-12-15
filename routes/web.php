<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginAdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController; 
use App\Http\Controllers\FiturController;
use App\Http\Controllers\AdminPanelController;


// Rute Default (Splash Page)
Route::get('/', function () {
<<<<<<< HEAD
    return view('welcome'); 
=======
    return view('index');
});

Route::get('/login', [LoginAdminController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginAdminController::class, 'login'])->name('admin.login');
Route::post('/logout', [LoginAdminController::class, 'logout'])->name('admin.logout');
Route::get('/register', [AdminController::class, 'index'])->name('register.show');
Route::get('/admin/list', [AdminController::class, 'index'])->name('admin.list');

// Route::resource akan membuat semua 7 route CRUD (index, create, store, show, edit, update, destroy)
Route::resource('/admin', AdminController::class)->except(['index', 'create', 'store', 'show']);
// Route Dashboard (Membutuhkan otentikasi)
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('fdadmin.dashboard');
    })->name('admin.dashboard');
>>>>>>> 4bdba2aa028175464dbe15ff8bbc5af596f225a4
});

// Rute Login (Halaman Form)
Route::get('/login', function () {
    return view('login'); 
})->name('login');


// Rute POST Login (Menggunakan logika Auth bawaan dari kode GitHub)
Route::post('/login', function (Request $request) {
    
    // Asumsi: Kita akan mencoba login sebagai Petani terlebih dahulu
    $guard = 'petani'; // Default guard

    $credentials = $request->validate([
        'email' => ['required', 'string'], // Ubah dari 'email' menjadi 'string' karena bisa jadi username atau email
        'password' => ['required'],
    ]);

    // Coba otentikasi menggunakan guard Petani
    if (Auth::guard($guard)->attempt(['username' => $credentials['email'], 'password' => $credentials['password']]) ||
        Auth::guard($guard)->attempt(['email_petani' => $credentials['email'], 'password' => $credentials['password']])
    ) {
        $request->session()->regenerate();
        return redirect()->intended(route('dashboard')); // Arahkan ke Dashboard Petani
    }

    // Jika gagal sebagai Petani, coba otentikasi sebagai Admin
    if (Auth::guard('admin')->attempt(['username' => $credentials['email'], 'password' => $credentials['password']]) ||
        Auth::guard('admin')->attempt(['email_admin' => $credentials['email'], 'password' => $credentials['password']])
    ) {
        $request->session()->regenerate();
        return redirect()->intended(route('admin.dashboard')); // Arahkan ke Dashboard Admin
    }

    // Login Gagal
    return back()->withInput()->with('loginError', 'E-mail, username, atau password yang Anda masukkan salah.');

})->name('login.post');

// Rute Logout (Tambahan)
Route::post('/logout', function (Request $request) {
    Auth::logout(); // Logout dari guard default (web)

    // Log out dari guard lain (jika perlu)
    Auth::guard('admin')->logout(); 
    Auth::guard('petani')->logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect(route('login'));
})->name('logout');


// --- RUTE TERLINDUNGI (Protected Routes) ---

// Grup untuk Rute Petani (Dashboard AgriSmart & Fitur)
Route::middleware('auth:petani')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/prediksi_panen', [FiturController::class, 'prediksiPanen'])->name('fitur.prediksi');
    Route::get('/perawatan_hpt', [FiturController::class, 'perawatanHPT'])->name('fitur.perawatan');
});


// Grup untuk Rute Admin (Panel SB Admin 2)
Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {
    Route::get('/dashboard', [AdminPanelController::class, 'dashboardAdmin'])->name('dashboard');
    Route::get('/lahan', [AdminPanelController::class, 'kelolaLahan'])->name('lahan');
    Route::get('/petani', [AdminPanelController::class, 'kelolaPetani'])->name('petani');
    Route::get('/bimbingan', [AdminPanelController::class, 'kelolaBimbingan'])->name('bimbingan');
    Route::get('/log-aktivitas', [AdminPanelController::class, 'logAktivitas'])->name('log_aktivitas');
});