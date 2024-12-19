<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KaryawanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('master');
});
Route::post('/absensi', [AbsensiController::class, 'store'])->name('absensi.store');

Route::prefix('absensi')->group(function () {
    Route::get('/', [AbsensiController::class, 'index'])->name('absensi.index');
});

Route::get('/office-location', function () {
    return response()->json([
        'latitude' => -3.002354,
        'longitude' => 104.725533,
    ]);
})->name('office-location');

Route::resource('jabatan', JabatanController::class);
Route::resource('karyawan', KaryawanController::class);
