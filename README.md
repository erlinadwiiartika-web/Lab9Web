# Lab9Web — Praktikum 9 Pemrograman Web

Project ini disusun mengikuti **Modul Praktikum 9 PHP Modular** dan isi **Laporan Praktikum 9 Erlina Dwi Artika**. Isinya mencakup latihan `include`/`require`, template multi-halaman, function/helper, struktur direktori modular, routing whitelist, halaman 404, serta integrasi CRUD pengguna.

## 1. Kebutuhan
- Windows dengan XAMPP
- Apache dan MySQL/MariaDB aktif
- PHP 8.x dengan ekstensi PDO MySQL
- Visual Studio Code
- Browser

## 2. Isi folder
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

## 3. Daftar halaman dan rute
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

## 4. Catatan implementasi
- `config/database.php` menjadi satu-satunya tempat pengaturan koneksi database (PDO).
- `helpers/functions.php` berisi helper format Rupiah, escaping HTML, validasi email, flash message, CSRF, redirect, dan fungsi umum lain.
- Router `index.php` menggunakan whitelist; input URL tidak langsung dijadikan path file.
- Operasi tambah, ubah, dan hapus menggunakan POST, validasi server, prepared statement, dan token CSRF.
- `.htaccess` untuk URL ringkas bersifat opsional. Project tetap dapat dijalankan menggunakan URL `index.php?page=...` tanpa mengaktifkannya.

## 5. Screenshot untuk laporan
1. Hasil include saat pesan.php tersedia
<img width="844" height="603" alt="image" src="https://github.com/user-attachments/assets/dba645b3-1391-4fc9-b60b-aa8de9a1617e" />

2. include saat file tidak ditemukan: muncul Warning, eksekusi berlanjut
<img width="844" height="375" alt="image" src="https://github.com/user-attachments/assets/c94ee102-09fd-4181-b68a-7b797bb4e160" />

3. require saat file tidak ditemukan: muncul Fatal error, eksekusi berhenti
<img width="844" height="375" alt="image" src="https://github.com/user-attachments/assets/23b0a456-cd33-4120-9b1c-6a09176d93f3" />

4. Halaman home.php
<img width="844" height="503" alt="image" src="https://github.com/user-attachments/assets/4dee34f9-4c90-4689-888e-c7e5d53b6718" />

5. Halaman about.php
<img width="844" height="503" alt="image" src="https://github.com/user-attachments/assets/db3133b2-a6c3-462a-94ec-dec9c06fdd6e" />

6. Halaman profil.php
<img width="844" height="516" alt="image" src="https://github.com/user-attachments/assets/079ec6da-0d6f-4d48-9cd0-df65d5c4b72f" />

7. Halaman kontak.php
<img width="844" height="503" alt="image" src="https://github.com/user-attachments/assets/a1939085-34c2-48c2-b90a-a1c84eefab02" />

8. Hasil pemanggilan function pada latihan-function.php
<img width="844" height="522" alt="image" src="https://github.com/user-attachments/assets/748a42d8-f1aa-49ab-a7f0-0789043d35fb" />

9. Pemakaian helpers.php pada halaman kedua
<img width="844" height="503" alt="image" src="https://github.com/user-attachments/assets/43a0c423-e65f-43f4-bf6a-77b0eb313ebf" />

10. Struktur direktori Lab9Web
<img width="405" height="672" alt="image" src="https://github.com/user-attachments/assets/e2218657-5115-4be6-90ba-cda79eb5a45d" />

11. index.php (tanpa parameter) menampilkan dashboard
<img width="844" height="464" alt="image" src="https://github.com/user-attachments/assets/0b8d7882-1565-44e9-9c2f-0631611fa3dd" />

12. index.php?page=user/list menampilkan daftar pengguna
<img width="844" height="525" alt="image" src="https://github.com/user-attachments/assets/034fb604-55f5-4f61-a5fe-e1b6387b8b8a" />

13. index.php?page=user/add menampilkan form tambah pengguna
<img width="844" height="480" alt="image" src="https://github.com/user-attachments/assets/afc7a0ae-c0b4-4286-bc0a-4ef469fe48df" />

14. index.php?page=admin/rahasia (tidak terdaftar) menampilkan halaman 404 dengan status HTTP 404
<img width="844" height="464" alt="image" src="https://github.com/user-attachments/assets/8e32d5f6-ce0c-4083-a7b5-bcb4360b778d" />

15. Create: tambah pengguna berhasil, pesan sukses tampil
<img width="844" height="588" alt="image" src="https://github.com/user-attachments/assets/e712ba8a-1d4e-4fee-abdb-b267bcd8e0e1" />

16. Validasi server: email tidak valid ditolak dengan pesan gagal
<img width="844" height="513" alt="image" src="https://github.com/user-attachments/assets/35fd37f0-be29-4d25-b5cc-e2784cdd9510" />

17. Read untuk edit: form berisi data pengguna yang dipilih
<img width="844" height="480" alt="image" src="https://github.com/user-attachments/assets/6213b097-8d5d-4199-9d39-2b53f816fdb2" />

18. Update: data berhasil diubah, pesan sukses tampil
<img width="844" height="588" alt="image" src="https://github.com/user-attachments/assets/2643a5d1-0909-4007-ae6d-58fded08f474" />

19. Delete: pengguna berhasil dihapus melalui POST
<img width="844" height="558" alt="image" src="https://github.com/user-attachments/assets/280709a4-902b-4047-8111-2e6a7a2b80cd" />
