<?php

namespace Database\Seeders;

use App\Models\Reservasi;
use Illuminate\Database\Seeder;

class ReservasiSeeder extends Seeder
{
    public function run(): void
    {
        Reservasi::insert([
            [
                'pelanggan_id' => 1,
                'pegawai_id' => 1,
                'layanan_id' => 1,
                'tanggal_reservasi' => now()->toDateString(),
                'jam_reservasi' => '10:00:00',
                'status' => 'dikonfirmasi',
                'catatan' => 'Model rambut pendek',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pelanggan_id' => 2,
                'pegawai_id' => 2,
                'layanan_id' => 3,
                'tanggal_reservasi' => now()->addDay()->toDateString(),
                'jam_reservasi' => '14:00:00',
                'status' => 'menunggu',
                'catatan' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}