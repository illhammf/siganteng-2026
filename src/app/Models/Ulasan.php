<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    protected $fillable = [
        'pelanggan_id',
        'reservasi_id',
        'rating',
        'komentar',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function reservasi()
    {
        return $this->belongsTo(Reservasi::class);
    }
}