@extends('layouts.master_admin')
@section('title', 'Tambah Berita')
@section('content')
<style>
    body {
        background: #f4fbfd;
    }
    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }
    .form-card {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        padding: 32px;
        margin-bottom: 20px;
    }
    .form-header {
        text-align: center;
        margin-bottom: 32px;
    }
    .form-header h1 {
        color: #0070c9;
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 8px;
    }
    .form-header p {
        color: #666;
        font-size: 16px;
        margin: 0;
    }
    .form-group {
        margin-bottom: 24px;
    }
    label {
        font-weight: 600;
        display: block;
        margin-bottom: 8px;
        color: #222;
        font-size: 15px;
    }
    input[type="text"],
    textarea,
    input[type="file"] {
        width: 100%;
        padding: 14px 18px;
        font-size: 15px;
        border: 2px solid #e1e8ed;
        border-radius: 12px;
        background: #fff;
        transition: all 0.3s ease;
        box-sizing: border-box;
    }
    input[type="text"]:focus,
    textarea:focus {
        outline: none;
        border-color: #0070c9;
        box-shadow: 0 0 0 3px rgba(0,112,201,0.1);
    }
    textarea {
        resize: vertical;
        min-height: 120px;
    }
    .file-input-wrapper {
        position: relative;
        display: inline-block;
        width: 100%;
    }
    .file-input-wrapper input[type="file"] {
        padding: 12px;
        border: 2px dashed #0070c9;
        background: #f8f9ff;
        cursor: pointer;
    }
    .file-input-wrapper input[type="file"]:hover {
        background: #e8f4ff;
    }
    .alert-danger {
        background: #fff5f5;
        color: #dc3545;
        border-left: 4px solid #dc3545;
        padding: 16px 20px;
        border-radius: 8px;
        margin-bottom: 24px;
        font-size: 15px;
    }
    .alert-danger ul {
        margin: 8px 0 0 0;
        padding-left: 20px;
    }
    .alert-danger li {
        margin-bottom: 4px;
    }
    .btn-container {
        display: flex;
        gap: 16px;
        justify-content: center;
        margin-top: 32px;
    }
    .btn {
        padding: 14px 32px;
        font-size: 16px;
        border: none;
        border-radius: 12px;
        cursor: pointer;
        font-weight: 600;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    .btn-primary {
        background: #0070c9;
        color: #fff;
        box-shadow: 0 4px 15px rgba(0,112,201,0.3);
    }
    .btn-primary:hover {
        background: #005fa3;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0,112,201,0.4);
        color: #fff;
        text-decoration: none;
    }
    .btn-secondary {
        background: #6c757d;
        color: #fff;
    }
    .btn-secondary:hover {
        background: #5a6268;
        color: #fff;
        text-decoration: none;
    }
    .back-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #0070c9;
        text-decoration: none;
        font-weight: 600;
        margin-bottom: 20px;
        transition: all 0.2s;
    }
    .back-link:hover {
        color: #005fa3;
        text-decoration: none;
    }
</style>

<div class="container">
    <a href="{{ route('admin.berita.index') }}" class="back-link">
        ← Kembali ke Daftar Berita
    </a>
    
    <div class="form-card">
        <div class="form-header">
            <h1>Tambah Berita Baru</h1>
            <p>Isi form di bawah untuk menambahkan berita baru</p>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Terjadi kesalahan:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label for="judul">Judul Berita *</label>
                <input type="text" name="judul" id="judul" placeholder="Masukkan judul berita..." required value="{{ old('judul') }}">
            </div>

            <div class="form-group">
                <label for="isi">Isi Berita *</label>
                <textarea name="isi" id="isi" placeholder="Tulis isi berita di sini..." required>{{ old('isi') }}</textarea>
            </div>

            <div class="form-group">
                <label for="gambar">Upload Gambar</label>
                <div class="file-input-wrapper">
                    <input type="file" name="gambar" id="gambar" accept="image/*">
                </div>
                <small style="color: #666; margin-top: 4px; display: block;">
                    Format yang didukung: JPG, PNG, GIF. Maksimal 2MB.
                </small>
            </div>

            <div class="btn-container">
                <button type="submit" class="btn btn-primary">
                    <i>✓</i>
                    Simpan Berita
                </button>
                <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">
                    <i>✕</i>
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection 