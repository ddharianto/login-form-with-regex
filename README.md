# Login Form with Regex in PHP

Displays basic login, registration, change password, and logout forms in the PHP programming language. The login, registration and change password forms use regex so that users can submit entries that are adjusted by the system.

## Features

### Login

- Ask the user to enter email and password
- The system will check if the email has been registered
- The system will check if the password is correct
- If everything is correct the system will redirect to the index.php page

### Register

- Ask the user to enter username, full name, email and password
- The system will check whether the email entered by the user is correct and following the regex
- The system will check whether the email already exists
- If so, the system will suggest several new email addresses that is not exists
- The system will check if the password entered by the user is correct and following the regex
- There is a 'generate' button to create a password that is suggested by the system according to the regex
- If all are correct the system will redirect to the login.php page

## How to setup

- Clone or download this repository
- Unzip the downloaded folder if the folder is compressed
- Download and install the xampp application
- Open the xampp folder on each computer and navigate to the htdocs folder then create a new folder. Example: C:\xampp\htdocs\your new folder
- Move all extracted files into that folder
- Open the xampp application > start/run the Apache and MySQL modules
- Open a browser > go to the phpmyadmin page 'http://localhost/phpmyadmin' > create a new database with the name 'regex_db' > enter the database 'regex_db' and go to the import menu > insert a file called 'regex_db.sql' > Go
- Go to 'http://localhost/your new folder/' page to run it

### Disclaimer: I use Bahasa in the code examples

#
#

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
- Buka browser > masuk ke halaman phpmyadmin 'http://localhost/phpmyadmin' > buat database baru dengan nama 'regex_db' > masuk ke database 'regex_db' dan ke menu import > masukkan file yang bernama 'regex_db.sql' > Go
- Masuk ke halaman 'http://localhost/regex/' untuk menjalankannya > selesai
