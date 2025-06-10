@extends('layouts.master_admin')
@section('title', 'Tambah Berita')
@section('content')
    <h1>Form Tambah Berita</h1>
    <form>
        <input type="text" placeholder="Judul"><br><br>
        <textarea placeholder="Isi berita..."></textarea><br><br>
        <button type="submit">Simpan</button>
    </form>
@endsection
