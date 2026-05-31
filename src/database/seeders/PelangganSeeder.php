<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pelanggan;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pelanggan::insert([
            [
                'nama' => 'Ilham Firmansyah',
                'email' => 'ilhamganteng@gmail.com',
                'nomor_telepon' => '081234567890',
                'alamat' => 'Curug, Tangerang, Banten',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'nama' => 'Annisa Zahra Fauziah',
                'email' => 'annisa.zahra@gmail.com',
                'nomor_telepon' => '081234567891',
                'alamat' => 'Kelapa Dua, Tangerang, Banten',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'nama' => 'Misel Oktaviani Putri',
                'email' => 'misel.oktaviani@gmail.com',
                'nomor_telepon' => '081234567892',
                'alamat' => 'Cisoka, Tangerang, Banten',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
