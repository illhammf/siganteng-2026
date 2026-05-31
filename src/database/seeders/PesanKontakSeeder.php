<?php

namespace Database\Seeders;

use App\Models\PesanKontak;
use Illuminate\Database\Seeder;

class PesanKontakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PesanKontak::insert([
            [
                'nama' => 'Ilham Firmansyah',
                'email' => 'ilham@example.com',
                'nomor_telepon' => '081234567890',
                'subjek' => 'Reservasi Potong Rambut',
                'pesan' => 'Halo admin, apakah saya bisa melakukan reservasi untuk hari Sabtu pukul 10.00?',
                'status' => 'belum_dibaca',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Budi Santoso',
                'email' => 'budi@example.com',
                'nomor_telepon' => '081298765432',
                'subjek' => 'Informasi Hair Spa',
                'pesan' => 'Apakah layanan Hair Spa tersedia setiap hari dan berapa durasinya?',
                'status' => 'sudah_dibaca',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Andi Saputra',
                'email' => 'andi@example.com',
                'nomor_telepon' => '082112345678',
                'subjek' => 'Harga Beard Styling',
                'pesan' => 'Saya ingin mengetahui harga terbaru untuk layanan Beard Styling.',
                'status' => 'belum_dibaca',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}