<section id="ulasan" class="section">
    <div class="container">
        <div class="section-heading center">
            <p class="subtitle">Ulasan</p>
            <h2>Apa kata pelanggan kami?</h2>
        </div>

        <div class="review-grid">
            @forelse ($ulasans as $ulasan)
                <div class="review-card">
                    <div class="stars">
                        {{ str_repeat('★', $ulasan->rating) }}
                    </div>

                    <p>
                        “{{ $ulasan->komentar ?? 'Pelayanan sangat baik dan hasil potong rambut memuaskan.' }}”
                    </p>

                    <h4>{{ $ulasan->pelanggan->nama ?? 'Pelanggan' }}</h4>
                    <span>{{ $ulasan->reservasi->layanan->nama_layanan ?? 'Layanan Barbershop' }}</span>
                </div>
            @empty
                <p class="empty-text">
                    Belum ada ulasan pelanggan.
                </p>
            @endforelse
        </div>
    </div>
</section>