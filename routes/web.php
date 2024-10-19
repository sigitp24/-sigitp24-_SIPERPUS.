<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// GET, POST, PUT, PATCH, DELETE
// PUT update data harus semua (judul, halaman, penulis)
// Patch update data minimal satu(judul)

// Route::get('/books', function(){
//     return 'Daftar Buku';
// });

// Route::get('/books', function(){
//     return view('books.index');
// });

Route::get('/books', [BookController::class,'index']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
