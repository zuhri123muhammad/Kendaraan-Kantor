<?php

use App\Http\Controllers\User\PinjamController;
use App\Http\Controllers\User\PengembalianController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:user'])->group(function() {
    Route::get('/pinjam', [PinjamController::class, 'index'])->name('user.pinjam');
    Route::post('/pinjam', [PinjamController::class, 'store'])->name('user.pinjam.store');

    Route::get('/pengembalian', [PengembalianController::class, 'index'])->name('user.pengembalian');
    Route::post('/pengembalian', [PengembalianController::class, 'store'])->name('user.pengembalian.store');
});
