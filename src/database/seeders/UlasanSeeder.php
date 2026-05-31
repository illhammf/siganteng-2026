<?php

namespace Database\Seeders;

use App\Models\Ulasan;
use Illuminate\Database\Seeder;

class UlasanSeeder extends Seeder
{
    public function run(): void
    {
        Ulasan::insert([
            [
                'pelanggan_id' => 1,
                'reservasi_id' => 1,
                'rating' => 5,
                'komentar' => 'Pelayanan sangat memuaskan dan hasil potong rambut rapi.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}