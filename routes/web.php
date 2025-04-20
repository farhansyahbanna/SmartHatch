<?php

use App\Http\Controllers\CekSuhuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LupaPasswordController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\SensorController;

// Route Autentikasi
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [MonitoringController::class, 'index'])->name('dashboard');
    Route::post('/set-mode', [MonitoringController::class, 'setMode'])->name('set-mode');
    Route::post('/control-actuator', [MonitoringController::class, 'controlActuator'])->name('control-actuator');

    //Route Read Suhu & Kelembaban
    Route::get('/api/sensor-latest', [SensorController::class, 'getLatestData'])->name('sensor.latest');

    //Route Pengaturan
    Route::get('/pengaturan', [PengaturanController::class, 'index'])->name('settings');
    // Route::put('/pengaturan/simpan', [PengaturanController::class, 'save'])->name('settings.save');

    //Route Riwayat
    Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat');
    //Route Notifikasi
    Route::get('/notifikasi', [NotifikasiController::class, 'index'])->name('notifikasi');
});


//Login

Route::redirect('/', '/login');


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//Lupa Password
Route::get('/reset-password', [LupaPasswordController::class, 'showForm'])->name('reset.form');
Route::post('/reset-password', [LupaPasswordController::class, 'reset'])->name('reset.submit');

//






