<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pegawai;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pegawai::insert([
            [
                'nama' => 'Ujang Bandot',
                'spesialisasi' => 'Fade Cut',
                'nomor_telepon' => '08111111111',
                'gaji' => '5000000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            [
                'nama' => 'Dudung Suryana',
                'spesialisasi' => 'Undercut',
                'nomor_telepon' => '08111111112',
                'gaji' => '5500000',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'nama' => 'Asep Sunandar',
                'spesialisasi' => 'Pompadour',
                'nomor_telepon' => '08111111113',
                'gaji' => '6000000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
