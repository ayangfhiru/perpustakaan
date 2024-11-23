<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PeminjamanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Buku
Route::get('/buku', [BukuController::class, 'index'])->name('buku');

Route::get('/tambah-buku', [BukuController::class, 'create'])->name('tambah-buku');
Route::post('/tambah-buku', [BukuController::class, 'store'])->name('post-buku');

Route::get('/edit-buku/{id}', [BukuController::class, 'edit'])->name('edit-buku');
Route::post('/edit-buku/{id}', [BukuController::class, 'update'])->name('post-edit-buku');

Route::get('/hapus-buku/{id}', [BukuController::class, 'destroy'])->name('delete-buku');


// Anggota
Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota');

Route::get('/tambah-anggota', [AnggotaController::class, 'create'])->name('tambah-anggota');
Route::post('/tambah-anggota', [AnggotaController::class, 'store'])->name('post-anggota');

Route::get('/edit-anggota/{id}', [AnggotaController::class, 'edit'])->name('edit-anggota');
Route::post('/edit-anggota/{id}', [AnggotaController::class, 'update'])->name('post-edit-anggota');

Route::get('/hapus-anggota/{id}', [AnggotaController::class, 'destroy'])->name('delete-anggota');


// Peminjaman
Route::get('/pinjaman', [PeminjamanController::class, 'index'])->name('pinjaman');
Route::get('/pinjaman-selesai', [PeminjamanController::class, 'bookReturned'])->name('pinjaman-selesai');

Route::get('/tambah-pinjaman', [PeminjamanController::class, 'create'])->name('tambah-pinjaman');
Route::post('/tambah-pinjaman', [PeminjamanController::class, 'store'])->name('post-pinjaman');

Route::get('/edit-pinjaman/{id}', [PeminjamanController::class, 'edit'])->name('edit-pinjaman');
Route::post('/edit-pinjaman/{id}', [PeminjamanController::class, 'update'])->name('post-edit-pinjaman');

Route::get('/hapus-pinjaman/{id}', [PeminjamanController::class, 'destroy'])->name('delete-pinjaman');
