@extends('layouts.masterdash')

@section('title', 'Help Desk')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<style>
    .faq-title {
        font-size: 2rem;
        font-weight: 600;
        color: #1b5e4b;
    }
    .faq-card {
        background: #ffffff;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        height: 100%;
    }
    .faq-icon {
        font-size: 24px;
        color: #1b5e4b;
        margin-bottom: 10px;
    }
    .faq-question {
        font-weight: 600;
    }
    .faq-answer {
        font-size: 0.9rem;
        color: #6c757d;
    }
</style>
@endpush

@section('content')
<div class="text-center mb-5">
    <h1 class="faq-title">FAQ</h1>
    <p class="text-muted">
        Temukan jawaban atas pertanyaan umum seputar layanan dan dukungan AgriSmart.
    </p>
</div>

<div class="row g-4">
    @foreach ($faqs as $faq)
        <div class="col-md-6">
            <div class="faq-card">
                <div class="faq-icon">
                    <i class="bi {{ $faq['icon'] }}"></i>
                </div>
                <div class="faq-question">
                    {{ $faq['question'] }}
                </div>
                <div class="faq-answer mt-2">
                    {{ $faq['answer'] }}
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
