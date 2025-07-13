@extends('layouts.master_admin')
@section('title', 'Daftar Mahasiswa Rekomendasi')
@section('content')
<style>
    .table-mahasiswa {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        margin-top: 24px;
        background: #fff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 12px #0070c91a;
    }
    .table-mahasiswa th, .table-mahasiswa td {
        padding: 12px 10px;
        border-bottom: 1px solid #e0e0e0;
        font-size: 15px;
    }
    .table-mahasiswa th {
        background: #0070c9;
        color: #fff;
        font-weight: 700;
        text-align: center;
    }
    .table-mahasiswa td {
        text-align: left;
    }
    .table-mahasiswa tr:last-child td {
        border-bottom: none;
    }
    .table-mahasiswa th.no-col, .table-mahasiswa td.no-col {
        width: 48px;
        min-width: 36px;
        max-width: 60px;
        text-align: center;
        padding-left: 0;
        padding-right: 0;
    }
    .info-box {
        background: #e6f7ff;
        border-radius: 10px;
        padding: 16px 22px;
        margin-bottom: 18px;
        color: #0070c9;
        font-size: 16px;
        font-weight: 500;
        box-shadow: 0 1px 6px #0070c91a;
    }
    @media (max-width: 600px) {
        .table-mahasiswa th, .table-mahasiswa td {
            font-size: 13px;
            padding: 8px 4px;
        }
        .info-box {
            font-size: 14px;
            padding: 10px 8px;
        }
    }
</style>
<h2 style="margin-bottom:18px;">Daftar Mahasiswa Rekomendasi</h2>
<div class="info-box">
    <b>Nama Kampus:</b> {{ $rekomendasi->nama_kampus }}<br>
    <b>Email Kampus:</b> {{ $rekomendasi->email_kampus }}<br>
    <b>Email Dosen:</b> {{ $rekomendasi->email_dosen }}<br>
    <b>Nama Dosen:</b> {{ $rekomendasi->nama_dosen }}
</div>
<table class="table-mahasiswa">
    <thead>
        <tr>
            <th class="no-col">No</th>
            <th>Nama Mahasiswa</th>
        </tr>
    </thead>
    <tbody>
        @forelse($rekomendasi->nama_mahasiswa as $i => $m)
            <tr>
                <td class="no-col">{{ $i+1 }}</td>
                <td>{{ $m->nama }}</td>
            </tr>
        @empty
            <tr><td colspan="2" style="text-align:center;color:#888;">Belum ada nama mahasiswa.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection 