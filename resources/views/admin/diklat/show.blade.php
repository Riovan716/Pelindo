@extends('layouts.master_admin')
@section('title', 'Detail Diklat')
@section('content')
    <h1>Detail Diklat</h1>
    <div style="background:#f9f9f9; border-radius:10px; box-shadow:0 2px 8px #0001; padding:24px; max-width:600px; margin:30px auto;">
        <b>Judul:</b> {{ $diklat->judul }}<br>
        <b>Deskripsi:</b> <div style="margin-bottom:8px;">{{ $diklat->deskripsi }}</div>
        <b>Tanggal:</b> {{ $diklat->tanggal }}<br>
        <b>File:</b>
        @if($diklat->file)
            <a href="{{ asset('storage/'.$diklat->file) }}" target="_blank">Download File</a>
        @else
            -
        @endif
        <br>
        <br>
        <a href="{{ route('admin.diklat.index') }}" style="background:#588996; color:#fff; padding:8px 18px; border-radius:6px; text-decoration:none;">Kembali</a>
    </div>
@endsection 