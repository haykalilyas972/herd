# Library System

## Description
Simple Library Information System

## Requirements
- PHP
- Composer
- MySQL
- Laravel

## Installation
 saya menggunakan
- Laravel herd
- XAMPP

1.install composer
  composer create-project laravel/laravel nama-project
  
2.buat database belajar-laravel di phpmyadmin

3.buat project laravel
  masuk ke folder project lalu bash 
  composer create-project laravel/laravel belajar-laravel

4.masuk ke project
  cd belajar-laravel

5.jalankan laravel
  php artisan serve
  berhasil=Server running on [http://127.0.0.1:8000] (kemudian buka http tersebut dibrowser)

6.konfigurasi
  buka file .env di vscode
  atur bagian database seperti ini
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=belajar-laravel
  DB_USERNAME=root
  DB_PASSWORD=

7.jalankan migration
  php artisan migrate (jika berhasil, tabel bawaan laravel akan otomatis dibuat di database belajar-laravel

8.inisialisasi git
  git status untuk cek reposity
  git init
  git add .
  git branch -m main
  git commit -m "first commit belajar-laravel"

## Author
Haykal Ilyas 5C Sistem Informasi 2410631250012
