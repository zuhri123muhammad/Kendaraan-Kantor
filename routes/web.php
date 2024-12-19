<?php

use Illuminate\Support\Facades\Route;
use App\Filament\User\Pages\PinjamPage;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth'])->group(function () {
    // Halaman Peminjaman

    Route::post('/filament/user/pages/pinjam-page/store', [PinjamPage::class, 'store'])->name('filament.user.pages.pinjam-page.store');
});
