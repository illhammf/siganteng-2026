<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $fillable = [
        'reservasi_id',
        'jumlah_bayar',
        'metode_pembayaran',
        'status_pembayaran',
        'tanggal_pembayaran',
    ];

    public function reservasi()
    {
        return $this->belongsTo(Reservasi::class);
    }
}