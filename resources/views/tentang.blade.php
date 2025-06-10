@extends('layouts.master')
@section('title', 'Tentang')
@section('content')
    <h1>Tentang PPSDM</h1>
    <p>
        {!! $tentang->isi ?? 'Data tentang belum tersedia.' !!}
    </p>
@endsection
