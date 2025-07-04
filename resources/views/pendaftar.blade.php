@extends('layouts.master')
@section('title', 'Daftar Lowongan')
@section('content')
    <h1>Daftar ke Lowongan: {{ $lowongan->judul }}</h1>
    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif
    <form method="POST" action="{{ route('pendaftar.store', $lowongan->id) }}" enctype="multipart/form-data">
        @csrf
        <input type="text" name="nama" placeholder="Nama" value="{{ old('nama') }}"><br>
        @error('nama') <span style="color:red">{{ $message }}</span><br> @enderror

        <input type="text" name="nomor_telepon" placeholder="Nomor Telepon" value="{{ old('nomor_telepon') }}"><br>
        @error('nomor_telepon') <span style="color:red">{{ $message }}</span><br> @enderror

        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}"><br>
        @error('email') <span style="color:red">{{ $message }}</span><br> @enderror

        <input type="text" name="asal_kampus" placeholder="Asal Kampus" value="{{ old('asal_kampus') }}"><br>
        @error('asal_kampus') <span style="color:red">{{ $message }}</span><br> @enderror

        <input type="file" name="berkas[]" multiple><br>
        @error('berkas.*') <span style="color:red">{{ $message }}</span><br> @enderror

        <button type="submit">Kirim</button>
    </form>
@endsection
