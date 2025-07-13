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
    .file-link, .review-link {
        color: #fff;
        background: #0070c9;
        border: none;
        border-radius: 6px;
        padding: 6px 16px;
        margin: 0 4px 0 0;
        text-decoration: none;
        font-weight: 600;
        font-size: 14px;
        transition: background 0.2s;
        display: inline-block;
        text-align: center;
    }
    .file-link:last-child, .review-link:last-child {
        margin-right: 0;
    }
    .file-action-group {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 8px;
    }
    @media (max-width: 600px) {
        .file-link, .review-link {
            font-size: 12px;
            padding: 5px 8px;
        }
        .file-action-group {
            gap: 4px;
        }
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
            <tr class="expand-row">
                <td onclick="window.location='{{ route('admin.rekomendasi.mahasiswa', $r->id) }}'" style="cursor:pointer;">{{ $i+1 }}</td>
                <td onclick="window.location='{{ route('admin.rekomendasi.mahasiswa', $r->id) }}'" style="cursor:pointer;">{{ $r->nama_kampus }}</td>
                <td onclick="window.location='{{ route('admin.rekomendasi.mahasiswa', $r->id) }}'" style="cursor:pointer;">{{ $r->email_kampus }}</td>
                <td onclick="window.location='{{ route('admin.rekomendasi.mahasiswa', $r->id) }}'" style="cursor:pointer;">{{ $r->email_dosen }}</td>
                <td onclick="window.location='{{ route('admin.rekomendasi.mahasiswa', $r->id) }}'" style="cursor:pointer;">{{ $r->nama_dosen }}</td>
                <td style="min-width:120px;">
                    @if($r->file)
                        <div class="file-action-group">
                            <a href="{{ asset('storage/'.$r->file) }}" class="file-link" download onclick="event.stopPropagation();">Download</a>
                            <a href="{{ asset('storage/'.$r->file) }}" class="review-link" target="_blank" onclick="event.stopPropagation();">Review</a>
                        </div>
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