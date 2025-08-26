@extends('layouts.master')
@section('title', 'Rekomendasi Magang')
@section('content')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Poppins', 'Segoe UI', 'Roboto', Arial, sans-serif;
        background: #f4fbfd;
    }
    .lowongan-title {
        text-align: center;
        font-size: 2.2rem;
        font-weight: 700;
        margin-top: 32px;
        margin-bottom: 24px;
        color: #0b1957;
        font-family: 'Poppins', 'Segoe UI', 'Roboto', Arial, sans-serif;
    }
    .lowongan-list {
        display: flex;
        flex-direction: column;
        gap: 32px;
        justify-content: center;
        margin: 0 auto 40px auto;
        max-width: 1200px;
        width: 100vw;
        padding: 0 2vw;
    }
    .lowongan-row {
      
        display: flex;
        align-items: flex-start;
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 4px 16px #0002;
        padding: 24px 32px;
        width: 100%;
        max-width: 100%;
        font-family: 'Poppins', 'Segoe UI', 'Roboto', Arial, sans-serif;
        min-height: 180px;
        position: relative;
    }
    .lowongan-img {
        width: 140px;
        height: 140px;
        object-fit: cover;
        border-radius: 16px;
        background: #e0e0e0;
        margin-right: 32px;
        flex-shrink: 0;
    }
    .lowongan-content {
        flex: 1;
        display: flex;
        flex-direction: column;
        min-width: 0;
    }
    .lowongan-title-row {
        font-size: 1.35rem;
        font-weight: 700;
        margin-bottom: 6px;
        color: #0b1957;
        letter-spacing: 0.5px;
    }
    .lowongan-divider {
        border-bottom: 3px solid #222;
        margin-bottom: 12px;
        width: 100%;
    }
    .lowongan-desc {
        font-size: 1.05rem;
        color: #222;
        margin-bottom: 8px;
        word-break: break-word;
    }
    .lowongan-link {
        position: absolute;
        right: 32px;
        bottom: 18px;
        font-size: 1rem;
        color: #0b1957;
        font-style: italic;
        text-decoration: underline;
        font-weight: 600;
        transition: color 0.2s;
    }
    .lowongan-link:hover {
        color: #0288d1;
    }
    @media (max-width: 700px) {
        .lowongan-list {
            gap: 18px;
        }
        .lowongan-row {
            flex-direction: column;
            align-items: stretch;
            padding: 16px 8px 40px 8px;
        }
        .lowongan-img {
            margin: 0 auto 16px auto;
            width: 100%;
            max-width: 220px;
            height: 120px;
        }
        .lowongan-link {
            position: static;
            margin-top: 18px;
            display: block;
            text-align: right;
        }
    }
</style>

<div class="lowongan-title">Rekomendasi Magang</div>
@if(isset($lowongans) && $lowongans->count())
    <div class="lowongan-list">
        @foreach($lowongans as $lowongan)
            <div class="lowongan-row">
                @if($lowongan->foto)
                    <img src="{{ asset('storage/'.$lowongan->foto) }}" alt="Foto Lowongan" class="lowongan-img">
                @else
                    <div class="lowongan-img" style="display:flex;align-items:center;justify-content:center;color:#aaa;">Tidak ada foto</div>
                @endif
                <div class="lowongan-content">
                    <div class="lowongan-title-row">{{ $lowongan->judul }}</div>
                    <div class="lowongan-divider"></div>
                    <div class="lowongan-desc">{{ Str::limit($lowongan->deskripsi, 120) }}</div>
                </div>
                <a href="{{ route('lowongan.show', $lowongan->id) }}" class="lowongan-link">Selengkapnya..</a>
            </div>
        @endforeach
    </div>
@else
    <div style="margin-top: 24px; color: #888; text-align:center;">Belum ada rekomendasi magang tersedia.</div>
@endif
@endsection 