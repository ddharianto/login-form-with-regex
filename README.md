# Login Form with Regex in PHP
Menampilkan basic login, registrasi, ubah password, dan logout form pada bahasa pemrogramam PHP. Form login, registrasi dan ubah password menggunakan regex agar user dapat mensubmit masukkan yang disesuaikan oleh sistem.
## Fitur
### Login
- Meminta user untuk memasukkan email dan password
- Sistem akan memeriksa apakah email sudah terdaftar
- Sistem akan memeriksa apakah password sudah benar
- Jika semua benar sistem akan mengarahkan ke halaman index.php
### Registrasi
- Meminta user untuk memasukkan  username, nama lengkap, email dan password
- Sistem akan memeriksa email yang dimasukkan oleh user sudah benar atau tidak meggunakan regex
- Sistem akan memeriksa apakah email sudah pernah terdaftar
- Apabila sudah, sistem akan menyarankan beberapa alamat email baru yang belum terdaftar
- Sistem akan memeriksa password yang dimasukkan oleh user sudah benar atau tidak menggunakan regex
- Terdapat tombol 'generate' untuk membuat password yang disarankan oleh sistem yang sudah sesuai regex
- Jika semua benar sistem akan mengarahkan ke halaman login.php
## Instruksi me-run secara local menggunakan xampp
- Download repository ini
- Unzip terlebih dahulu apabila folder dalam keadaan terkompres
- Download dan install aplikasi xampp
- Buka folder xampp di komputer masing-masing dan mengarah ke folder htdocs lalu membuat folder baru. Contoh: C:\xampp\htdocs\regex
- Pindahkan semua file yang sudah diekstrak ke dalam folder tersebut
- Buka aplikasi xampp > start/jalankan module apache dan MySQL 
- Buka browser > masuk ke halaman phpmyadmin 'https://localhost/phpmyadmin' > buat database baru dengan nama 'regex_db' > masuk ke database 'regex_db' dan ke menu import > masukkan file yang bernama 'regex_db.sql' > Go
- Masuk ke halaman 'https://localhost/regex/' untuk menjalankannya > selesai
