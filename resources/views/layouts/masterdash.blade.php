{{-- resources/views/layouts/agrisense_master.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgriSmart | @yield('title', 'Dashboard')</title>

    {{-- Bootstrap CSS (Dasar grid dan utility) --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    {{-- CSS Kustom --}}
    <link href="{{ asset('css/dbcss.css') }}" rel="stylesheet">
    
    @stack('styles')
</head>
<body>

    <div class="container mt-4 mb-4">
        
        {{-- Header --}}
        <header class="agrisense-header mb-4">
            <div class="agrisense-logo">AgriSmart</div>
            <nav class="agrisense-nav">
                <a href="{{ url('/dashboard') }}">Home</a>
                <a href="{{ url('/help-desk') }}">Help Desk</a>
            </nav>
            <div class="notification-icon">
                <i class="fas fa-bell"></i> </div>
        </header>

        {{-- Konten Dinamis (Dashboard) --}}
        <main>
            @yield('content')
        </main>

        {{-- Footer (Opsional) --}}
        {{-- <footer>...</footer> --}}

    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    {{-- JS Kustom (jika ada) --}}
    <script src="{{ asset('js/dashjs.js') }}"></script>
    
    @stack('scripts')
</body>
</html>