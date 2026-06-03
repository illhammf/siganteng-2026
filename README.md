# 💈 Si Ganteng Barbershop

<p align="center">
  Sistem Reservasi Barbershop Berbasis Web yang memudahkan pelanggan melakukan booking layanan secara cepat, praktis, dan modern.
</p>

---

## 📖 Tentang Proyek

**Si Ganteng Barbershop** merupakan aplikasi web yang dirancang untuk membantu proses reservasi layanan barbershop secara online.

Melalui sistem ini, pelanggan dapat melihat layanan yang tersedia, memilih barber, menentukan jadwal reservasi, memberikan ulasan, serta menghubungi admin melalui website.

Selain itu, admin dapat mengelola seluruh data melalui panel **Filament Admin** yang modern dan mudah digunakan.

---

## ✨ Fitur Utama

### 👤 Manajemen Pelanggan
- Menambah data pelanggan
- Mengubah data pelanggan
- Menghapus data pelanggan
- Melihat daftar pelanggan

### 💇 Manajemen Pegawai
- Mengelola data barber/pegawai
- Menentukan spesialisasi pegawai
- Status pegawai aktif/nonaktif

### ✂️ Manajemen Layanan
- Menambah layanan barbershop
- Menentukan harga layanan
- Menentukan durasi layanan
- Status ketersediaan layanan

### 📅 Reservasi Online
- Booking layanan
- Memilih pegawai
- Menentukan tanggal reservasi
- Menentukan jam reservasi
- Status reservasi

### 💳 Pembayaran
- Mencatat pembayaran pelanggan
- Metode pembayaran
- Status pembayaran
- Riwayat pembayaran

### ⭐ Ulasan Pelanggan
- Rating layanan
- Komentar pelanggan
- Riwayat ulasan

### 📩 Pesan Kontak
- Form kontak website
- Pesan masuk ke admin
- Status pesan (Belum Dibaca / Sudah Dibaca)

---

## 🛠️ Teknologi Yang Digunakan

| Teknologi | Keterangan |
|------------|------------|
| Laravel 12 | Backend Framework |
| Filament | Admin Panel |
| MariaDB | Database |
| Docker | Containerization |
| Nginx | Web Server |
| PHP 8+ | Programming Language |
| Blade | Template Engine |
| CSS | Styling |
| JavaScript | Interaktivitas |

---

## 🗄️ Struktur Database

### Pelanggan
- nama
- email
- nomor_telepon
- alamat

### Pegawai
- nama
- spesialisasi
- nomor_telepon
- status

### Layanan
- nama_layanan
- deskripsi
- durasi_menit
- harga
- status

### Reservasi
- pelanggan_id
- pegawai_id
- layanan_id
- tanggal_reservasi
- jam_reservasi
- status_reservasi
- catatan

### Pembayaran
- reservasi_id
- jumlah_bayar
- metode_pembayaran
- status_pembayaran
- bukti_pembayaran

### Ulasan
- pelanggan_id
- reservasi_id
- rating
- komentar

### Pesan Kontak
- nama
- email
- nomor_telepon
- subjek
- pesan
- status

---

## 🚀 Instalasi

Clone repository:

```bash
git clone https://github.com/illhammf/siganteng-2026.git
```

Masuk ke folder project:

```bash
cd siganteng-2026
```

Jalankan container:

```bash
dcu
```

Inisialisasi project:

```bash
dci
```

Jalankan migration dan seeder:

```bash
dca migrate:fresh --seed
```

Buat symbolic link storage:

```bash
dca storage:link
```

---

## 🔧 Perintah Boilerplate

### Menjalankan Docker

```bash
dcu
```

### Menghentikan Docker

```bash
dcd
```

### Membuat Resource Lengkap

```bash
dcm NamaModel
```

### Menjalankan Artisan

```bash
dca
```

Contoh:

```bash
dca make:model Test
```

### Git Add + Commit + Push

```bash
dcp "update project"
```

---

## 📷 Tampilan Sistem

### Landing Page
- Hero Section
- Tentang Kami
- Daftar Layanan
- Pegawai
- Ulasan
- Kontak

### Admin Panel
- Dashboard
- Pelanggan
- Pegawai
- Layanan
- Reservasi
- Pembayaran
- Ulasan
- Pesan Kontak

---

## 🎯 Tujuan Proyek

- Mempermudah proses reservasi barbershop
- Mengurangi antrean pelanggan
- Mempermudah pengelolaan data layanan
- Meningkatkan kualitas pelayanan pelanggan
- Menyediakan sistem administrasi yang terintegrasi

---

## 👨‍💻 Developer

**Ilham Firmansyah**

Mahasiswa Teknik Informatika  
Universitas Esa Unggul

GitHub:
https://github.com/illhammf

---

## 📜 License

Project ini dibuat untuk mengisi waktu luang

---

⭐ Jika repository ini bermanfaat, jangan lupa berikan Star.
Terimakasih hehe :)