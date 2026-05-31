<?php

use Illuminate\Support\Facades\Route;
use App\Models\Layanan;
use App\Models\Pegawai;
use App\Models\Ulasan;
use App\Models\PesanKontak;

Route::get('/', function () {
    return view('welcome', [
        'layanans' => Layanan::latest()->get(),
        'pegawais' => Pegawai::latest()->get(),
        'ulasans' => Ulasan::with(['pelanggan', 'reservasi.layanan'])
            ->latest()
            ->take(6)
            ->get(),
    ]);
});

Route::post('/kontak', function () {
    request()->validate([
        'nama' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'nomor_telepon' => 'nullable|string|max:20',
        'subjek' => 'required|string|max:255',
        'pesan' => 'required|string',
    ]);

    PesanKontak::create([
        'nama' => request('nama'),
        'email' => request('email'),
        'nomor_telepon' => request('nomor_telepon'),
        'subjek' => request('subjek'),
        'pesan' => request('pesan'),
        'status' => 'belum_dibaca',
    ]);

    return redirect('/#kontak')->with('success', 'Pesan berhasil dikirim. Terima kasih sudah menghubungi Si Ganteng!');
})->name('kontak.store');