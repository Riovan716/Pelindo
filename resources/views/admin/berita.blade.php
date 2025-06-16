@extends('layouts.master_admin')
@section('title', 'Tambah Berita')
@section('content')

<h1>Form Tambah Berita</h1>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>Judul:</label><br>
    <input type="text" name="judul" placeholder="Judul" required><br><br>

    <label>Isi:</label><br>
    <textarea name="isi" placeholder="Isi berita..." rows="5" required></textarea><br><br>

    <label>Upload Gambar:</label><br>
    <input type="file" name="gambar"><br><br>

    <button type="submit">Simpan</
