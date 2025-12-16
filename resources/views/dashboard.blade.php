{{-- resources/views/dashboard.blade.php --}}
@extends('layouts.masterdash')

@section('title', 'Dashboard Petani')

@section('content')

    {{-- BARIS 1: Data Cuaca Utama (3 Card Besar) --}}
    <div class="row">
        {{-- Suhu --}}
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="agrisense-card card-weather-primary">
                <small class="text-muted">Suhu</small>
                <div class="weather-value">29°C</div>
            </div>
        </div>
        
        {{-- Kelembapan --}}
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="agrisense-card card-weather-primary">
                <small class="text-muted">Kelembaban</small>
                <div class="weather-value">78%</div>
            </div>
        </div>
        
        {{-- Kecepatan Angin --}}
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="agrisense-card card-weather-primary">
                <small class="text-muted">Kecepatan Angin</small>
                <div class="weather-value">8 Km/h</div>
            </div>
        </div>
    </div>
    
    {{-- BARIS 2: Perkiraan Cuaca Harian --}}
    <div class="row">
        <div class="col-12">
            <div class="agrisense-card card-daily-forecast d-flex justify-content-around">
                {{-- Data Harian (Contoh) --}}
                <div class="daily-item">Mon<br>☁️<br>28°C</div>
                <div class="daily-item">Tue<br>🌧️<br>26°C</div>
                <div class="daily-item">Wed<br>☀️<br>29°C</div>
                <div class="daily-item">Thu<br>⛈️<br>27°C</div>
                <div class="daily-item">Fri<br>🌧️<br>26°C</div>
                <div class="daily-item">Sat<br>☀️<br>28°C</div>
                <div class="daily-item">Sun<br>🌧️<br>25°C</div>
            </div>
        </div>
    </div>

    <h4 class="mt-4 mb-3">Fitur Utama</h4>
    
    {{-- BARIS 3 & 4: Fitur Utama (6 Card Fitur) --}}
    <div class="row">
        
        {{-- 1. Prediksi Hasil Panen -> Rute Fitur Petani --}}
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="agrisense-card card-feature">
                <div class="title">Prediksi Hasil Panen</div>
                <i class="fas fa-clock fa-2x"></i> 
                {{-- Mengarah ke rute fitur petani: /prediksi_panen --}}
                <a href="{{ route('fitur.prediksi') }}" class="btn-buka">Buka</a> 
            </div>
        </div>
        
        {{-- 2. Riwayat Tanam -> Rute Fitur Petani (Anda mungkin perlu membuat rutenya) --}}
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="agrisense-card card-feature">
                <div class="title">Riwayat Tanam</div>
                <i class="fas fa-seedling fa-2x"></i> 
                {{-- Mengarah ke rute Lahan Admin (Contoh sementara menggunakan SB Admin 2) --}}
                <a href="{{ route('admin.lahan') }}" class="btn-buka">Buka</a> 
            </div>
        </div>
        
        {{-- 3. Perawatan HPT -> Rute Fitur Petani --}}
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="agrisense-card card-feature">
                <div class="title">Perawatan HPT</div>
                <i class="fas fa-hand-holding-water fa-2x"></i> 
                {{-- Mengarah ke rute fitur petani: /perawatan_hpt --}}
                <a href="{{ route('fitur.perawatan') }}" class="btn-buka">Buka</a>
            </div>
        </div>
        
        {{-- 4. Weekly Report -> Rute Admin (Contoh, karena laporan biasanya manajemen data) --}}
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="agrisense-card card-feature">
                <div class="title">Weekly Report</div>
                <i class="fas fa-file-alt fa-2x"></i> 
                {{-- Mengarah ke rute Log Aktivitas Admin (Contoh sementara) --}}
                <a href="{{ route('admin.log_aktivitas') }}" class="btn-buka">Buka</a>
            </div>
        </div>
        
        {{-- 5. Monitoring Cuaca -> Rute Admin (Sama seperti Weekly Report) --}}
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="agrisense-card card-feature">
                <div class="title">Monitoring Cuaca</div>
                <i class="fas fa-cloud-sun fa-2x"></i> 
                {{-- Mengarah ke rute Kelola Petani Admin (Contoh sementara) --}}
                <a href="{{ route('admin.petani') }}" class="btn-buka">Buka</a>
            </div>
        </div>
        
        {{-- 6. Input Hasil Panen -> Rute Admin (Juga dianggap sebagai halaman form data) --}}
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="agrisense-card card-feature">
                <div class="title">Input Hasil Panen</div>
                <i class="fas fa-clipboard-list fa-2x"></i> 
                {{-- Mengarah ke rute Kelola Bimbingan Admin (Contoh sementara) --}}
                <a href="{{ route('admin.bimbingan') }}" class="btn-buka">Buka</a>
            </div>
        </div>
    </div>
    
@endsection