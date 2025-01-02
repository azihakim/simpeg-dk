<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\CutiIzinController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\LatlongController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PromosiDemosiController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });



Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('master');
    });
    Route::post('/absensi', [AbsensiController::class, 'store'])->name('absensi.store');

    Route::prefix('absensi')->group(function () {
        Route::get('/index-absensi', [AbsensiController::class, 'index'])->name('absensi.index');
    });

    // Route::get('/office-location', function () {
    //     return response()->json([
    //         'latitude' => -2.9095937,
    //         'longitude' => 104.6833956,
    //     ]);
    // })->name('office-location');
    Route::get('/office-location', [LatlongController::class, 'getLokasi'])->name('office-location');
    Route::resource('location', LatlongController::class);

    Route::resource('jabatan', JabatanController::class);
    Route::resource('karyawan', KaryawanController::class);

    Route::prefix('cutiizin')->group(function () {
        Route::get('/index-cutiizin', [CutiIzinController::class, 'index'])->name('cutiizin.index');
        Route::get('/create', [CutiIzinController::class, 'create'])->name('cutiizin.create');
        Route::post('/store', [CutiIzinController::class, 'store'])->name('cutiizin.store');
        Route::get('/edit/{id}', [CutiIzinController::class, 'edit'])->name('cutiizin.edit');
        Route::put('/update/{id}', [CutiIzinController::class, 'update'])->name('cutiizin.update');
        Route::delete('/destroy/{id}', [CutiIzinController::class, 'destroy'])->name('cutiizin.destroy');
        Route::put('/status/{id}', [CutiIzinController::class, 'status'])->name('cutiizin.status');
    });
    Route::prefix('promosidemosi')->group(function () {
        Route::get('/index-promosidemosi', [PromosiDemosiController::class, 'index'])->name('promosidemosi.index');
        Route::get('/create', [PromosiDemosiController::class, 'create'])->name('promosidemosi.create');
        Route::post('/store', [PromosiDemosiController::class, 'store'])->name('promosidemosi.store');
        Route::get('/edit/{id}', [PromosiDemosiController::class, 'edit'])->name('promosidemosi.edit');
        Route::put('/update/{id}', [PromosiDemosiController::class, 'update'])->name('promosidemosi.update');
        Route::delete('/destroy/{id}', [PromosiDemosiController::class, 'destroy'])->name('promosidemosi.destroy');
        Route::put('/status/{id}', [PromosiDemosiController::class, 'status'])->name('promosidemosi.status');
    });
});
require __DIR__ . '/auth.php';
