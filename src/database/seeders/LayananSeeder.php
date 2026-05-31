<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Layanan;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Layanan::insert([
            [
                'nama_layanan' => 'Potong Rambut',
                'deskripsi' => 'Layanan potong rambut untuk pria dan wanita.',
                'durasi_menit' => 30,
                'harga' => 35000,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'nama_layanan' => 'Cukur Jenggot',
                'deskripsi' => 'Layanan cukur jenggot untuk pria.',
                'durasi_menit' => 15,
                'harga' => 20000,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'nama_layanan' => 'Pewarnaan Rambut',
                'deskripsi' => 'Layanan pewarnaan rambut dengan berbagai pilihan warna.',
                'durasi_menit' => 60,
                'harga' => 150000,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'nama_layanan' => 'Hair Spa',
                'deskripsi' => 'Layanan perawatan rambut untuk menjaga kesehatan dan kelembutan rambut.',
                'durasi_menit' => 45,
                'harga' => 80000,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
