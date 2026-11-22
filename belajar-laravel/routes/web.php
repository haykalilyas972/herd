<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BorrowingController;

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Halaman login untuk pengguna yang belum login
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.submit');
});

// Halaman yang hanya bisa diakses setelah login
Route::middleware('auth')->group(function () {

    // Mengelola buku
    Route::resource('books', BookController::class);

    // Halaman kategori
    Route::get('/categories', [CategoryController::class, 'index']);

    // Halaman anggota
    Route::get('/members', [MemberController::class, 'index']);

    // Halaman peminjaman
    Route::get('/borrowings', [BorrowingController::class, 'index'])
        ->name('borrowings.index');

    Route::get('/borrowings/create', [BorrowingController::class, 'create'])
        ->name('borrowings.create');

    Route::post('/borrowings', [BorrowingController::class, 'store'])
        ->name('borrowings.store');

    // Proses pengembalian buku
    Route::patch('/borrowings/{borrowing}/return', [BorrowingController::class, 'returnBook'])
        ->name('borrowings.return');

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');
});

// Halaman pengelolaan pengguna menggunakan Gate
Route::middleware(['auth', 'can:manage-users'])->group(function () {
    Route::resource('users', UserController::class);
});