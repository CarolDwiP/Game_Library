# Sistem Manajemen Perpustakaan Game

![PHP](https://img.shields.io/badge/PHP-8.0+-777BB4?logo=php)
![CodeIgniter](https://img.shields.io/badge/CodeIgniter-4.3-EF4223?logo=codeigniter)


[https://gamelibrary.my.id/](https://gamelibrary.my.id/).

Sistem manajemen game sederhana dengan fitur login, register, dan pembagian hak akses untuk admin dan user.

## 🌟 Fitur Utama

### Untuk Admin
- 📊 Dashboard dengan grafik interaktif
- ➕ Tambah/Edit/Hapus game
- 👥 Kelola data game (CRUD lengkap)
- 📈 Chart distribusi genre dan harga

### Untuk User
- 🎮 Lihat daftar game
- 📉 Grafik genre dan harga sederhana
- 🔒 Hanya bisa melihat, tidak bisa edit/hapus

### Umum
- 🔑 Login/Register aman
- 👤 Session management
- 🛡️ Proteksi CSRF dan validasi input

## 📥 Instalasi

1. Clone repositori:
   git clone https://github.com/CarolDwiP/Game_Library.git

   cd game-library
   
2. Install dependency:
    composer install

3. Import database (gamelibrary.sql)

4. Salin file .env.example ke .env dan sesuaikan:
    app.baseURL = 'http://localhost:8081'

    database.default.database = gamelibrary

## WEBSITE

https://gamelibrary.my.id/
