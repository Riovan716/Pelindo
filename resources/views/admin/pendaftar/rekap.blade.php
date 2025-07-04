@extends('layouts.master_admin')
@section('title', 'Rekap Pendaftar per Lowongan')
@section('content')
    <h1>Rekap Pendaftar per Lowongan</h1>
    <table border="1" cellpadding="8" style="width:100%; background:#fff; margin-top:12px;">
        <thead>
            <tr>
                <th>Judul Lowongan</th>
                <th>Jumlah Pendaftar</th>
            </tr>
        </thead>
        <tbody>
            @forelse($lowongans as $l)
                <tr>
                    <td>{{ $l->judul }}</td>
                    <td>
                        <a href="{{ route('admin.lowongan.pendaftar', $l->id) }}">{{ $l->pendaftar_count }}</a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="2" style="text-align:center; color:#888;">Belum ada data lowongan.</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection 