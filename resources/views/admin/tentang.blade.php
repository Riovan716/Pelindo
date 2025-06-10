@extends('layouts.master_admin')
@section('title', 'Kelola Tentang')
@section('content')

@if(session('success'))
    <div style="color: green">{{ session('success') }}</div>
@endif

<form method="POST" action="{{ $tentang ? route('tentang.update', $tentang->id) : route('tentang.store') }}">
    @csrf
    @if($tentang) @method('PUT') @endif

    <textarea name="isi" rows="10" cols="80" required>{{ old('isi', $tentang->isi ?? '') }}</textarea><br><br>
    <button type="submit">{{ $tentang ? 'Update' : 'Simpan' }}</button>
</form>

@if($tentang)
    <form method="POST" action="{{ route('tentang.destroy', $tentang->id) }}" style="margin-top:20px;">
        @csrf
        @method('DELETE')
        <button type="submit" style="color: red">Hapus</button>
    </form>
@endif

@endsection
