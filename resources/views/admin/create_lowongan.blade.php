@extends('layouts.master_admin')
@section('title', 'Tambah Lowongan')
@section('content')
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');
body, .main-card, .form-title, .form-group label, .form-control, .btn-submit {
    font-family: 'Poppins', Arial, Helvetica, sans-serif !important;
}
.main-card {
    max-width: 520px;
    margin: 40px auto 0 auto;
    background: #fff;
    border-radius: 22px;
    box-shadow: 0 6px 32px rgba(0,112,201,0.10);
    padding: 38px 38px 32px 38px;
    border: none;
}
.form-title {
    color: #0070c9;
    font-size: 2rem;
    font-weight: 800;
    margin-bottom: 28px;
    text-align: center;
    letter-spacing: 0.5px;
}
.form-group {
    margin-bottom: 22px;
}
.form-group label {
    font-weight: 700;
    color: #005fa3;
    font-size: 1.08rem;
    margin-bottom: 7px;
    display: block;
}
.form-control, input[type="text"], textarea, input[type="file"] {
    width: 100%;
    padding: 14px 18px;
    font-size: 1rem;
    border: 2px solid #e1e8ed;
    border-radius: 12px;
    background: #fff;
    transition: border 0.2s, box-shadow 0.2s;
    box-sizing: border-box;
    margin-bottom: 0;
}
input[type="text"]:focus, textarea:focus {
    outline: none;
    border-color: #0070c9;
    box-shadow: 0 0 0 2px rgba(0,112,201,0.10);
}
textarea {
    min-height: 90px;
    resize: vertical;
}
.form-error {
    color: #dc3545;
    font-size: 13px;
    margin-top: 2px;
    margin-bottom: 4px;
}
input[type="file"] {
    padding: 10px 12px;
    border: 2px dashed #0070c9;
    background: #f8f9ff;
    cursor: pointer;
    margin-bottom: 0;
}
input[type="file"]:hover {
    background: #e8f4ff;
}
.preview-foto {
    margin-top: 14px;
    margin-bottom: 18px;
    display: flex;
    align-items: center;
    gap: 18px;
}
.preview-foto img {
    max-width: 110px;
    max-height: 110px;
    border-radius: 16px;
    border: 2px solid #e1e8ed;
    box-shadow: 0 2px 8px #0070c91a;
    background: #f4fbfd;
}
.btn-submit {
    background: linear-gradient(90deg, #0070c9 60%, #005fa3 100%);
    color: #fff;
    padding: 14px 0;
    border: none;
    border-radius: 12px;
    font-size: 1.08rem;
    font-weight: 700;
    cursor: pointer;
    width: 100%;
    margin-top: 10px;
    box-shadow: 0 2px 12px #0070c933;
    transition: background 0.2s, transform 0.2s;
    display: block;
    letter-spacing: 0.2px;
}
.btn-submit:hover {
    background: linear-gradient(90deg, #005fa3 60%, #0070c9 100%);
    transform: translateY(-2px) scale(1.03);
    color: #fff;
}
@media (max-width: 700px) {
    .main-card { padding: 16px 4px; }
    .form-title { font-size: 1.3rem; }
    .btn-submit { font-size: 1rem; }
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
            <input type="text" name="judul" id="judul" placeholder="Judul" value="{{ old('judul', $lowongan->judul ?? '') }}" class="form-control">
            @error('judul') <div class="form-error">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" placeholder="Deskripsi..." class="form-control">{{ old('deskripsi', $lowongan->deskripsi ?? '') }}</textarea>
            @error('deskripsi') <div class="form-error">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label for="kualifikasi">Kualifikasi</label>
            <textarea name="kualifikasi" id="kualifikasi" placeholder="Kualifikasi..." class="form-control">{{ old('kualifikasi', $lowongan->kualifikasi ?? '') }}</textarea>
            @error('kualifikasi') <div class="form-error">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label for="keahlian">Keahlian</label>
            <textarea name="keahlian" id="keahlian" placeholder="Keahlian..." class="form-control">{{ old('keahlian', $lowongan->keahlian ?? '') }}</textarea>
            @error('keahlian') <div class="form-error">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label for="foto">Foto</label>
            <input type="file" name="foto" id="foto" accept="image/*" class="form-control">
            @if(isset($lowongan) && $lowongan->foto)
                <div class="preview-foto">
                    <img src="{{ asset('storage/'.$lowongan->foto) }}" alt="Foto Lowongan">
                </div>
            @endif
            @error('foto') <div class="form-error">{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="btn-submit">{{ isset($lowongan) ? 'Update' : 'Simpan' }}</button>
    </form>
</div>
@endsection 