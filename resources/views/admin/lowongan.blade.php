@extends('layouts.master_admin')
@section('title', 'Daftar Lowongan')
@section('content')
<style>
    body {
        background: #f4fbfd;
    }
    .main-card {
        max-width: 1300px;
        margin: 40px auto 0 auto;
        background: #fff;
        border-radius: 28px;
        box-shadow: 0 8px 40px rgba(0,112,201,0.10);
        padding: 48px 48px 40px 48px;
    }
    .header-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 36px;
        background: #fff;
        padding: 28px 40px;
        border-radius: 20px;
        box-shadow: 0 6px 28px rgba(0,112,201,0.08);
    }
    .header-section h1 {
        color: #0070c9;
        font-size: 2.2rem;
        font-weight: 800;
        margin: 0;
        letter-spacing: 0.5px;
    }
    .btn-tambah {
        background: linear-gradient(90deg, #0070c9 60%, #005fa3 100%);
        color: #fff;
        padding: 18px 38px;
        border: none;
        border-radius: 14px;
        font-size: 1.15rem;
        font-weight: 700;
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        transition: all 0.3s cubic-bezier(.4,2,.3,1);
        box-shadow: 0 6px 24px rgba(0,112,201,0.18);
    }
    .btn-tambah:hover {
        background: linear-gradient(90deg, #005fa3 60%, #0070c9 100%);
        transform: translateY(-3px) scale(1.04);
        box-shadow: 0 10px 32px rgba(0,112,201,0.22);
        color: #fff;
        text-decoration: none;
    }
    .btn-tambah .plus-icon {
        font-size: 1.3rem;
        font-weight: 900;
        margin-right: 8px;
        display: flex;
        align-items: center;
    }
    .lowongan-title {
        color: #0070c9;
        font-size: 1.6rem;
        font-weight: 700;
        margin: 36px 0 24px 0;
        text-align: center;
        letter-spacing: 0.2px;
    }
    .lowongan-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 36px;
        margin-top: 18px;
        justify-content: center;
    }
    .lowongan-card {
        background: #fafdff;
        border-radius: 18px;
        box-shadow: 0 4px 24px #0070c91a;
        width: 340px;
        padding: 28px 22px 22px 22px;
        display: flex;
        flex-direction: column;
        align-items: center;
        transition: box-shadow 0.25s, transform 0.25s;
        position: relative;
        border: 1.5px solid #e1e8ed;
    }
    .lowongan-card:hover {
        box-shadow: 0 12px 40px #0070c933;
        transform: translateY(-4px) scale(1.025);
        border-color: #0070c9;
    }
    .lowongan-card img {
        width: 100%;
        max-width: 230px;
        height: 150px;
        object-fit: cover;
        border-radius: 10px;
        margin-bottom: 16px;
        background: #e0e0e0;
        box-shadow: 0 2px 8px #0070c91a;
    }
    .lowongan-card .no-foto {
        width: 100%;
        max-width: 230px;
        height: 150px;
        background: #e0e0e0;
        border-radius: 10px;
        margin-bottom: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #aaa;
        font-size: 1rem;
    }
    .lowongan-card h3 {
        margin: 0 0 10px 0;
        font-size: 1.25rem;
        color: #1f1f1f;
        font-weight: 800;
        text-align: center;
        letter-spacing: 0.2px;
    }
    .lowongan-card .desc {
        font-size: 1.05rem;
        color: #444;
        margin-bottom: 10px;
        min-height: 40px;
        text-align: center;
        font-weight: 500;
    }
    .lowongan-card .meta {
        font-size: 0.98rem;
        color: #0070c9;
        margin-bottom: 4px;
        text-align: center;
        font-weight: 600;
    }
    .lowongan-card .date {
        font-size: 0.93rem;
        color: #aaa;
        margin-top: 10px;
        text-align: center;
        font-style: italic;
    }
    .btn-pendaftar {
        margin-top: 18px;
        color: #fff;
        background: linear-gradient(90deg, #0070c9 60%, #005fa3 100%);
        padding: 12px 32px;
        border-radius: 10px;
        text-decoration: none;
        display: block;
        font-size: 1.08rem;
        font-weight: 700;
        transition: background 0.2s, transform 0.2s;
        box-shadow: 0 2px 12px #0070c933;
        text-align: center;
        border: none;
    }
    .btn-pendaftar:hover {
        background: linear-gradient(90deg, #005fa3 60%, #0070c9 100%);
        transform: translateY(-2px) scale(1.04);
        color: #fff;
    }
    .empty-state {
        text-align: center;
        padding: 80px 20px;
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 6px 28px rgba(0,0,0,0.08);
        font-size: 1.15rem;
        color: #888;
        margin-top: 40px;
    }
    @media (max-width: 900px) {
        .main-card { padding: 18px 2vw; }
        .header-section { padding: 18px 10px; }
        .lowongan-grid { gap: 18px; }
        .lowongan-card { width: 98vw; max-width: 370px; }
    }
    @media (max-width: 600px) {
        .main-card { padding: 6px 0; }
        .header-section { flex-direction: column; gap: 12px; }
        .lowongan-title { font-size: 1.1rem; }
        .lowongan-card { padding: 16px 6px 12px 6px; }
        .btn-tambah { width: 100%; justify-content: center; }
    }
</style>
<div class="main-card">
    <div class="header-section">
        <h1>Daftar Lowongan</h1>
        <a href="{{ route('admin.lowongan.create') }}" class="btn-tambah">
            <span class="plus-icon">&#43;</span> Tambah Lowongan
        </a>
    </div>
    <div class="lowongan-title">Daftar Lowongan</div>
    @if($lowongans->count())
        <div class="lowongan-grid">
            @foreach($lowongans as $lowongan)
                <div class="lowongan-card">
                    @if($lowongan->foto)
                        <img src="{{ asset('storage/'.$lowongan->foto) }}" alt="Foto Lowongan">
                    @else
                        <div class="no-foto">Tidak ada foto</div>
                    @endif
                    <h3>{{ $lowongan->judul }}</h3>
                    <div class="desc">{{ Str::limit($lowongan->deskripsi, 60) }}</div>
                    <div class="meta"><b>Kualifikasi:</b> {{ Str::limit($lowongan->kualifikasi, 40) }}</div>
                    <div class="meta"><b>Keahlian:</b> {{ Str::limit($lowongan->keahlian, 40) }}</div>
                    <div class="date">Diposting: {{ $lowongan->created_at->format('d M Y') }}</div>
                    <a href="{{ route('admin.lowongan.pendaftar', $lowongan->id) }}" class="btn-pendaftar">Lihat Pendaftar</a>
                </div>
            @endforeach
        </div>
    @else
        <div class="empty-state">
            <p>Belum ada data lowongan.</p>
        </div>
    @endif
</div>
@endsection
