<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// 1. HALAMAN DEPAN (Landing Page)
// Bisa diakses siapa saja (tanpa login)
Route::get('/', function () {
    return view('welcome');
});

// 2. HALAMAN APLIKASI UTAMA (Dashboard)
// Wajib Login & Verifikasi Email
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Halaman Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Aksi: Simpan Target Hutang (Pertama kali)
    Route::post('/debt', [DashboardController::class, 'storeDebt'])->name('debt.store');
    
    // Aksi: Simpan Cicilan Puasa (Harian)
    Route::post('/log', [DashboardController::class, 'storeLog'])->name('log.store');
    
    // Update Manual Sisa Hutang
    Route::patch('/debt/update', [DashboardController::class, 'updateDebt'])->name('debt.update');

    // Aksi: Hapus Riwayat
    Route::delete('/log/{id}', [DashboardController::class, 'destroyLog'])->name('log.destroy');

    // Profil User (Bawaan Laravel)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

// Google Login Routes
use App\Http\Controllers\SocialiteController;

Route::get('/auth/google', [SocialiteController::class, 'redirect'])->name('google.login');
Route::get('/auth/google/callback', [SocialiteController::class, 'callback']);

require __DIR__.'/auth.php';