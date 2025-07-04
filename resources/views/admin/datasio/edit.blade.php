@extends('layouts.master_admin')
@section('title', 'Edit Data SIO')
@section('content')
    <h1>Edit Data SIO</h1>
    <form method="POST" action="{{ route('admin.datasio.update', $datasio->id) }}" enctype="multipart/form-data" style="max-width:500px; margin:30px auto; background:#f9f9f9; border-radius:10px; box-shadow:0 2px 8px #0001; padding:24px;">
        @csrf
        @method('PUT')
        <label>Judul</label><br>
        <input type="text" name="judul" value="{{ old('judul', $datasio->judul) }}" style="width:100%;margin-bottom:8px;"><br>
        @error('judul') <span style="color:red">{{ $message }}</span><br> @enderror

        <label>Deskripsi</label><br>
        <textarea name="deskripsi" style="width:100%;margin-bottom:8px;">{{ old('deskripsi', $datasio->deskripsi) }}</textarea><br>
        @error('deskripsi') <span style="color:red">{{ $message }}</span><br> @enderror

        <label>Tanggal Mulai</label><br>
        <input type="date" name="tanggal_mulai" value="{{ old('tanggal_mulai', $datasio->tanggal_mulai) }}" style="width:100%;margin-bottom:8px;"><br>
        @error('tanggal_mulai') <span style="color:red">{{ $message }}</span><br> @enderror

        <label>Tanggal Berakhir</label><br>
        <input type="date" name="tanggal_berakhir" value="{{ old('tanggal_berakhir', $datasio->tanggal_berakhir) }}" style="width:100%;margin-bottom:8px;"><br>
        @error('tanggal_berakhir') <span style="color:red">{{ $message }}</span><br> @enderror

        <label>File (opsional)</label><br>
        @if($datasio->file)
            <a href="{{ asset('storage/'.$datasio->file) }}" target="_blank">Download File Lama</a><br>
        @endif
        <input type="file" name="file" style="margin-bottom:8px;"><br>
        @error('file') <span style="color:red">{{ $message }}</span><br> @enderror

        <button type="submit" style="margin-top:12px; background:#588996; color:#fff; border:none; padding:10px 24px; border-radius:6px;">Update</button>
        <a href="{{ route('admin.datasio.index') }}" style="margin-left:12px;">Batal</a>
    </form>
@endsection 