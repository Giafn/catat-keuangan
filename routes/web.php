<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TabunganController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('tabungans', [TabunganController::class, 'index'])->name('tabungans.index');
    Route::get('tabungans/create', [TabunganController::class, 'create'])->name('tabungans.create');
    Route::post('tabungans/store', [TabunganController::class, 'store'])->name('tabungans.store');
    Route::get('tabungans/{id}', [TabunganController::class, 'show'])->name('tabungans.show');
    Route::get('tabungans/{id}/setting', [TabunganController::class, 'edit'])->name('tabungans.edit');
    Route::patch('tabungans/{id}', [TabunganController::class, 'update'])->name('tabungans.update');
    Route::delete('tabungans/{id}', [TabunganController::class, 'destroy'])->name('tabungans.destroy');

    Route::get('transaksis/create/{tabunganId}', [TransaksiController::class, 'create'])->name('transaksis.create');
    Route::post('transaksis/store/{tabunganId}', [TransaksiController::class, 'store'])->name('transaksis.store');
    Route::get('transaksis/{id}', [TransaksiController::class, 'show'])->name('transaksis.show');
    Route::delete('transaksis/{id}', [TransaksiController::class, 'destroy'])->name('transaksis.destroy');

    Route::get('setting', [SettingController::class, 'index'])->name('setting.index');

    Route::get('success-transaction', function () {
        return view('page.success');
    })->name('success');
});

require __DIR__.'/auth.php';
