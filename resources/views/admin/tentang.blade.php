@extends('layouts.master_admin')
@section('title', 'Tambah Tentang')
@section('content')
    <h1>Form Tentang Instansi</h1>
    <form>
        <textarea placeholder="Deskripsi tentang organisasi..."></textarea><br><br>
        <button type="submit">Simpan</button>
    </form>
@endsection
