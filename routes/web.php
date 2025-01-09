<?php

use App\Http\Controllers\ChirpController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::resource('chirps', ChirpController::class)
    ->only(['index', 'store' ])
    // index digunakan untuk menampilkan chirps
    // store digunakan untuk menyimpan chirp baru
    ->middleware(['auth', 'verified']);
    // middleware auth digunakan untuk memastikan user sudah login
    // middleware verified digunakan untuk memastikan user sudah verifikasi email


require __DIR__.'/auth.php';
