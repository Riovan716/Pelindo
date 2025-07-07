@extends('layouts.master_admin')

@section('title', 'Daftar Berita')

@section('content')
<style>
    body {
        background: #f4fbfd;
    }
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }
    .header-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        background: #fff;
        padding: 24px 32px;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    }
    .header-section h1 {
        color: #0070c9;
        font-size: 28px;
        font-weight: 700;
        margin: 0;
    }
    .btn-tambah {
        background: #0070c9;
        color: #fff;
        padding: 14px 28px;
        border: none;
        border-radius: 12px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0,112,201,0.3);
    }
    .btn-tambah:hover {
        background: #005fa3;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0,112,201,0.4);
        color: #fff;
        text-decoration: none;
    }
    .btn-tambah i {
        font-size: 18px;
    }
    .alert {
        padding: 16px 20px;
        border-radius: 8px;
        margin-bottom: 20px;
        font-weight: 600;
    }
    .alert-success {
        background: #d4edda;
        color: #155724;
        border-left: 4px solid #28a745;
    }
    .berita-table {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    }
    .berita-table th {
        background: #0070c9;
        color: #fff;
        font-weight: 700;
        padding: 16px 20px;
        border: none;
        font-size: 15px;
    }
    .berita-table td {
        padding: 16px 20px;
        border-bottom: 1px solid #e0e0e0;
        font-size: 15px;
        color: #222;
        vertical-align: middle;
    }
    .berita-table tr:last-child td {
        border-bottom: none;
    }
    .berita-table tr:hover {
        background-color: #f8f9fa;
    }
    .berita-table img {
        max-width: 80px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    .btn-edit {
        background: #ffc107;
        color: #000;
        margin-right: 8px;
        padding: 8px 16px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        transition: all 0.2s;
    }
    .btn-edit:hover {
        background: #ffb300;
        color: #000;
        text-decoration: none;
    }
    .btn-delete {
        background: #dc3545;
        color: #fff;
        padding: 8px 16px;
        border: none;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s;
    }
    .btn-delete:hover {
        background: #b71c1c;
    }
    .empty-state {
        text-align: center;
        padding: 60px 20px;
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    }
    .empty-state p {
        color: #666;
        font-size: 16px;
        margin: 0;
    }
</style>

<div class="container">
    <div class="header-section">
        <h1>Daftar Berita</h1>
        <a href="{{ route('admin.berita.create') }}" class="btn-tambah">
            <i>+</i>
            Tambah Berita
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($beritas->count())
        <table class="berita-table">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Isi</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($beritas as $berita)
                    <tr>
                        <td>{{ $berita->judul }}</td>
                        <td>{{ Str::limit(strip_tags($berita->isi), 100) }}</td>
                        <td>
                            @if($berita->gambar)
                                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar">
                            @else
                                Tidak ada
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.berita.edit', $berita->id) }}" class="btn-edit">Edit</a>
                            <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete" onclick="return confirm('Yakin ingin menghapus berita ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="empty-state">
            <p>Belum ada berita yang tersedia.</p>
        </div>
    @endif
</div>
@endsection
