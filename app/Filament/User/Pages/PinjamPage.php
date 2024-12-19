<?php

namespace App\Filament\User\Pages;

use Filament\Pages\Page;
use App\Models\Kendaraan;
use App\Models\Pinjam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PinjamPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.user.pages.pinjam-page';
    protected static ?string $navigationLabel = 'Pinjam Kendaraan';

    public function getVehicles()
    {
        return Kendaraan::all();
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $validated = $request->validate([
            'kendaraan_id' => 'required|exists:kendaraans,id',
        ]);

        // Simpan transaksi peminjaman
        Pinjam::create([
            'user_id' => Auth::id(),
            'kendaraan_id' => $request->kendaraan_id,
            'tanggal_waktu_peminjaman' => now(),
            'barcode' => uniqid(),
        ]);

        // Update status kendaraan menjadi 'rented'
        $vehicle = Kendaraan::find($request->kendaraan_id);
        $vehicle->status = 'rented';
        $vehicle->save();

        // Redirect dengan pesan sukses
        session()->flash('success', 'Kendaraan berhasil dipinjam.');
        return redirect()->route('filament.pages.pinjam-page');
    }
}
