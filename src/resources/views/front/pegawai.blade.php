<section id="pegawai" class="section dark-section">
    <div class="container">
        <div class="section-heading center">
            <p class="subtitle">Pegawai</p>
            <h2>Ditangani oleh barber yang berpengalaman.</h2>
        </div>

        <div class="card-grid">
            @forelse ($pegawais as $pegawai)
                <div class="employee-card">
                    <div class="avatar">
                        {{ strtoupper(substr($pegawai->nama, 0, 1)) }}
                    </div>

                    <h3>{{ $pegawai->nama }}</h3>
                    <p>{{ $pegawai->spesialisasi ?? 'General Barber' }}</p>
                    <span>{{ $pegawai->nomor_telepon ?? 'Nomor belum tersedia' }}</span>
                </div>
            @empty
                <p class="empty-text white">
                    Belum ada data pegawai. Tambahkan data melalui admin Filament.
                </p>
            @endforelse
        </div>
    </div>
</section>