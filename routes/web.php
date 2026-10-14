<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// Route publik: dapat diakses tanpa login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route yang hanya dapat diakses setelah login
Route::middleware(['auth'])->group(function () {

    // Halaman utama diarahkan ke daftar buku
    Route::get('/', function () {
        return redirect()->route('books.index');
    });

    // CRUD buku
    Route::resource('books', BookController::class);

    // CRUD anggota
    Route::resource('members', MemberController::class);

    // CRUD peminjaman
    Route::resource('loans', LoanController::class);

    // Pengembalian buku
    Route::put('/loans/{id}/kembalikan', [LoanController::class, 'kembalikan'])
        ->name('loans.kembalikan');

    // CRUD kategori hanya untuk admin
    Route::middleware(['admin'])->group(function () {
        Route::resource('categories', CategoryController::class)
            ->except(['show']);
    });

    Route::get('/profil', [ProfileController::class, 'show'])
        ->name('profile.show');

    Route::put('/profil/password', [ProfileController::class, 'updatePassword'])
        ->name('profile.password.update');
});
