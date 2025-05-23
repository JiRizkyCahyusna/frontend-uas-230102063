<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\KelasController;
Route::get('/', function () {
    return view('dashboard');
});
    Route::resource('matkul', MatkulController::class);
    Route::resource('mahasiswa', MahasiswaController::class);
    Route::resource('kelas', KelasController::class);
    Route::get('/mahasiswa/export-pdf', [MahasiswaController::class, 'exportPdf'])->name('mahasiswa.exportPdf');

    