<section id="kontak" class="section contact">
    <div class="container contact-wrapper">
        <div>
            <p class="subtitle">Kontak</p>
            <h2>Ingin reservasi atau bertanya dulu?</h2>
            <p>
                Silakan hubungi kami melalui form berikut. Pesan yang dikirim akan masuk ke admin
                dan dapat dikelola melalui Filament.
            </p>

            <div class="contact-info">
                <p><strong>Alamat:</strong> Tangerang, Banten</p>
                <p><strong>WhatsApp:</strong> 0895-3369-00466</p>
                <p><strong>Email:</strong> siganteng.official@gmail.com</p>
            </div>
        </div>

        <div>
            @if (session('success'))
                <div class="alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form class="contact-form" method="POST" action="{{ route('kontak.store') }}">
                @csrf

                <input type="text" name="nama" placeholder="Nama Lengkap" value="{{ old('nama') }}" required>
                @error('nama')
                    <small class="error-text">{{ $message }}</small>
                @enderror

                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                @error('email')
                    <small class="error-text">{{ $message }}</small>
                @enderror

                <input type="text" name="nomor_telepon" placeholder="Nomor Telepon" value="{{ old('nomor_telepon') }}">

                <input type="text" name="subjek" placeholder="Subjek" value="{{ old('subjek') }}" required>
                @error('subjek')
                    <small class="error-text">{{ $message }}</small>
                @enderror

                <textarea name="pesan" rows="5" placeholder="Tulis pesan kamu..." required>{{ old('pesan') }}</textarea>
                @error('pesan')
                    <small class="error-text">{{ $message }}</small>
                @enderror

                <button type="submit">Kirim Pesan</button>
            </form>
        </div>
    </div>
</section>