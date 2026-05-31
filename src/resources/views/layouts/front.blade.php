<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Si Ganteng Barbershop' }}</title>

    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
</head>
<body>

    @include('front.navbar')

    <main>
        @yield('content')
    </main>

    @include('front.footer')

    <script src="{{ asset('front/js/script.js') }}"></script>
</body>
</html>