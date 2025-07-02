@extends('layouts.master')
@section('title', 'Pengumuman')
@section('content')

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700&display=swap" rel="stylesheet">
<style>
    body {
        background: #f4fbfd;
        font-family: 'Poppins', 'Segoe UI', 'Roboto', Arial, sans-serif;
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
        background-color: #fff;
        border-radius: 20px;
        box-shadow: 4px 4px 10px rgba(0,0,0,0.2);
        width: 90%;
        max-width: 1000px;
        padding: 15px;
        align-items: flex-start;
        transition: transform 0.2s ease;
        font-family: 'Poppins', 'Segoe UI', 'Roboto', Arial, sans-serif;
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
        font-weight: 700;
        color: #0b1957;
        font-size: 1.2rem;
    }

    .pengumuman-konten p {
        margin: 10px 0 0;
        font-size: 1.05rem;
        color: #222;
        font-family: 'Poppins', 'Segoe UI', 'Roboto', Arial, sans-serif;
    }

    .pengumuman-konten .selengkapnya {
        font-size: 1rem;
        color: #0b1957;
        font-style: italic;
        text-align: right;
        display: block;
        font-family: 'Poppins', 'Segoe UI', 'Roboto', Arial, sans-serif;
        font-weight: 600;
        text-decoration: underline;
        transition: color 0.2s;
    }

    .pengumuman-konten .selengkapnya:hover {
        color: #0288d1;
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
