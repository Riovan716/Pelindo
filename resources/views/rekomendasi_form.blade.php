@extends('layouts.master')
@section('title', 'Form Rekomendasi Magang')
@section('content')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700&display=swap" rel="stylesheet">
<style>
    .form-section {
        max-width: 600px;
        margin: 40px auto;
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
    input[type="text"], input[type="email"], input[type="file"] {
        width: 100%;
        padding: 12px 16px;
        font-size: 15px;
        border: 2px solid #e1e8ed;
        border-radius: 10px;
        background: #fff;
        transition: all 0.3s ease;
    }
    input[type="text"]:focus, input[type="email"]:focus {
        outline: none;
        border-color: #0070c9;
        box-shadow: 0 0 0 2px rgba(0,112,201,0.08);
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
    .btn-add, .btn-remove {
        background: #0070c9;
        color: #fff;
        border: none;
        border-radius: 6px;
        padding: 6px 14px;
        font-size: 13px;
        margin-left: 8px;
        cursor: pointer;
    }
    .btn-remove { background: #dc3545; }
    .btn-add:hover { background: #005fa3; }
    .btn-remove:hover { background: #a71d2a; }
</style>
<div class="form-section">
    <div class="form-title">Form Rekomendasi Magang</div>
    @if(session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif
    <form method="POST" action="{{ route('rekomendasi.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nama_kampus">Nama Kampus</label>
            <input type="text" name="nama_kampus" id="nama_kampus" value="{{ old('nama_kampus') }}">
            @error('nama_kampus') <div class="form-error">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label for="email_kampus">Email Kampus</label>
            <input type="email" name="email_kampus" id="email_kampus" value="{{ old('email_kampus') }}">
            @error('email_kampus') <div class="form-error">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label for="email_dosen">Email Dosen</label>
            <input type="email" name="email_dosen" id="email_dosen" value="{{ old('email_dosen') }}">
            @error('email_dosen') <div class="form-error">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label for="nama_dosen">Nama Dosen</label>
            <input type="text" name="nama_dosen" id="nama_dosen" value="{{ old('nama_dosen') }}">
            @error('nama_dosen') <div class="form-error">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label for="file">Upload File (opsional)</label>
            <input type="file" name="file" id="file">
            @error('file') <div class="form-error">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label>Nama Mahasiswa</label>
            <div id="mahasiswa-list">
                <div style="display:flex;align-items:center;margin-bottom:6px;">
                    <input type="text" name="nama_mahasiswa[]" placeholder="Nama Mahasiswa" style="flex:1;">
                    <button type="button" class="btn-add" onclick="addMahasiswa()">+</button>
                </div>
            </div>
            @error('nama_mahasiswa') <div class="form-error">{{ $message }}</div> @enderror
            @error('nama_mahasiswa.*') <div class="form-error">{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="btn-submit">Kirim</button>
    </form>
</div>
<script>
function addMahasiswa() {
    const list = document.getElementById('mahasiswa-list');
    const div = document.createElement('div');
    div.style.display = 'flex';
    div.style.alignItems = 'center';
    div.style.marginBottom = '6px';
    div.innerHTML = `<input type="text" name="nama_mahasiswa[]" placeholder="Nama Mahasiswa" style="flex:1;">
        <button type="button" class="btn-remove" onclick="removeMahasiswa(this)">-</button>`;
    list.appendChild(div);
}
function removeMahasiswa(btn) {
    btn.parentElement.remove();
}
</script>
@endsection 