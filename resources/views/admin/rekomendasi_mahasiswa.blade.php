@extends('layouts.master_admin')
@section('title', 'Daftar Mahasiswa Rekomendasi')
@section('content')
<style>
    .table-mahasiswa {
        width: 100%;
        border-collapse: collapse;
        margin-top: 24px;
        background: #fff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 12px #0070c91a;
    }
    .table-mahasiswa th, .table-mahasiswa td {
        padding: 14px 12px;
        border-bottom: 1px solid #e0e0e0;
        text-align: left;
        font-size: 15px;
    }
    .table-mahasiswa th {
        background: #0070c9;
        color: #fff;
        font-weight: 700;
    }
    .table-mahasiswa tr:last-child td {
        border-bottom: none;
    }
    .info-box {
        background: #e6f7ff;
        border-radius: 10px;
        padding: 16px 22px;
        margin-bottom: 18px;
        color: #0070c9;
        font-size: 16px;
        font-weight: 500;
    }
</style>
<h2>Daftar Mahasiswa Rekomendasi</h2>
<div class="info-box">
    <b>Nama Kampus:</b> {{ $rekomendasi->nama_kampus }}<br>
    <b>Email Kampus:</b> {{ $rekomendasi->email_kampus }}<br>
    <b>Email Dosen:</b> {{ $rekomendasi->email_dosen }}<br>
    <b>Nama Dosen:</b> {{ $rekomendasi->nama_dosen }}
</div>
<table class="table-mahasiswa">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Mahasiswa</th>
        </tr>
    </thead>
    <tbody>
        @forelse($rekomendasi->nama_mahasiswa as $i => $m)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $m->nama }}</td>
            </tr>
        @empty
            <tr><td colspan="2" style="text-align:center;color:#888;">Belum ada nama mahasiswa.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection 