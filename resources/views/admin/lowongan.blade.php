@extends('layouts.master_admin')
@section('title', 'Tambah Lowongan')
@section('content')
    <h1>Form Tambah Lowongan Pekerjaan</h1>
    <form>
        <input type="text" placeholder="Posisi"><br><br>
        <textarea placeholder="Deskripsi..."></textarea><br><br>
        <button type="submit">Simpan</button>
    </form>
@endsection
