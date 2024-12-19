<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pinjam extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'jumlah_peminjaman_kendaraan', 'keperluan_peminjaman', 'tanggal_waktu_peminjaman', 'user_id', 'status_laporan', 'pengembalian_id', 'kendaraan_id', 'kendaraan'
    ];

    public function kendaraan(): BelongsTo
    {
        return $this->belongsTo(Kendaraan::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function pengembalian(): BelongsTo
    {
        return $this->belongsTo(Pengembalian::class);
    }

}
