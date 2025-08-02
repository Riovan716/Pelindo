@extends('layouts.master')
@section('title', 'Detail Lowongan')
@section('content')

<!-- Google Fonts for Poppins -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;900&display=swap" rel="stylesheet">

<style>
    body {
        font-family: 'Poppins', 'Segoe UI', 'Roboto', Arial, sans-serif;
        background: linear-gradient(to bottom, #82d7e9, #d0f0f8);
        margin: 0;
        padding: 0;
    }
    .detail-container {
        width: 100vw;
        min-height: 100vh;
        margin: 0;
        padding: 0;
        display: flex;
        align-items: flex-start;
        justify-content: center;
    }
    .detail-card {
        display: flex;
        flex-direction: row;
        background: #fff;
        border-radius: 0;
        box-shadow: 0 8px 32px rgba(0,0,0,0.12);
        width: 100vw;
        max-width: 100vw;
        min-height: 80vh;
        padding: 0;
        margin: 0;
    }
    .detail-image {
        flex: 0 0 500px;
        background: linear-gradient(135deg, #e3f6fa, #b2e0f7);
        display: flex;
        align-items: center;
        justify-content: center;
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
        min-height: 80vh;
        max-height: 150vh;
        overflow: hidden;
        position: relative;
    }
    .detail-image::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, rgba(2,136,209,0.1), rgba(178,224,247,0.1));
        z-index: 1;
    }
    .detail-image img {
        max-width: 85%;
        max-height: 75vh;
        border-radius: 20px;
        box-shadow: 0 8px 24px rgba(0,0,0,0.15);
        object-fit: cover;
        position: relative;
        z-index: 2;
        border: 8px solid #fff;
    }
    .detail-content {
        flex: 1;
        padding: 80px 80px 60px 60px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        background: #fff;
    }
    .detail-title {
        font-size: 3rem;
        font-weight: 800;
        color: #0b1957;
        margin-bottom: 24px;
        font-family: 'Poppins', 'Segoe UI', 'Roboto', Arial, sans-serif;
        line-height: 1.2;
        letter-spacing: -1px;
    }
    .detail-divider {
        border-bottom: 4px solid #0288d1;
        width: 100px;
        margin-bottom: 32px;
        border-radius: 2px;
    }
    .detail-section {
        margin-bottom: 32px;
    }
    .detail-section h3 {
        font-size: 1.5rem;
        font-weight: 700;
        color: #0288d1;
        margin-bottom: 16px;
        font-family: 'Poppins', 'Segoe UI', 'Roboto', Arial, sans-serif;
    }
    .detail-text {
        font-size: 1.2rem;
        color: #333;
        line-height: 1.8;
        font-family: 'Poppins', 'Segoe UI', 'Roboto', Arial, sans-serif;
        text-align: justify;
    }
    .detail-date {
        font-size: 1rem;
        color: #666;
        font-style: italic;
        margin-bottom: 32px;
    }
    .action-buttons {
        display: flex;
        gap: 16px;
        margin-top: 32px;
    }
    .btn-primary {
        display: inline-block;
        color: #fff;
        background: linear-gradient(135deg, #0288d1, #026fa4);
        padding: 16px 40px;
        border-radius: 12px;
        text-decoration: none;
        font-size: 1.1rem;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 4px 16px rgba(2,136,209,0.3);
        border: none;
        cursor: pointer;
    }
    .btn-primary:hover {
        background: linear-gradient(135deg, #026fa4, #015a8a);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(2,136,209,0.4);
    }
    .btn-secondary {
        display: inline-block;
        color: #0288d1;
        background: #fff;
        padding: 16px 40px;
        border-radius: 12px;
        text-decoration: none;
        font-size: 1.1rem;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 4px 16px rgba(0,0,0,0.1);
        border: 2px solid #0288d1;
    }
    .btn-secondary:hover {
        background: #0288d1;
        color: #fff;
        transform: translateY(-2px);
    }
    @media (max-width: 1200px) {
        .detail-image {
            flex: 0 0 400px;
        }
        .detail-content {
            padding: 60px 40px 40px 40px;
        }
        .detail-title {
            font-size: 2.5rem;
        }
    }
    @media (max-width: 900px) {
        .detail-card {
            flex-direction: column;
        }
        .detail-image {
            flex: none;
            width: 100vw;
            min-height: 300px;
            max-height: 400px;
        }
        .detail-content {
            padding: 40px 20px 30px 20px;
        }
        .detail-title {
            font-size: 2rem;
        }
        .detail-text {
            font-size: 1.1rem;
        }
        .action-buttons {
            flex-direction: column;
        }
    }
</style>

<div class="detail-container">
    <div class="detail-card">
        <div class="detail-image">
            @if ($lowongan->foto)
                <img src="{{ asset('storage/' . $lowongan->foto) }}" alt="Foto Lowongan">
            @else
                <img src="{{ asset('images/default-job.png') }}" alt="Gambar Default">
            @endif
        </div>
        <div class="detail-content">
            <div class="detail-title">{{ $lowongan->judul }}</div>
            <div class="detail-divider"></div>
            <div class="detail-date">Diposting: {{ $lowongan->created_at->format('d F Y') }}</div>
            
            <div class="detail-section">
                <h3>Deskripsi Pekerjaan</h3>
                <div class="detail-text">{!! nl2br(e($lowongan->deskripsi)) !!}</div>
            </div>
            
            @if($lowongan->kualifikasi)
            <div class="detail-section">
                <h3>Kualifikasi</h3>
                <div class="detail-text">{!! nl2br(e($lowongan->kualifikasi)) !!}</div>
            </div>
            @endif
            
            @if($lowongan->keahlian)
            <div class="detail-section">
                <h3>Keahlian yang Dibutuhkan</h3>
                <div class="detail-text">{!! nl2br(e($lowongan->keahlian)) !!}</div>
            </div>
            @endif
            
            <div class="action-buttons">
                <a href="{{ route('pendaftar.create', $lowongan->id) }}" class="btn-primary">Daftar Sekarang</a>
                <a href="{{ route('lowongan') }}" class="btn-secondary">&larr; Kembali ke Lowongan</a>
            </div>
        </div>
    </div>
</div>

@endsection 