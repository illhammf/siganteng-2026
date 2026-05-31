<section id="home" class="hero">
    <div class="container hero-wrapper">
        <div class="hero-content">
            <p class="badge">Booking Barbershop Online</p>
            <h1>Tampil Rapi, Percaya Diri, dan Makin Ganteng.</h1>
            <p>
                Si Ganteng adalah sistem reservasi barbershop berbasis web yang memudahkan pelanggan
                memilih layanan, menentukan jadwal, memilih pegawai, dan melakukan reservasi secara praktis.
            </p>

            <div class="hero-buttons">
                <a href="#layanan" class="btn-primary">Lihat Layanan</a>
                <a href="#kontak" class="btn-secondary">Hubungi Kami</a>
            </div>
        </div>

        <div class="hero-card">
            <h3>Reservasi Cepat</h3>
            <p>Pilih layanan favoritmu dan datang sesuai jadwal.</p>

            <div class="hero-info">
                <span>Total Layanan</span>
                <strong>{{ $layanans->count() }}</strong>
            </div>

            <div class="hero-info">
                <span>Total Pegawai</span>
                <strong>{{ $pegawais->count() }}</strong>
            </div>

            <div class="hero-info">
                <span>Jam Operasional</span>
                <strong>09.00 - 21.00</strong>
            </div>
        </div>
    </div>
</section>