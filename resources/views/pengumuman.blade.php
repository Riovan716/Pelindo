@extends('layouts.master')
@section('title', 'Pengumuman')
@section('content')

<style>
    body {
        background: linear-gradient(to bottom, #82d7e9, #d0f0f8);
        font-family: 'Segoe UI', sans-serif;
    }

    .search-container {
        margin: 30px auto;
        text-align: center;
    }

    .search-box {
        padding: 10px 20px;
        border-radius: 20px;
        width: 300px;
        border: none;
        outline: none;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .search-btn {
        padding: 10px 15px;
        border-radius: 10px;
        background-color: #0288d1;
        color: white;
        border: none;
        margin-left: 10px;
        cursor: pointer;
    }

    .pengumuman-wrapper {
        padding: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 20px;
    }

    .card-pengumuman {
        display: flex;
        background-color: #72cce3;
        border-radius: 20px;
        box-shadow: 4px 4px 10px rgba(0,0,0,0.2);
        width: 90%;
        max-width: 1000px;
        padding: 15px;
        align-items: flex-start;
        transition: transform 0.2s ease;
    }

    .card-pengumuman:hover {
        transform: translateY(-3px);
    }

    .card-pengumuman img {
        width: 150px;
        height: auto;
        border-radius: 10px;
        margin-right: 20px;
        object-fit: cover;
    }

    .pengumuman-konten {
        flex: 1;
    }

    .pengumuman-konten h4 {
        margin: 0;
        font-weight: bold;
        color: #111;
        font-size: 16px;
    }

    .pengumuman-konten p {
        margin: 10px 0 0;
        font-size: 15px;
        color: #000;
    }

    .pengumuman-konten .selengkapnya {
        font-size: 13px;
        color: #003366;
        font-style: italic;
        text-align: right;
        display: block;
    }

    .garis-bawah {
        border-bottom: 2px solid #000;
        width: 100%;
        margin-top: 6px;
        margin-bottom: 10px;
    }
</style>

<div class="search-container">
    <form method="GET" action="{{ route('pengumuman') }}" style="display:inline-block;">
        <input type="text" name="q" class="search-box" placeholder="Cari Pengumuman..." value="{{ isset($query) ? $query : '' }}">
        <button class="search-btn" type="submit">🔍</button>
    </form>
</div>

<div class="pengumuman-wrapper">
    @forelse ($pengumuman as $item)
        <div class="card-pengumuman">
            @php
                $isImage = $item->file && preg_match('/\.(jpg|jpeg|png|gif|webp)$/i', $item->file);
                $filePath = $item->file ? asset('storage/' . $item->file) : asset('images/news-image.png');
            @endphp

            <img src="{{ $isImage ? $filePath : asset('images/news-image.png') }}" alt="Pengumuman">

            <div class="pengumuman-konten">
                <h4>{{ $item->judul }}</h4>
                <div class="garis-bawah"></div>
                <p>{{ Str::limit($item->isi, 150) }}</p>

                @if (!$isImage && $item->file)
                    <a href="{{ $filePath }}" class="selengkapnya" target="_blank">Lihat Dokumen</a>
                @else
                    <a href="{{ route('pengumuman.show', $item->id) }}" class="selengkapnya">Selengkapnya..</a>
                @endif
            </div>
        </div>
    @empty
        <p>Tidak ada pengumuman.</p>
    @endforelse
</div>

@endsection
