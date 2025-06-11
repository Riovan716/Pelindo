@extends('layouts.master_admin')
@section('title', 'Tambah Pengumuman')
@section('content')
    <h1>Form Tambah Pengumuman</h1>
    <form>
        <input type="text" placeholder="Judul"><br><br>
        <textarea placeholder="Isi pengumuman..."></textarea><br><br>
        <input type="file" placeholder="Judul"><br><br>
        <button type="submit">Simpan</button>
    </form>
@endsection
