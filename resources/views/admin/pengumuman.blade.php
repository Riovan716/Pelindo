@extends('layouts.master_admin')
@section('title', 'Tambah Pengumuman')
@section('content')

<h1>Form Tambah Pengumuman</h1>

{{-- Form Tambah --}}
<form action="{{ url('/pengumuman') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="judul" placeholder="Judul"><br><br>
    <textarea name="isi" placeholder="Isi pengumuman..."></textarea><br><br>
    <input type="file" name="file"><br><br>
    <button type="submit">Simpan</button>
</form>

<hr>

<h2>Daftar Pengumuman Sebelumnya</h2>

@php use Illuminate\Support\Str; @endphp

@forelse ($pengumuman as $item)
    <div style="margin-bottom: 20px; padding: 15px; background: #f0f9ff; border: 1px solid #ccc; border-radius: 10px;">
        <h4>{{ $item->judul }}</h4>
        <p>{{ Str::limit($item->isi, 150) }}</p>

        @php
            $isImage = $item->file && preg_match('/\.(jpg|jpeg|png|gif|webp)$/i', $item->file);
            $filePath = $item->file ? asset('storage/' . ltrim($item->file, '/')) : null;
        @endphp

        @if ($filePath)
            @if ($isImage)
                <img src="{{ $filePath }}" alt="File" width="150" style="border-radius: 10px; margin-top: 10px;">
            @else
                <p><a href="{{ $filePath }}" target="_blank">Lihat Dokumen</a></p>
            @endif
        @endif

        {{-- Tombol Hapus --}}
       {{-- Tombol Hapus --}}
<form action="{{ url( './pengumuman/' .$item->id) }}" method="POST" style="margin-top: 10px;">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('Yakin ingin menghapus pengumuman ini?')" style="background-color: #e74c3c; color: white; border: none; padding: 6px 12px; border-radius: 5px; cursor: pointer;">
        Hapus
    </button>
</form>

    </div>
@empty
    <p>Belum ada pengumuman.</p>
@endforelse

@endsection
