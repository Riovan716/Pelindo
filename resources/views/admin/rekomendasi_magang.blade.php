@extends('layouts.master_admin')
@section('title', 'Data Rekomendasi Magang')
@section('content')
<style>
    .table-rekomendasi {
        width: 100%;
        border-collapse: collapse;
        margin-top: 24px;
        background: #fff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 12px #0070c91a;
    }
    .table-rekomendasi th, .table-rekomendasi td {
        padding: 14px 12px;
        border-bottom: 1px solid #e0e0e0;
        text-align: left;
        font-size: 15px;
    }
    .table-rekomendasi th {
        background: #0070c9;
        color: #fff;
        font-weight: 700;
    }
    .table-rekomendasi tr:last-child td {
        border-bottom: none;
    }
    .file-link {
        color: #0070c9;
        text-decoration: underline;
        font-weight: 600;
    }
    .expand-row {
        cursor: pointer;
        transition: background 0.2s;
    }
    .expand-row:hover {
        background: #e6f7ff;
    }
    .mahasiswa-detail-row td {
        background: #f7fbff;
        border-top: none;
        padding-top: 0;
        padding-bottom: 0;
    }
    .mahasiswa-list {
        margin: 0;
        padding: 0 0 0 18px;
        list-style: decimal;
        font-size: 15px;
        color: #0070c9;
    }
</style>
<h2>Data Rekomendasi Magang</h2>
<table class="table-rekomendasi" id="rekomendasi-table">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Kampus</th>
            <th>Email Kampus</th>
            <th>Email Dosen</th>
            <th>Nama Dosen</th>
            <th>File</th>
        </tr>
    </thead>
    <tbody>
        @forelse($rekomendasi as $i => $r)
            <tr class="expand-row" onclick="window.location='{{ route('admin.rekomendasi.mahasiswa', $r->id) }}'" style="cursor:pointer;">
                <td>{{ $i+1 }}</td>
                <td>{{ $r->nama_kampus }}</td>
                <td>{{ $r->email_kampus }}</td>
                <td>{{ $r->email_dosen }}</td>
                <td>{{ $r->nama_dosen }}</td>
                <td>
                    @if($r->file)
                        <a href="{{ asset('storage/'.$r->file) }}" class="file-link" target="_blank">Download</a>
                    @else
                        -
                    @endif
                </td>
            </tr>
        @empty
            <tr><td colspan="6" style="text-align:center;color:#888;">Belum ada data rekomendasi magang.</td></tr>
        @endforelse
    </tbody>
</table>
<script>
</script>
@endsection 