<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PPSDM')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7fa;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #003366;
            padding: 10px 30px;
        }

        .header img {
            height: 40px;
        }

        .header nav a {
            color: white;
            text-decoration: none;
            margin: 0 12px;
            font-weight: bold;
        }

        .header nav a:hover {
            text-decoration: underline;
        }

        main {
            max-width: 900px;
            margin: 40px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            flex-grow: 1;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        p, ul {
            font-size: 16px;
            line-height: 1.6;
        }

        ul {
            padding-left: 20px;
        }
    </style>

    @stack('styles')
</head>
<body>

    {{-- Header --}}
    <div class="header">
        <img src="{{ asset('images/logo.png') }}" alt="PPSDM Logo">
        <nav>
            <a href="{{ route('beranda') }}">Beranda</a>
            <a href="{{ route('berita') }}">Berita</a>
            <a href="{{ route('pengumuman') }}">Pengumuman</a>
            <a href="{{ route('lowongan') }}">Lowongan Pekerjaan</a>
            <a href="{{ route('tentang') }}">Tentang</a>
            <a href="{{ route('login') }}">Login</a>
        </nav>
    </div>

    {{-- Konten Halaman --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('components.footer')

    @stack('scripts')
</body>
</html>
