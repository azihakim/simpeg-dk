<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\CutiIzinController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\LatlongController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PromosiDemosiController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\RekrutmenController;
use App\Http\Controllers\ResignController;
use App\Http\Controllers\RewardPunishmentController;
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
    Route::prefix('rekrutmen')->group(function () {
        Route::get('/lowongan', [RekrutmenController::class, 'lowonganIndex'])->name('lowongan.index');
        Route::get('/lowongan/create', [RekrutmenController::class, 'lowonganCreate'])->name('lowongan.create');
        Route::post('/lowongan/store', [RekrutmenController::class, 'lowonganStore'])->name('lowongan.store');
        Route::get('/lowongan/show', [RekrutmenController::class, 'lowonganShow'])->name('lowongan.show');
        Route::get('/lowongan/edit/{id}', [RekrutmenController::class, 'lowonganEdit'])->name('lowongan.edit');
        Route::put('/lowongan/update/{id}', [RekrutmenController::class, 'lowonganUpdate'])->name('lowongan.update');
        Route::delete('/lowongan/{id}', [RekrutmenController::class, 'lowonganDestroy'])->name('lowongan.destroy');

        Route::get('/lamaran', [RekrutmenController::class, 'lamaranIndex'])->name('lamaran.index');
        Route::get('/lamaran/regist/{id}', [RekrutmenController::class, 'lamaranRegist'])->name('lamaran.regist');
        Route::post('/lamaran/store', [RekrutmenController::class, 'lamaranStore'])->name('lamaran.store');
        Route::get('/lamaran/edit/{id}', [RekrutmenController::class, 'lamaranEdit'])->name('lamaran.edit');
        Route::put('/lamaran/update/{id}', [RekrutmenController::class, 'lamaranUpdate'])->name('lamaran.update');
        Route::put('/lamaran/status/{id}', [RekrutmenController::class, 'lamaranStatus'])->name('lamaran.status');
    });
    Route::prefix('resign')->group(function () {
        Route::get('/index-resign', [ResignController::class, 'index'])->name('resign.index');
        Route::get('/create', [ResignController::class, 'create'])->name('resign.create');
        Route::post('/store', [ResignController::class, 'store'])->name('resign.store');
        Route::get('/edit/{id}', [ResignController::class, 'edit'])->name('resign.edit');
        Route::put('/update/{id}', [ResignController::class, 'update'])->name('resign.update');
        Route::delete('/destroy/{id}', [ResignController::class, 'destroy'])->name('resign.destroy');
        Route::put('/status/{id}', [ResignController::class, 'status'])->name('resign.status');
    });
    Route::prefix('rewardpunishment')->group(function () {
        Route::get('/index-rewardpunishment', [RewardPunishmentController::class, 'index'])->name('rewardpunishment.index');
        Route::get('/create', [RewardPunishmentController::class, 'create'])->name('rewardpunishment.create');
        Route::post('/store', [RewardPunishmentController::class, 'store'])->name('rewardpunishment.store');
        Route::get('/edit/{id}', [RewardPunishmentController::class, 'edit'])->name('rewardpunishment.edit');
        Route::put('/update/{id}', [RewardPunishmentController::class, 'update'])->name('rewardpunishment.update');
        Route::delete('/destroy/{id}', [RewardPunishmentController::class, 'destroy'])->name('rewardpunishment.destroy');
        Route::put('/status/{id}', [RewardPunishmentController::class, 'status'])->name('rewardpunishment.status');
    });
});
Route::get('/registrasi', [RegistrasiController::class, 'create'])->name('registrasi.form');
Route::post('/registrasi', [RegistrasiController::class, 'store'])->name('registrasi.store');
require __DIR__ . '/auth.php';
