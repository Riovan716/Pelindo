<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Dashboard')</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #1f1f1f;
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            margin: 0;
            font-size: 20px;
            letter-spacing: 1px;
        }

        .header nav {
            display: flex;
            gap: 15px;
        }

        .header nav a {
            color: white;
            text-decoration: none;
            padding: 8px 14px;
            border-radius: 4px;
            transition: background 0.3s;
        }

        .header nav a:hover {
            background-color: #3a3a3a;
        }

        main {
            max-width: 1000px;
            margin: 30px auto;
            background-color: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        h1 {
            margin-top: 0;
            font-size: 24px;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>Admin Panel</h1>
        <nav>
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a href="{{ route('admin.berita.index') }}">Berita</a>
            <a href="{{ route('admin.pengumuman') }}">Tambah Pengumuman</a>
            <a href="{{ route('admin.lowongan') }}">Tambah Lowongan</a>
            <a href="{{ route('admin.tentang') }}">Tambah Tentang</a>
            <a href="{{ route('actionlogout') }}">Logout</a>
        </nav>
    </div>

    <main>
        @yield('content')
    </main>

</body>
</html>
