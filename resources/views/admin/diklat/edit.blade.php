@extends('layouts.master_admin')
@section('title', 'Edit Diklat')
@section('content')
    <h1>Edit Diklat</h1>
    <form method="POST" action="{{ route('admin.diklat.update', $diklat->id) }}" style="max-width:500px; margin:30px auto; background:#f9f9f9; border-radius:10px; box-shadow:0 2px 8px #0001; padding:24px;">
        @csrf
        @method('PUT')
        <label>Judul</label><br>
        <input type="text" name="judul" value="{{ old('judul', $diklat->judul) }}" style="width:100%;margin-bottom:8px;"><br>
        @error('judul') <span style="color:red">{{ $message }}</span><br> @enderror

        <label>Deskripsi</label><br>
        <textarea name="deskripsi" style="width:100%;margin-bottom:8px;">{{ old('deskripsi', $diklat->deskripsi) }}</textarea><br>
        @error('deskripsi') <span style="color:red">{{ $message }}</span><br> @enderror

        <label>Tanggal</label><br>
        <input type="date" name="tanggal" value="{{ old('tanggal', $diklat->tanggal) }}" style="width:100%;margin-bottom:8px;"><br>
        @error('tanggal') <span style="color:red">{{ $message }}</span><br> @enderror

        <label>File (opsional)</label><br>
        @if($diklat->file)
            <a href="{{ asset('storage/'.$diklat->file) }}" target="_blank">Download File Lama</a><br>
        @endif
        <input type="file" name="file" style="margin-bottom:8px;"><br>
        @error('file') <span style="color:red">{{ $message }}</span><br> @enderror

        <button type="submit" style="margin-top:12px; background:#588996; color:#fff; border:none; padding:10px 24px; border-radius:6px;">Update</button>
        <a href="{{ route('admin.diklat.index') }}" style="margin-left:12px;">Batal</a>
    </form>
@endsection 