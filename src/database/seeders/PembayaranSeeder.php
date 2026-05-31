<?php

namespace Database\Seeders;

use App\Models\Pembayaran;
use Illuminate\Database\Seeder;

class PembayaranSeeder extends Seeder
{
    public function run(): void
    {
        Pembayaran::insert([
            [
                'reservasi_id' => 1,
                'jumlah_bayar' => 35000,
                'metode_pembayaran' => 'qris',
                'status_pembayaran' => 'sudah_bayar',
                'tanggal_pembayaran' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'reservasi_id' => 2,
                'jumlah_bayar' => 75000,
                'metode_pembayaran' => 'cash',
                'status_pembayaran' => 'belum_bayar',
                'tanggal_pembayaran' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}