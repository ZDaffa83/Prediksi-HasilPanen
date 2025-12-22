<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>
# 🌱 AgriSmart – Laravel Project

Project ini merupakan aplikasi berbasis Laravel untuk sistem AgriSmart.  
Dokumen ini berisi **panduan lengkap menjalankan project setelah clone repository**.

---

##  Persyaratan
Pastikan sudah terinstall:
- PHP ≥ 8.1
- Composer
- MySQL / MariaDB
- Git
- Node.js & NPM (opsional, jika menggunakan Vite)

---

## Step by Step

### 1️⃣ Clone Repository
```bash
git clone https://github.com/ZDaffa83/Prediksi-HasilPanen.git
cd Prediksi-HasilPanen

composer install
php artisan key:generate
php artisan migrate

php artisan db:seed
php artisan db:seed --class=AdminUserSeeder
php artisan db:seed --class=PanenSeeder
php artisan db:seed --class=RiwayatTanamSeeder

Dan run dengan 
php artisan serve

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
