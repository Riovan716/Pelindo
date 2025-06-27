@extends('layouts.master')
@section('title', 'Daftar Lowongan')
@section('content')
    <h1>Daftar ke Lowongan: {{ $lowongan->judul }}</h1>
    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif
    <form method="POST" action="{{ route('pendaftar.store', $lowongan->id) }}" enctype="multipart/form-data" style="max-width:400px; margin:30px auto; background:#f9f9f9; border-radius:10px; box-shadow:0 2px 8px #0001; padding:24px;">
        @csrf
        <label>Nama</label><br>
        <input type="text" name="nama" placeholder="Nama" value="{{ old('nama') }}" style="width:100%;margin-bottom:8px;"><br>
        @error('nama') <span style="color:red">{{ $message }}</span><br> @enderror

        <label>Nomor Telepon</label><br>
        <input type="text" name="nomor_telepon" placeholder="Nomor Telepon" value="{{ old('nomor_telepon') }}" style="width:100%;margin-bottom:8px;"><br>
        @error('nomor_telepon') <span style="color:red">{{ $message }}</span><br> @enderror

        <label>Email</label><br>
        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" style="width:100%;margin-bottom:8px;"><br>
        @error('email') <span style="color:red">{{ $message }}</span><br> @enderror

        <label>Asal Kampus</label><br>
        <input type="text" name="asal_kampus" placeholder="Asal Kampus" value="{{ old('asal_kampus') }}" style="width:100%;margin-bottom:8px;"><br>
        @error('asal_kampus') <span style="color:red">{{ $message }}</span><br> @enderror

        <label>Upload CV/Portofolio (boleh lebih dari 1 file, max 2MB per file)</label><br>
        <input type="file" name="berkas[]" multiple style="margin-bottom:8px;"><br>
        @error('berkas.*') <span style="color:red">{{ $message }}</span><br> @enderror

        <button type="submit" style="margin-top:12px; background:#588996; color:#fff; border:none; padding:10px 24px; border-radius:6px;">Kirim</button>
    </form>
@endsection 