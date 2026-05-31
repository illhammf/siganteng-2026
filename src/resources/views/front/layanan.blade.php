<section id="layanan" class="section">
    <div class="container">
        <div class="section-heading center">
            <p class="subtitle">Layanan</p>
            <h2>Pilih layanan terbaik untuk penampilanmu.</h2>
        </div>

        <div class="card-grid">
            @forelse ($layanans as $layanan)
                <div class="service-card">
                    <div class="icon-box">✂</div>

                    <h3>{{ $layanan->nama_layanan }}</h3>

                    <p>
                        {{ $layanan->deskripsi ?? 'Layanan barbershop profesional untuk menunjang penampilan pelanggan.' }}
                    </p>

                    <div class="service-meta">
                        <span>{{ $layanan->durasi_menit }} menit</span>
                        <strong>Rp{{ number_format($layanan->harga, 0, ',', '.') }}</strong>
                    </div>
                </div>
            @empty
                <p class="empty-text">
                    Belum ada data layanan. Tambahkan data melalui admin Filament.
                </p>
            @endforelse
        </div>
    </div>
</section>