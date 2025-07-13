@extends('layouts.master')
@section('title', 'Tentang')
@section('content')

<style>
    body {
        background: #f4fbfd;
        font-family: 'Segoe UI', 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
    }

    .tentang-hero {
        background: linear-gradient(135deg, #0070c9 0%, #005fa3 100%);
        color: white;
        padding: 80px 20px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .tentang-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="white" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="white" opacity="0.1"/><circle cx="50" cy="10" r="0.5" fill="white" opacity="0.1"/><circle cx="10" cy="60" r="0.5" fill="white" opacity="0.1"/><circle cx="90" cy="40" r="0.5" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
        opacity: 0.3;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        max-width: 800px;
        margin: 0 auto;
    }

    .hero-title {
        font-size: 3.5rem;
        font-weight: 700;
        margin-bottom: 20px;
        text-shadow: 0 2px 4px rgba(0,0,0,0.3);
    }

    .hero-subtitle {
        font-size: 1.3rem;
        opacity: 0.9;
        margin-bottom: 0;
        font-weight: 300;
    }

    .tentang-container {
        max-width: 1000px;
        margin: -60px auto 80px auto;
        background: #fff;
        border-radius: 24px;
        padding: 60px 50px;
        box-shadow: 0 20px 60px rgba(0,112,201,0.15);
        position: relative;
        z-index: 10;
    }

    .tentang-header {
        text-align: center;
        margin-bottom: 50px;
    }

    .tentang-header h2 {
        font-size: 2.5rem;
        color: #0070c9;
        margin-bottom: 15px;
        font-weight: 700;
    }

    .tentang-header .divider {
        width: 80px;
        height: 4px;
        background: linear-gradient(90deg, #0070c9, #005fa3);
        margin: 0 auto 30px auto;
        border-radius: 2px;
    }

    .tentang-content {
        font-size: 16px;
        color: #333;
        line-height: 1.7;
        background: #fff;
        padding: 32px 32px 32px 32px;
        border-radius: 12px;
        border-left: 4px solid #0070c9;
        margin-bottom: 24px;
        box-shadow: 0 2px 8px rgba(0,112,201,0.06);
        position: relative;
        text-align: left;
    }

    .tentang-content p {
        margin: 0;
        position: relative;
        z-index: 2;
    }

    .stats-section {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 30px;
        margin-top: 50px;
        padding-top: 50px;
        border-top: 1px solid #e1e8ed;
    }

    .stat-card {
        text-align: center;
        padding: 30px 20px;
        background: linear-gradient(135deg, #f8fafc 0%, #e3f2fd 100%);
        border-radius: 16px;
        border: 1px solid #e1e8ed;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,112,201,0.15);
    }

    .stat-number {
        font-size: 2.5rem;
        font-weight: 700;
        color: #0070c9;
        margin-bottom: 10px;
    }

    .stat-label {
        font-size: 1rem;
        color: #666;
        font-weight: 500;
    }

    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.5rem;
        }
        
        .hero-subtitle {
            font-size: 1.1rem;
        }

        .tentang-container {
            margin: -40px 20px 60px 20px;
            padding: 40px 30px;
        }

        .tentang-header h2 {
            font-size: 2rem;
        }

        .tentang-content {
            padding: 30px 25px;
            font-size: 1rem;
        }

        .stats-section {
            grid-template-columns: 1fr;
            gap: 20px;
        }
    }

    @media (max-width: 480px) {
        .tentang-hero {
            padding: 60px 15px;
        }

        .hero-title {
            font-size: 2rem;
        }

        .tentang-container {
            padding: 30px 20px;
        }

        .tentang-content {
            padding: 25px 20px;
        }
    }
</style>

<div class="tentang-hero">
    <div class="hero-content">
        <h1 class="hero-title">Tentang Kami</h1>
        <p class="hero-subtitle">Mengenal Lebih Dekat PPSDM Pelindo</p>
    </div>
</div>

<div class="tentang-container">
    <div class="tentang-header">
        <h2>Tentang PPSDM</h2>
        <div class="divider"></div>
    </div>
    
    <div class="tentang-content">
        {!! nl2br(e($tentang->isi ?? 'Data tentang belum tersedia.')) !!}
    </div>

    <div class="stats-section">
        <div class="stat-card">
            <div class="stat-number">25+</div>
            <div class="stat-label">Tahun Pengalaman</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">1000+</div>
            <div class="stat-label">Program Pelatihan</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">5000+</div>
            <div class="stat-label">Peserta Terlatih</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">50+</div>
            <div class="stat-label">Instruktur Ahli</div>
        </div>
    </div>
</div>

@endsection
