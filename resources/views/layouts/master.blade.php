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
            padding: 12px 40px;
            background: linear-gradient(to bottom, #365486 0%, #7FC7D9 100%);
        }

        .branding {
            display: flex;
            align-items: center;
            gap: 12px;
            color: white;
        }

        .branding img {
            height: 36px;
        }

        .branding-text {
            display: flex;
            flex-direction: column;
            line-height: 1.2;
        }

        .branding-text .ppsdm-text {
            font-weight: bold;
            font-size: 20px;
            font-style: italic;
        }

        .branding-text .subtitle {
            font-size: 12px;
            font-weight: 400;
        }

        nav {
            display: flex;
            gap: 20px;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            font-size: 16px;
            position: relative;
        }

        nav a:hover,
        nav a.active {
            font-weight: bold;
        }

        nav a.active::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -6px;
            width: 100%;
            height: 2px;
            background-color: white;
            border-radius: 2px;
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
        <div class="branding">
            <img src="{{ asset('assets/images/Logo-BUMN.png') }}" alt="Logo BUMN">
            <img src="{{ asset('assets/images/ppsdm-logo.png') }}" alt="Logo PPSDM">
            <div class="branding-text">
                <span class="ppsdm-text">PPSDM</span>
                <span class="subtitle">Pengelolaan & Pembelajaran<br>Sumber Daya Manusia</span>
            </div>
        </div>

        <nav>
            <a href="{{ route('beranda') }}" class="{{ request()->routeIs('beranda') ? 'active' : '' }}">Beranda</a>
            <a href="{{ route('berita.public') }}" class="{{ request()->routeIs('berita') ? 'active' : '' }}">Berita</a>
            <a href="{{ route('pengumuman') }}" class="{{ request()->routeIs('pengumuman') ? 'active' : '' }}">Pengumuman</a>
            <a href="{{ route('lowongan') }}" class="{{ request()->routeIs('lowongan') ? 'active' : '' }}">Lowongan Magang</a>
            <a href="{{ route('tentang') }}" class="{{ request()->routeIs('tentang') ? 'active' : '' }}">Tentang</a>
            <a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'active' : '' }}">Login</a>
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
