@extends('layouts.master')
@section('title', 'Daftar Lowongan')
@section('content')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Poppins', 'Segoe UI', 'Roboto', Arial, sans-serif;
    }
    .pendaftar-container {
        width: 100vw;
        min-height: 80vh;
        display: flex;
        align-items: stretch;
        justify-content: center;
        background: #fff;
        margin: 0;
        padding: 0;
    }
    .pendaftar-image {
        flex: 0 0 420px;
        background: linear-gradient(135deg, #e3f6fa, #b2e0f7);
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 80vh;
        max-height: 100vh;
        overflow: hidden;
    }
    .pendaftar-image img {
        max-width: 80%;
        max-height: 70vh;
        border-radius: 18px;
        box-shadow: 0 8px 24px rgba(0,0,0,0.12);
        object-fit: cover;
        background: #fff;
        border: 8px solid #fff;
    }
    .pendaftar-form-section {
        flex: 1;
        padding: 60px 60px 40px 60px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        background: #fff;
    }
    .pendaftar-title {
        font-size: 2.2rem;
        font-weight: 800;
        color: #0b1957;
        margin-bottom: 24px;
        font-family: 'Poppins', 'Segoe UI', 'Roboto', Arial, sans-serif;
        line-height: 1.2;
    }
    .pendaftar-form {
        max-width: 480px;
        width: 100%;
        background: #f9f9f9;
        border-radius: 14px;
        box-shadow: 0 2px 8px #0001;
        padding: 32px 32px 24px 32px;
        margin: 0;
    }
    .pendaftar-form label {
        font-weight: 600;
        color: #0288d1;
        margin-bottom: 4px;
        display: block;
        font-size: 1rem;
    }
    .pendaftar-form input[type="text"],
    .pendaftar-form input[type="email"] {
        width: 100%;
        margin-bottom: 12px;
        padding: 10px 14px;
        border-radius: 8px;
        border: 1px solid #b6e0ef;
        font-size: 1rem;
        font-family: 'Poppins', 'Segoe UI', 'Roboto', Arial, sans-serif;
        background: #fff;
        transition: border 0.2s;
    }
    .pendaftar-form input[type="text"]:focus,
    .pendaftar-form input[type="email"]:focus {
        border: 1.5px solid #0288d1;
        outline: none;
    }
    .pendaftar-form input[type="file"] {
        margin-bottom: 12px;
        font-size: 1rem;
        font-family: 'Poppins', 'Segoe UI', 'Roboto', Arial, sans-serif;
    }
    .pendaftar-form button[type="submit"] {
        margin-top: 16px;
        background: linear-gradient(135deg, #0288d1, #026fa4);
        color: #fff;
        border: none;
        padding: 12px 32px;
        border-radius: 8px;
        font-size: 1.1rem;
        font-weight: 700;
        font-family: 'Poppins', 'Segoe UI', 'Roboto', Arial, sans-serif;
        box-shadow: 0 4px 16px rgba(2,136,209,0.13);
        cursor: pointer;
        transition: background 0.2s, transform 0.2s;
    }
    .pendaftar-form button[type="submit"]:hover {
        background: linear-gradient(135deg, #026fa4, #015a8a);
        transform: translateY(-2px);
    }
    .success-message {
        color: green;
        margin-bottom: 18px;
        font-weight: 600;
    }
    .error-message {
        color: red;
        font-size: 0.98rem;
        margin-bottom: 6px;
    }
    @media (max-width: 900px) {
        .pendaftar-container {
            flex-direction: column;
        }
        .pendaftar-image {
            flex: none;
            width: 100vw;
            min-height: 220px;
            max-height: 320px;
        }
        .pendaftar-form-section {
            padding: 30px 10vw 30px 10vw;
        }
        .pendaftar-title {
            font-size: 1.5rem;
        }
    }
    @media (max-width: 600px) {
        .pendaftar-form-section {
            padding: 20px 4vw 20px 4vw;
        }
        .pendaftar-title {
            font-size: 1.1rem;
        }
        .pendaftar-form {
            padding: 18px 6px 12px 6px;
        }
    }
</style>
<div class="pendaftar-container">
    <div class="pendaftar-image">
        @if($lowongan->foto)
            <img src="{{ asset('storage/'.$lowongan->foto) }}" alt="Foto Lowongan">
        @else
            <img src="{{ asset('images/default-job.png') }}" alt="Gambar Default">
        @endif
    </div>
    <div class="pendaftar-form-section">
        <div class="pendaftar-title">Daftar ke Lowongan: {{ $lowongan->judul }}</div>
        @if(session('success'))
            <div class="success-message">{{ session('success') }}</div>
        @endif
        <form method="POST" action="{{ route('pendaftar.store', $lowongan->id) }}" enctype="multipart/form-data" class="pendaftar-form">
            @csrf
            <label>Nama</label>
            <input type="text" name="nama" placeholder="Nama" value="{{ old('nama') }}">
            @error('nama') <div class="error-message">{{ $message }}</div> @enderror

            <label>Nomor Telepon</label>
            <input type="text" name="nomor_telepon" placeholder="Nomor Telepon" value="{{ old('nomor_telepon') }}">
            @error('nomor_telepon') <div class="error-message">{{ $message }}</div> @enderror

            <label>Email</label>
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
            @error('email') <div class="error-message">{{ $message }}</div> @enderror

            <label>Asal Kampus</label>
            <input type="text" name="asal_kampus" placeholder="Asal Kampus" value="{{ old('asal_kampus') }}">
            @error('asal_kampus') <div class="error-message">{{ $message }}</div> @enderror

            <label>Upload CV/Portofolio (boleh lebih dari 1 file, max 2MB per file)</label>
            <input type="file" name="berkas[]" multiple>
            @error('berkas.*') <div class="error-message">{{ $message }}</div> @enderror

            <button type="submit">Kirim</button>
        </form>
    </div>
</div>
@endsection 