@extends('layouts.master')
@section('title', 'Beranda')
@section('content')

<!-- Google Fonts for Poppins -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;900&display=swap" rel="stylesheet">

<style>
    body {
        font-family: 'Poppins', 'Segoe UI', 'Roboto', Arial, sans-serif;
        background: linear-gradient(to bottom, #82d7e9, #d0f0f8);
    }
    .hero-section {
        padding: 80px 40px 60px 40px;
        color: #000;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
        gap: 60px;
        max-width: 1300px;
        margin: auto;
    }
    .hero-left {
        flex: 1;
        min-width: 320px;
    }
    .hero-left h1 {
        font-size: 60px;
        font-weight: 900;
        margin-bottom: 18px;
        line-height: 1.1;
        font-family: 'Poppins', 'Segoe UI', 'Roboto', Arial, sans-serif;
        letter-spacing: -2px;
    }
    .hero-left h1 span {
        color: #0b1957;
        font-weight: 900;
        font-style: italic;
        text-shadow: 0 2px 8px #b2e0f7;
    }
    .hero-left h4 {
        font-weight: 700;
        margin-top: 18px;
        color: #0288d1;
        font-size: 1.7rem;
        letter-spacing: 1px;
        font-family: 'Poppins', 'Segoe UI', 'Roboto', Arial, sans-serif;
    }
    .hero-left p {
        margin-top: 22px;
        line-height: 1.8;
        font-size: 1.18rem;
        color: #222;
        font-family: 'Poppins', 'Segoe UI', 'Roboto', Arial, sans-serif;
        max-width: 600px;
        text-shadow: 0 1px 2px #e0f7fa;
    }
    .hero-right {
        flex: 1;
        min-width: 320px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .hero-right img {
        width: 420px;
        height: 420px;
        object-fit: cover;
        border-radius: 40px;
        box-shadow: 0 10px 32px rgba(0, 0, 0, 0.18), 0 2px 8px #b2e0f7;
        border: 10px solid #fff;
        background-color: #fff;
        transition: transform 0.3s, box-shadow 0.3s;
    }
    .hero-right img:hover {
        transform: scale(1.04) rotate(-2deg);
        box-shadow: 0 16px 40px rgba(2,136,209,0.18), 0 4px 16px #b2e0f7;
    }
    @media (max-width: 900px) {
        .hero-section {
            padding: 40px 10px 30px 10px;
            flex-direction: column;
            text-align: center;
            gap: 30px;
        }
        .hero-left h1 {
            font-size: 38px;
        }
        .hero-left h4 {
            font-size: 1.2rem;
        }
        .hero-right {
            margin-top: 20px;
        }
        .hero-right img {
            width: 220px;
            height: 220px;
            border-radius: 24px;
        }
    }
</style>

<div class="hero-wrapper">
    <div class="hero-section">
        <div class="hero-left">
            <h1>Selamat Datang,<br> Di <span>PPSDM</span></h1>
            <h4>PT Pelindo Multi Terminal</h4>
            <p>
                Selamat datang di <b>Portal Pengelolaan dan Pembelajaran SDM PT Pelindo Multi Terminal</b>.<br>
                Kami berkomitmen untuk meningkatkan kualitas dan kapasitas seluruh insan Pelindo melalui platform yang <b>terintegrasi</b> dan <b>adaptif</b>.<br><br>
                Platform ini menyediakan akses informasi terkini seputar berita perusahaan, pengumuman penting, serta peluang pengembangan karier dan pelatihan yang menunjang performa profesional Anda di dunia kerja.
            </p>
        </div>
        <div class="hero-right">
            <img src="{{ asset('assets/images/logo-login.jpg') }}" alt="Monumen PT Pelindo">
        </div>
    </div>
</div>

@endsection
