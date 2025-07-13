@extends('layouts.master_admin')
@section('title', 'Tambah Lowongan')
@section('content')
<style>
    body {
        background: #f4fbfd;
    }
    .main-card {
        max-width: 600px;
        margin: 40px auto 0 auto;
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 6px 32px rgba(0,112,201,0.08);
        padding: 36px 36px 32px 36px;
    }
    .form-title {
        color: #0070c9;
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 24px;
        text-align: center;
    }
    .form-group {
        margin-bottom: 18px;
    }
    label {
        font-weight: 600;
        display: block;
        margin-bottom: 6px;
        color: #222;
        font-size: 15px;
    }
    input[type="text"],
    textarea,
    input[type="file"] {
        width: 100%;
        padding: 12px 16px;
        font-size: 15px;
        border: 2px solid #e1e8ed;
        border-radius: 10px;
        background: #fff;
        transition: all 0.3s ease;
    }
    input[type="text"]:focus,
    textarea:focus {
        outline: none;
        border-color: #0070c9;
        box-shadow: 0 0 0 2px rgba(0,112,201,0.08);
    }
    textarea {
        min-height: 80px;
        resize: vertical;
    }
    .form-error {
        color: #dc3545;
        font-size: 13px;
        margin-top: 2px;
        margin-bottom: 4px;
    }
    .btn-submit {
        background: #0070c9;
        color: #fff;
        padding: 12px 28px;
        border: none;
        border-radius: 10px;
        font-size: 15px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.2s;
        margin-top: 8px;
        box-shadow: 0 2px 8px rgba(0,112,201,0.08);
    }
    .btn-submit:hover {
        background: #005fa3;
    }
    .success-message {
        color: #28a745;
        background: #d4edda;
        border-left: 4px solid #28a745;
        padding: 12px 18px;
        border-radius: 8px;
        margin-bottom: 18px;
        font-size: 15px;
        text-align: center;
    }
    @media (max-width: 700px) {
        .main-card { padding: 16px 4px; }
    }
</style>
<div class="main-card">
    <div class="form-title">
        {{ isset($lowongan) ? 'Edit Lowongan Pekerjaan' : 'Form Tambah Lowongan Pekerjaan' }}
    </div>
    @if(session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif
    <form method="POST" action="{{ isset($lowongan) ? route('admin.lowongan.update', $lowongan->id) : route('admin.lowongan.store') }}" enctype="multipart/form-data">
        @csrf
        @if(isset($lowongan))
            @method('PUT')
        @endif
        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" name="judul" id="judul" placeholder="Judul" value="{{ old('judul', $lowongan->judul ?? '') }}">
            @error('judul') <div class="form-error">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" placeholder="Deskripsi...">{{ old('deskripsi', $lowongan->deskripsi ?? '') }}</textarea>
            @error('deskripsi') <div class="form-error">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label for="kualifikasi">Kualifikasi</label>
            <textarea name="kualifikasi" id="kualifikasi" placeholder="Kualifikasi...">{{ old('kualifikasi', $lowongan->kualifikasi ?? '') }}</textarea>
            @error('kualifikasi') <div class="form-error">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label for="keahlian">Keahlian</label>
            <textarea name="keahlian" id="keahlian" placeholder="Keahlian...">{{ old('keahlian', $lowongan->keahlian ?? '') }}</textarea>
            @error('keahlian') <div class="form-error">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label for="foto">Foto</label>
            <input type="file" name="foto" id="foto" accept="image/*">
            @if(isset($lowongan) && $lowongan->foto)
                <div style="margin-top:8px;">
                    <img src="{{ asset('storage/'.$lowongan->foto) }}" alt="Foto Lowongan" style="max-width:120px;max-height:80px;border-radius:6px;box-shadow:0 2px 8px #0070c91a;">
                </div>
            @endif
            @error('foto') <div class="form-error">{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="btn-submit">{{ isset($lowongan) ? 'Update' : 'Simpan' }}</button>
    </form>
</div>
@endsection 