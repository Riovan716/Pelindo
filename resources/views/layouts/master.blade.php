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
            background: transparent;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            /* Batik Pelindo background */
            position: relative;
        }
        body::before {
            content: '';
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            z-index: 0;
            /* Batik benar-benar mentok ke kanan dan kiri */
            background:
                url('{{ asset('assets/images/BatikPelindo.jpeg') }}') left 0 top/auto 100% no-repeat,
                url('{{ asset('assets/images/BatikPelindo.jpeg') }}') right 0 top/auto 100% no-repeat;
            opacity: 0.14;
            pointer-events: none;
        }
        .header, main, .footer, .branding, nav, .header-top, .header-bottom {
            position: relative;
            z-index: 1;
        }
        .header {
            background: #fff;
            display: flex;
            flex-direction: column;
            box-shadow: 0 2px 8px rgba(0,0,0,0.03);
            padding: 0;
            border-bottom: 1.5px solid #e0e0e0;
        }
        .header-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 18px 48px 10px 48px;
        }
        .branding {
            display: flex;
            align-items: center;
            gap: 18px;
        }
        .branding img {
            height: 44px;
        }
        .branding-text {
            display: flex;
            flex-direction: column;
            line-height: 1.2;
        }
        .branding-text .ppsdm-text {
            font-weight: bold;
            font-size: 22px;
            font-style: italic;
            color: #0070c9;
            letter-spacing: 1px;
        }
        .branding-text .subtitle {
            font-size: 13px;
            font-weight: 400;
            color: #0070c9;
        }
        .nav-top-links {
            display: flex;
            gap: 24px;
            align-items: center;
        }
        .nav-top-links a {
            color: #7a7a7a;
            font-size: 15px;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s;
        }
        .nav-top-links a:hover {
            color: #0070c9;
        }
        .header-separator {
            border: none;
            border-top: 2px solid #0070c9;
            margin: 0 0 0 0;
            width: 100%;
        }
        .header-bottom {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            padding: 0 48px 0 48px;
            background: #fff;
        }
        nav {
            display: flex;
            gap: 32px;
        }
        nav a {
            color: #0070c9;
            text-decoration: none;
            font-weight: 600;
            font-size: 16px;
            position: relative;
            padding: 18px 0 12px 0;
            transition: color 0.2s;
        }
        nav a:hover,
        nav a.active {
            color: #005fa3;
        }
        nav a.active::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: 6px;
            width: 100%;
            height: 2px;
            background-color: #0070c9;
            border-radius: 2px;
        }
        main {
            width: 100%;
            padding: 40px 60px;
            background: transparent; 
            box-shadow: none;
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
        .nav-toggle-btn {
            display: none;
            background: #0070c9;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 22px;
            cursor: pointer;
            box-shadow: 0 2px 8px #0070c91a;
            transition: background 0.2s;
            position: absolute;
            right: 24px;
            top: 18px;
            z-index: 1002;
        }
        .nav-toggle-btn:hover {
            background: #005fa3;
        }
        nav {
            display: flex;
            gap: 32px;
            transition: max-height 0.3s, opacity 0.3s;
        }
        @media (max-width: 900px) {
            .header-top {
                flex-direction: row;
                align-items: flex-start;
                position: relative;
            }
            .nav-toggle-btn {
                display: block;
            }
            nav {
                flex-direction: column;
                position: absolute;
                right: 0;
                top: 60px;
                background: #fff;
                box-shadow: 0 8px 32px rgba(0,112,201,0.10);
                border-radius: 0 0 16px 16px;
                width: 210px;
                max-height: 0;
                overflow: hidden;
                opacity: 0;
                z-index: 1001;
                gap: 0;
                padding: 0;
            }
            nav.open {
                max-height: 500px;
                opacity: 1;
                padding: 12px 0 12px 0;
            }
            nav a {
                display: block;
                padding: 14px 28px;
                color: #0070c9;
                font-size: 16px;
                border-bottom: 1px solid #e0e0e0;
                background: #fff;
            }
            nav a:last-child {
                border-bottom: none;
            }
        }
    </style>

    @stack('styles')
</head>
<body>

    {{-- Header --}}
    <div class="header">
        <div style="display: flex; justify-content: space-between; align-items: center; padding: 18px 48px 10px 48px; background: transparent; position:relative;" class="header-top">
            <a href="{{ route('beranda') }}" style="text-decoration:none;color:inherit;display:flex;align-items:center;gap:18px;cursor:pointer;">
                <div class="branding" style="display:flex;align-items:center;gap:14px;">
                    <img src="{{ asset('assets/images/ppsdm-logo.png') }}" alt="Logo PPSDM" style="height:44px;">
                    <div class="branding-text">
                        <span class="ppsdm-text">PPSDM</span>
                        <span class="subtitle">Pengelolaan & Pembelajaran<br>Sumber Daya Manusia</span>
                    </div>
                </div>
            </a>
            <button class="nav-toggle-btn" id="navToggleBtn" aria-label="Toggle Navigation">
                <i class='bx bx-menu'></i>
            </button>
            <nav id="mainNav">
                <a href="{{ route('beranda') }}" class="{{ request()->routeIs('beranda') ? 'active' : '' }}">Beranda</a>
                <a href="{{ route('berita.public') }}" class="{{ request()->routeIs('berita') ? 'active' : '' }}">Berita</a>
                <a href="{{ route('pengumuman') }}" class="{{ request()->routeIs('pengumuman') ? 'active' : '' }}">Pengumuman</a>
                <a href="{{ route('lowongan') }}" class="{{ request()->routeIs('lowongan') ? 'active' : '' }}">Lowongan Magang</a>
                <a href="{{ route('rekomendasi') }}" class="{{ request()->routeIs('rekomendasi') ? 'active' : '' }}">Rekomendasi Magang</a>
                <a href="{{ route('tentang') }}" class="{{ request()->routeIs('tentang') ? 'active' : '' }}">Tentang</a>
                <a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'active' : '' }}">Login</a>
            </nav>
        </div>
    </div>
    <script>
        const navBtn = document.getElementById('navToggleBtn');
        const nav = document.getElementById('mainNav');
        navBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            nav.classList.toggle('open');
        });
        // Hapus event listener document click yang menutup menu jika klik di luar nav/navBtn
        // Tutup menu jika link diklik (mobile)
        nav.querySelectorAll('a').forEach(function(link) {
            link.addEventListener('click', function() {
                if(window.innerWidth <= 900) nav.classList.remove('open');
            });
        });
    </script>

    {{-- Konten Halaman --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('components.footer')

    @stack('scripts')
</body>
</html>
