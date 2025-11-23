<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginAdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
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
});
