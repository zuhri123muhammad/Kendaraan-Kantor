<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kendaraan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'no_plat', 'jenis_kendaraan', 'merek_model'
    ];

    public function pinjam(): HasMany
    {
        return $this->hasMany(Pinjam::class);
    }


}
