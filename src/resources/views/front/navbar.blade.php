<header class="navbar">
    <div class="container nav-wrapper">
        <a href="#home" class="logo"><span>Si</span>Ganteng</a>

        <nav class="nav-menu" id="navMenu">
            <a href="#home">Home</a>
            <a href="#about">Tentang</a>
            <a href="#layanan">Layanan</a>
            <a href="#pegawai">Pegawai</a>
            <a href="#ulasan">Ulasan</a>
            <a href="#kontak">Kontak</a>

            @if (Route::has('filament.admin.auth.login'))
                @auth
                    <a href="{{ route('filament.admin.pages.dashboard') }}" class="btn-admin">Dashboard</a>
                @else
                    <a href="{{ route('filament.admin.auth.login') }}" class="btn-admin">Admin</a>
                @endauth
            @endif
        </nav>

        <button class="menu-toggle" id="menuToggle">☰</button>
    </div>
</header>