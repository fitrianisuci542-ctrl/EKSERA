<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\EkskulController;
use App\Http\Controllers\PembinaController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminPendaftaranController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\ProfilSiswaController;

// HALAMAN UTAMA EKSERA
Route::redirect('/', '/login');

// LOGIN
Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

// REGISTER
Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.process');

// ROUTE SETELAH LOGIN
Route::middleware('auth')->group(function () {

    // DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/dashboard-admin', [DashboardController::class, 'admin'])
        ->name('dashboard.admin');

    Route::get('/dashboard-pembina', [DashboardController::class, 'pembina'])
        ->name('dashboard.pembina');

    Route::get('/dashboard-siswa', [DashboardController::class, 'siswa'])
        ->name('dashboard.siswa');

    // LOGOUT
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    // DATA SISWA
    Route::resource('siswa', SiswaController::class);

    // EKSTRAKURIKULER
    Route::resource('ekskul', EkskulController::class);

    // DATA PEMBINA
    Route::resource('pembina', PembinaController::class);

    // PENDAFTARAN SISWA
    Route::get('/pendaftaran', [PendaftaranController::class, 'index'])
        ->name('pendaftaran.index');

    Route::post('/pendaftaran/{ekskul}', [PendaftaranController::class, 'store'])
        ->name('pendaftaran.store');

    Route::get('/pendaftaran-saya', [PendaftaranController::class, 'saya'])
        ->name('pendaftaran.saya');

    Route::delete('/pendaftaran/{pendaftaran}', [PendaftaranController::class, 'destroy'])
        ->name('pendaftaran.destroy');

    // KELOLA PENDAFTARAN ADMIN
    Route::get('/admin/pendaftaran', [AdminPendaftaranController::class, 'index'])
        ->name('admin.pendaftaran.index');

    Route::put('/admin/pendaftaran/{pendaftaran}', [AdminPendaftaranController::class, 'update'])
        ->name('admin.pendaftaran.update');

    Route::delete('/admin/pendaftaran/{pendaftaran}', [AdminPendaftaranController::class, 'destroy'])
        ->name('admin.pendaftaran.destroy');

    // ABSENSI
    Route::get('/dashboard-absensi', [AbsensiController::class, 'dashboard'])
        ->name('absensi.dashboard');

    Route::get('/absensi', [AbsensiController::class, 'index'])
        ->name('absensi.index');

    Route::post('/absensi', [AbsensiController::class, 'store'])
        ->name('absensi.store');

    Route::get('/absensi/riwayat', [AbsensiController::class, 'riwayat'])
        ->name('absensi.riwayat');

    // EVENT
    Route::resource('event', EventController::class);

    // JADWAL LATIHAN
    Route::get('/jadwal', [JadwalController::class, 'index'])
        ->name('jadwal.index');

    // PROFIL SISWA
    Route::get('/profil-saya', [ProfilSiswaController::class, 'index'])
        ->name('profil.siswa');

    Route::put('/profil-saya', [ProfilSiswaController::class, 'update'])
        ->name('profil.siswa.update');

});
