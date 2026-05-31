<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    protected $fillable = [
        'pelanggan_id',
        'pegawai_id',
        'layanan_id',
        'tanggal_reservasi',
        'jam_reservasi',
        'status',
        'catatan',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class);
    }

    public function ulasan()
    {
        return $this->hasOne(Ulasan::class);
    }
}