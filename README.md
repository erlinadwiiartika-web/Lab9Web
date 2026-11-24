# Lab9Web — Praktikum 9 Pemrograman Web

Project ini disusun mengikuti **Modul Praktikum 9 PHP Modular** dan isi **Laporan Praktikum 9 Erlina Dwi Artika**. Isinya mencakup latihan `include`/`require`, template multi-halaman, function/helper, struktur direktori modular, routing whitelist, halaman 404, serta integrasi CRUD pengguna.

## 1. Kebutuhan
- Windows dengan XAMPP
- Apache dan MySQL/MariaDB aktif
- PHP 8.x dengan ekstensi PDO MySQL
- Visual Studio Code
- Browser

## 2. Cara memasang dan menjalankan
1. Ekstrak folder `Lab9Web` ke `C:\xampp\htdocs\`.
2. Buka XAMPP Control Panel, lalu jalankan **Apache** dan **MySQL**.
3. Buka `http://localhost/phpmyadmin`.
4. Pilih menu **Import**, pilih file `Lab9Web/database/db_latihan.sql`, lalu jalankan import.
5. Pastikan pengaturan database di `project/config/database.php` sesuai dengan XAMPP. Pengaturan bawaan: host `localhost`, database `db_latihan`, user `root`, password kosong.
6. Buka halaman latihan:
   - `http://localhost/Lab9Web/lab9_php_modular/home.php`
7. Buka aplikasi CRUD:
   - `http://localhost/Lab9Web/project/index.php`

## 3. Isi folder
```text
Lab9Web/
├── README.md
├── database/
│   └── db_latihan.sql
├── lab9_php_modular/
│   ├── pesan.php
│   ├── uji-include.php
│   ├── uji-require.php
│   ├── header.php
│   ├── footer.php
│   ├── home.php
│   ├── about.php
│   ├── profil.php
│   ├── kontak.php
│   ├── helpers.php
│   ├── latihan-function.php
│   ├── latihan-function-kedua.php
│   └── style.css
├── project/
│   ├── index.php
│   ├── .htaccess
│   ├── config/database.php
│   ├── helpers/functions.php
│   ├── views/
│   │   ├── header.php
│   │   ├── footer.php
│   │   ├── dashboard.php
│   │   └── 404.php
│   ├── modules/
│   │   ├── user/
│   │   │   ├── list.php
│   │   │   ├── add.php
│   │   │   ├── edit.php
│   │   │   └── delete.php
│   │   └── auth/README.txt
│   └── assets/css/style.css
└── screenshots/
    └── README.txt
```

## 4. Daftar halaman dan rute
### Latihan PHP modular
- `uji-include.php` — pengujian `include`
- `uji-require.php` — pengujian `require`
- `home.php`, `about.php`, `profil.php`, `kontak.php` — template bersama
- `latihan-function.php` dan `latihan-function-kedua.php` — pemakaian helper dari dua halaman

### Aplikasi CRUD
- `index.php` — dashboard
- `index.php?page=user/list` — daftar pengguna
- `index.php?page=user/add` — tambah pengguna
- `index.php?page=user/edit&id=1` — ubah pengguna (gunakan ID yang tersedia)
- `index.php?page=user/delete` — endpoint hapus melalui form POST dari daftar pengguna
- Rute tidak dikenal, misalnya `index.php?page=admin/rahasia`, akan menampilkan halaman 404.

## 5. Catatan implementasi
- `config/database.php` menjadi satu-satunya tempat pengaturan koneksi database (PDO).
- `helpers/functions.php` berisi helper format Rupiah, escaping HTML, validasi email, flash message, CSRF, redirect, dan fungsi umum lain.
- Router `index.php` menggunakan whitelist; input URL tidak langsung dijadikan path file.
- Operasi tambah, ubah, dan hapus menggunakan POST, validasi server, prepared statement, dan token CSRF.
- `.htaccess` untuk URL ringkas bersifat opsional. Project tetap dapat dijalankan menggunakan URL `index.php?page=...` tanpa mengaktifkannya.

## 6. Screenshot untuk laporan
Folder `screenshots` disediakan untuk menyimpan screenshot hasil pengujian di komputer sendiri. Screenshot tidak dibuat-buat karena hasil tampilan harus diambil setelah project dijalankan di XAMPP. Sesuaikan bukti screenshot dengan bagian yang diminta pada laporan: struktur direktori, template, function, routing, dan pengujian CRUD.

## 7. GitHub (opsional)
Jalankan perintah berikut dari terminal pada folder `Lab9Web`:
```bash
git init
git add .
git commit -m "Praktikum 9: PHP Modular"
git branch -M main
git remote add origin https://github.com/USERNAME/Lab9Web.git
git push -u origin main
```
Ganti `USERNAME` dengan username GitHub milik sendiri.
