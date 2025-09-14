<div align="center">
    <h1>Sistem Pakar Penyakit Sapi</h1>
</div>

# About Sistem Pakar Penyakit Sapi
Sistem ini dirancang untuk membantu peternak dan pengguna dalam mendiagnosis penyakit sapi berdasarkan gejala yang dialami. Berbasis web dengan pendekatan sistem pakar, sistem ini memanfaatkan data gejala dan penyakit yang telah dikaji oleh tenaga ahli untuk menghasilkan identifikasi penyakit secara lebih akurat. Selain itu, sistem dilengkapi dengan fitur pengukuran akurasi, penyajian data penyakit, gejala, serta informasi pengguna. Pengembangan sistem ini juga bertujuan untuk mendukung digitalisasi peternakan dan meningkatkan kualitas kesehatan hewan.


## Requirements
<a href="https://laravel.com/docs/10.x/releases"><img src="https://img.shields.io/badge/laravel-v10-blue" alt="version laravel"></a>
<a href="https://www.php.net/releases/8.2/en.php"><img src="https://img.shields.io/badge/PHP-v8.2.4-blue" alt="version php"></a>
<a href="https://nodejs.org/en/blog/release/v10.1.0"><img src="https://img.shields.io/badge/NPM-v10.1.0-green" alt="version php"></a>


## Setup
- buka direktori project di terminal anda.
- ketikan command di terminal :
  ```bash
  copy .env.example .env
  ```
  untuk Linuk, ketikan command :
  ```bash
  cp .env.example .env
  ```
- instal package-package di laravel, ketikan command :
  ```bash
  composer install
  ```
- menginstal npm UI di website, ketikan command :
  ```bash
  npm install
  ```
### Pengaturan untuk Database
Buatlah nama database baru, kemudian sesuaikan nama database, username, dan password pada file .env. Setelah itu, import file bernama oucyiaux_rada.sql ke dalam database yang telah dibuat. Proses import dapat dilakukan melalui phpMyAdmin dengan memilih database lalu klik Import dan pilih file skripsi(1).sql, atau melalui command line dengan perintah mysql -u username -p nama_database < oucyiaux_rada.sql. Pastikan konfigurasi database sudah sesuai agar aplikasi dapat berjalan dengan benar.

  
  ### Command Run Website
- menjalanlan Laravel di website, ketikan command :
  ```bash
  php artisan serve
  ```
- menjalanlan UI Laravel di website, ketikan command :
  ```bash
  npm run dev
  ```
- menjalankan laravel di website, ketikan command :
  ```bash
  php artisan serve
  ```
## Akun Login
Aplikasi ini memiliki dua role, yaitu guest dan admin. Pengguna dengan role guest dapat mengakses aplikasi tanpa login, sedangkan untuk mengakses halaman admin perlu melakukan login dengan menambahkan /login pada URL website. Berikut adalah akun admin yang dapat digunakan untuk pertama kali.
email = admin@gmail.com, pw = 12345678

## Fitur
### Guest
- Halaman dashboard
- Halaman diagnosa penyakit sapi
- Halaman daftar gejala dan penyakit
- Halaman akurasi sistem
### Admin
- Halaman dashboard
- Halaman diagnosa penyakit sapi
- Halaman keloladaftar gejala dan penyakit
- Halaman akurasi sistem
- kelola dataset

