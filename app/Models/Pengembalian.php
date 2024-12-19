<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pengembalian extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'tanggal_waktu_laporan', 'kondisi_kendaraan', 'pinjam_id'
    ];

    public function karyawan()
    {
        return $this->belongsTo(Pinjam::class);
    }

}
