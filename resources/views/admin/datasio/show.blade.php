@extends('layouts.master_admin')
@section('title', 'Detail Data SIO')
@section('content')
    <h1>Detail Data SIO</h1>
    <div style="background:#f9f9f9; border-radius:10px; box-shadow:0 2px 8px #0001; padding:24px; max-width:600px; margin:30px auto;">
        <b>Judul:</b> {{ $datasio->judul }}<br>
        <b>Deskripsi:</b> <div style="margin-bottom:8px;">{{ $datasio->deskripsi }}</div>
        <b>Tanggal Mulai:</b> {{ $datasio->tanggal_mulai }}<br>
        <b>Tanggal Berakhir:</b> {{ $datasio->tanggal_berakhir }}<br>
        <b>File:</b>
        @if($datasio->file)
            <a href="{{ asset('storage/'.$datasio->file) }}" target="_blank">Download File</a>
        @else
            -
        @endif
        <br><br>
        <a href="{{ route('admin.datasio.index') }}" style="background:#588996; color:#fff; padding:8px 18px; border-radius:6px; text-decoration:none;">Kembali</a>
    </div>
@endsection 