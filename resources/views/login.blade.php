<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login Aplikasi</title>
    
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    
    <div class="login-page">
        
        <div class="login-form-container">
            
            <div class="frame-72">
              <div class="login">Login</div>
              <div
                class="selamat-datang-kembali-akses-semua-informasi-tanam-perawatan-dan-hasil-panenmu-di-website-ini"
              >
                Selamat datang kembali! Akses semua informasi tanam, perawatan, dan hasil
                panenmu di Website ini.
              </div>
            </div>
            
            <form action="{{ route('login.post') }}" method="POST" class="login-form"> 
                @csrf 
                
                <div class="e-mail">E-mail</div>
                <input 
                    type="email" 
                    name="email" 
                    class="password-email" 
                    placeholder="Masukkan E-mail" 
                    required
                >
                
                <div class="password">Password</div>
                <input 
                    type="password" 
                    name="password" 
                    class="password-textbox" 
                    placeholder="Masukkan Password" 
                    required
                >
                
                <div class="forgot-password">
                    <a class="fp_text">Forgot Password?</a>
                </div>
                
                <button type="submit" class="login-button">
                    Login
                </button>
            </form>
            
        </div> 
        <img 
            class="login-img" 
            src="{{ asset('images/login_img.png') }}"
            alt="Latar belakang pertanian"
        />
        
    </div>

</body>
</html>