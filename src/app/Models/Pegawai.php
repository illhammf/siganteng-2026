<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $fillable = [
        'nama',
        'spesialisasi',
        'nomor_telepon',
        'gaji',
    ];

    public function reservasis()
    {
        return $this->hasMany(Reservasi::class);
    }
}