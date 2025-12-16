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
        {{-- Prediksi Hasil Panen --}}
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="agrisense-card card-feature">
                <div class="title">Prediksi Hasil Panen</div>
                <i class="fas fa-clock fa-2x"></i> 
                <button class="btn-buka">Buka</button>
            </div>
        </div>
        
        {{-- Riwayat Tanam --}}
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="agrisense-card card-feature">
                <div class="title">Riwayat Tanam</div>
                <i class="fas fa-seedling fa-2x"></i> 
                <button class="btn-buka">Buka</button>
            </div>
        </div>
        
        {{-- Perawatan HPT --}}
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="agrisense-card card-feature">
                <div class="title">Perawatan HPT</div>
                <i class="fas fa-hand-holding-water fa-2x"></i> 
                <button class="btn-buka">Buka</button>
            </div>
        </div>
        
        {{-- Weekly Report --}}
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="agrisense-card card-feature">
                <div class="title">Weekly Report</div>
                <i class="fas fa-file-alt fa-2x"></i> 
                <button class="btn-buka">Buka</button>
            </div>
        </div>
        
        {{-- Monitoring Cuaca --}}
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="agrisense-card card-feature">
                <div class="title">Monitoring Cuaca</div>
                <i class="fas fa-cloud-sun fa-2x"></i> 
                <button class="btn-buka">Buka</button>
            </div>
        </div>
        
        {{-- Input Hasil Panen --}}
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="agrisense-card card-feature">
                <div class="title">Input Hasil Panen</div>
                <i class="fas fa-clipboard-list fa-2x"></i> 
                <button class="btn-buka">Buka</button>
            </div>
        </div>
    </div>
    
@endsection