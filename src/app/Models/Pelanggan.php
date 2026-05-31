<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $fillable = [
        'nama',
        'email',
        'nomor_telepon',
        'alamat',
    ];

    public function reservasis()
    {
        return $this->hasMany(Reservasi::class);
    }

    public function ulasans()
    {
        return $this->hasMany(Ulasan::class);
    }
}