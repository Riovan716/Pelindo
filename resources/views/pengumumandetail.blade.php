@extends('layouts.master')
@section('title', 'Detail Pengumuman')
@section('content')

<!-- Google Fonts for Poppins -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

<style>
    body {
        font-family: 'Poppins', 'Segoe UI', 'Roboto', Arial, sans-serif;
        background: linear-gradient(to bottom,rgba(140, 207, 220, 1), #d0f0f8);
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
        box-shadow: 0 4px 24px rgba(0,0,0,0.08);
        width: 100vw;
        max-width: 100vw;
        min-height: 80vh;
        padding: 0;
        margin: 0;
    }
    .detail-image {
        flex: 0 0 420px;
        background: #e3f6fa;
        display: flex;
        align-items: center;
        justify-content: center;
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
        min-height: 80vh;
        max-height: 150vh;
        overflow: hidden;
    }
    .detail-image img {
        max-width: 90%;
        max-height: 70vh;
        border-radius: 18px;
        box-shadow: 0 2px 12px rgba(0,0,0,0.10);
        object-fit: cover;
    }
    .detail-content {
        flex: 1;
        padding: 60px 60px 40px 40px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .detail-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: #0288d1;
        margin-bottom: 18px;
        font-family: 'Poppins', 'Segoe UI', 'Roboto', Arial, sans-serif;
    }
    .detail-divider {
        border-bottom: 3px solid #0288d1;
        width: 80px;
        margin-bottom: 28px;
    }
    .detail-text {
        font-size: 1.25rem;
        color: #222;
        margin-bottom: 32px;
        white-space: pre-line;
        font-family: 'Poppins', 'Segoe UI', 'Roboto', Arial, sans-serif;
    }
    .detail-file-link {
        color: #0288d1;
        font-weight: 600;
        font-size: 1.1rem;
        text-decoration: underline;
        margin-bottom: 32px;
        display: inline-block;
    }
    .back-btn {
        display: inline-block;
        margin-top: 24px;
        color: #fff;
        background: #0288d1;
        padding: 12px 32px;
        border-radius: 10px;
        text-decoration: none;
        font-size: 1.1rem;
        font-weight: 600;
        transition: background 0.2s;
    }
    .back-btn:hover {
        background: #026fa4;
    }
    @media (max-width: 900px) {
        .detail-card {
            flex-direction: column;
        }
        .detail-image {
            flex: none;
            width: 100vw;
            min-height: 220px;
            max-height: 300px;
        }
        .detail-content {
            padding: 32px 16px 24px 16px;
        }
    }
</style>

<div class="detail-container">
    <div class="detail-card">
        <div class="detail-image">
            @if ($pengumuman->file && preg_match('/\.(jpg|jpeg|png|gif|webp)$/i', $pengumuman->file))
                <img src="{{ asset('storage/' . $pengumuman->file) }}" alt="Gambar Pengumuman">
            @else
                <img src="{{ asset('images/news-image.png') }}" alt="Gambar Default">
            @endif
        </div>
        <div class="detail-content">
            <div class="detail-title">{{ $pengumuman->judul }}</div>
            <div class="detail-divider"></div>
            <div class="detail-text">{{ $pengumuman->isi }}</div>
            @if ($pengumuman->file && !preg_match('/\.(jpg|jpeg|png|gif|webp)$/i', $pengumuman->file))
                <a href="{{ asset('storage/' . $pengumuman->file) }}" target="_blank" class="detail-file-link">Lihat / Download Dokumen</a>
            @endif
            <a href="{{ route('pengumuman') }}" class="back-btn">&larr; Kembali ke Pengumuman</a>
        </div>
    </div>
</div>

@endsection 