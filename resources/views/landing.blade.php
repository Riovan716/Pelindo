<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        /* General Styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7fa;
        }

        /* Header Section */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #003366;
            padding: 10px 20px;
        }
        .header img {
            width: 150px;
        }
        .header nav a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
        }
        .header nav a:hover {
            text-decoration: underline;
        }

        /* Banner Section */
        .banner {
            background-color: #009cdb;
            padding: 80px 20px;
            text-align: center;
            color: white;
        }
        .banner h1 {
            font-size: 36px;
            margin-bottom: 10px;
        }
        .banner p {
            font-size: 20px;
        }

        /* Button Styling */
        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 30px;
            background-color: #3490dc;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 18px;
        }
        .btn:hover {
            background-color: #2779bd;
        }

        /* Section Styling */
        .section-title {
            font-size: 28px;
            text-align: center;
            margin: 20px 0;
        }

        .carousel {
            display: flex;
            justify-content: space-between;
            overflow-x: auto;
            padding: 20px;
            gap: 20px;
            margin-bottom: 40px;
        }

        .card {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 280px;
            flex-shrink: 0;
        }
        .card img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }
        .card p {
            margin-top: 10px;
            font-size: 16px;
            font-weight: bold;
        }

        /* Carousel Navigation */
        .carousel-nav {
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        .carousel-nav span {
            font-size: 30px;
            cursor: pointer;
            color: #3490dc;
        }
        .carousel-nav span:hover {
            color: #2779bd;
        }

    </style>
</head>
<body>

    <!-- Header Section -->
    <div class="header">
        <img src="logo.png" alt="PPSDM Logo">
        <nav>
            <a href="#">Beranda</a>
            <a href="#">Berita</a>
            <a href="#">Pengumuman</a>
            <a href="#">Lowongan Pekerjaan</a>
            <a href="#">Tentang</a>
            <a href="#">Login</a>
        </nav>
    </div>

    <!-- Banner Section -->
    <div class="banner">
        <h1>Selamat Datang, di PPSDM</h1>
        <p>Pengelolaan & Pengembangan Sumber Daya Manusia</p>
        <a href="{{ route('login') }}" class="btn">Login</a>
    </div>

    <!-- Berita Section -->
    <div class="section-title">BERITA</div>
    <div class="carousel">
        <div class="card">
            <img src="news_image1.jpg" alt="Berita 1">
            <p>Ratusan Mahasiswa Indonesia Terima Beasiswa</p>
        </div>
        <div class="card">
            <img src="news_image2.jpg" alt="Berita 2">
            <p>Ratusan Mahasiswa Indonesia Terima Beasiswa</p>
        </div>
        <div class="card">
            <img src="news_image3.jpg" alt="Berita 3">
            <p>Ratusan Mahasiswa Indonesia Terima Beasiswa</p>
        </div>
    </div>

    <!-- Pengumuman Section -->
    <div class="section-title">PENGUMUMAN</div>
    <div class="carousel">
        <div class="card">
            <img src="announcement_image1.jpg" alt="Pengumuman 1">
            <p>IT Del Akan mengadakan KMC (Keluarga Mahasiswa Cup)</p>
        </div>
        <div class="card">
            <img src="announcement_image2.jpg" alt="Pengumuman 2">
            <p>IT Del Akan mengadakan KMC (Keluarga Mahasiswa Cup)</p>
        </div>
        <div class="card">
            <img src="announcement_image3.jpg" alt="Pengumuman 3">
            <p>IT Del Akan mengadakan KMC (Keluarga Mahasiswa Cup)</p>
        </div>
    </div>

    <!-- Carousel Navigation -->
    <div class="carousel-nav">
        <span>&#8249;</span>
        <span>&#8250;</span>
    </div>

</body>
</html>
