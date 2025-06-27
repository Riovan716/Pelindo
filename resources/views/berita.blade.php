@extends('layouts.master')
@section('title', 'Berita')
@section('content')

@php
    use Illuminate\Support\Str;
@endphp

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
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
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

    .berita-wrapper {
        padding: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 20px;
    }

    .card-berita {
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

    .card-berita:hover {
        transform: translateY(-3px);
    }

    .card-berita img {
        width: 150px;
        height: auto;
        border-radius: 10px;
        margin-right: 20px;
    }

    .berita-konten {
        flex: 1;
    }

    .berita-konten h4 {
        font-style: italic;
        font-weight: bold;
        margin: 0;
        padding-bottom: 8px;
        border-bottom: 2px solid #000;
    }

    .berita-konten p {
        margin: 10px 0;
        font-size: 15px;
        color: #fff;
        text-shadow: 0 1px 2px rgba(0,0,0,0.2);
    }

    .berita-konten .selengkapnya {
        font-size: 13px;
        color: #003366;
        font-style: italic;
        text-align: right;
        display: block;
        text-decoration: none;
        transition: color 0.2s ease;
    }
    
    .berita-konten .selengkapnya:hover {
        color: #0288d1;
        text-decoration: underline;
    }
</style>

<div class="search-container">
    <form method="GET" action="{{ route('berita.public') }}" style="display:inline-block;">
        <input type="text" name="q" class="search-box" placeholder="Cari Berita..." value="{{ isset($query) ? $query : '' }}">
        <button class="search-btn" type="submit">🔍</button>
    </form>
</div>

<div class="berita-wrapper">
    @if($beritas->count())
        @foreach ($beritas as $berita)
            <div class="card-berita">
                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar Berita">
                <div class="berita-konten">
                    <h4>{{ $berita->judul }}</h4>
                    <p>{{ Str::limit(strip_tags($berita->isi), 150) }}</p>
                    <a href="{{ route('berita.show', $berita->id) }}" class="selengkapnya">Selengkapnya..</a>
                </div>
            </div>
        @endforeach
    @else
        <p>Tidak ada berita tersedia.</p>
    @endif
</div>

@endsection
