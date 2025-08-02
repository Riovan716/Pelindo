@extends('layouts.master_admin')
@section('title', 'Data SIO')
@section('content')
    <div class="diklat-container">
        <div class="diklat-header">
            <h1><i class="fas fa-database"></i> Data SIO</h1>
        </div>
        @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif
        <a href="{{ route('admin.datasio.create') }}" class="btn btn-primary tambah-btn"><i class="fas fa-plus"></i> Tambah Data SIO</a>
        <div class="diklat-card">
            <div class="table-responsive">
                <table class="diklat-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Berakhir</th>
                            <th>Tanggal Dibuat</th>
                            <th>File</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($datasios as $index => $d)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td title="{{ $d->judul }}">{{ Str::limit($d->judul, 40) }}</td>
                                <td title="{{ $d->deskripsi }}">{{ Str::limit($d->deskripsi, 30) }}</td>
                                <td>{{ $d->tanggal_mulai }}</td>
                                <td>{{ $d->tanggal_berakhir }}</td>
                                <td>{{ $d->created_at->format('d M Y H:i') }}</td>
                                <td>
                                    @if($d->file)
                                        <a href="{{ asset('storage/'.$d->file) }}" target="_blank" class="file-link"><i class="fas fa-paperclip"></i> Download</a>
                                    @else
                                        <span class="file-empty">-</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="aksi-group">
                                        <a href="{{ route('admin.datasio.show', $d->id) }}" class="aksi-btn detail" title="Lihat Detail"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('admin.datasio.edit', $d->id) }}" class="aksi-btn edit" title="Edit"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('admin.datasio.destroy', $d->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus data ini?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="aksi-btn hapus" title="Hapus"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="8" class="empty-row">Belum ada data.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <style>
        .diklat-container {
            max-width: 1200px;
            margin: 0 auto;
        }
        .diklat-header {
            text-align: center;
            margin-bottom: 24px;
        }
        .diklat-header h1 {
            color: #0070c9;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        .alert-success {
            background: #e8f4e8;
            color: #2e7d32;
            border-left: 4px solid #2e7d32;
            padding: 12px 18px;
            border-radius: 8px;
            margin-bottom: 18px;
            font-size: 15px;
        }
        .btn-primary.tambah-btn {
            margin-bottom: 18px;
            display: inline-block;
            background: linear-gradient(135deg, #0070c9 0%, #005fa3 100%);
            color: #fff;
            padding: 10px 24px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            font-size: 15px;
            transition: all 0.2s;
            box-shadow: 0 2px 8px rgba(0,112,201,0.08);
        }
        .btn-primary.tambah-btn:hover {
            background: #005fa3;
        }
        .diklat-card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            overflow: hidden;
            border: 1px solid #f0f0f0;
        }
        .table-responsive {
            overflow-x: auto;
        }
        .diklat-table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            table-layout: fixed;
        }
        .diklat-table thead {
            background: linear-gradient(135deg, #0070c9 0%, #005fa3 100%);
            color: white;
        }
        .diklat-table th {
            padding: 16px 18px;
            text-align: left;
            font-weight: 600;
            font-size: 15px;
            border: none;
            vertical-align: middle;
        }
        .diklat-table tbody tr {
            border-bottom: 1px solid #f0f0f0;
            transition: background-color 0.2s ease;
        }
        .diklat-table tbody tr:hover {
            background-color: #f8f9fa;
        }
        .diklat-table th, .diklat-table td {
            vertical-align: middle;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .diklat-table th:nth-child(1), .diklat-table td:nth-child(1) { width: 5%; }
        .diklat-table th:nth-child(2), .diklat-table td:nth-child(2) { width: 18%; }
        .diklat-table th:nth-child(3), .diklat-table td:nth-child(3) { width: 18%; }
        .diklat-table th:nth-child(4), .diklat-table td:nth-child(4) { width: 12%; }
        .diklat-table th:nth-child(5), .diklat-table td:nth-child(5) { width: 12%; }
        .diklat-table th:nth-child(6), .diklat-table td:nth-child(6) { width: 14%; }
        .diklat-table th:nth-child(7), .diklat-table td:nth-child(7) { width: 10%; }
        .diklat-table th:nth-child(8), .diklat-table td:nth-child(8) { width: 11%; }
        .file-link {
            color: #0070c9;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: color 0.2s;
        }
        .file-link:hover {
            color: #005fa3;
            text-decoration: underline;
        }
        .file-empty {
            color: #bbb;
            font-size: 15px;
        }
        .aksi-group {
            display: flex;
            gap: 8px;
            justify-content: center;
            align-items: center;
        }
        .aksi-btn {
            display: inline-block;
            background: #e8f4f8;
            color: #0070c9;
            border: none;
            border-radius: 6px;
            padding: 7px 12px;
            font-size: 15px;
            margin-right: 4px;
            text-decoration: none;
            transition: all 0.2s;
            cursor: pointer;
        }
        .aksi-btn.detail:hover {
            background: #0070c9;
            color: #fff;
        }
        .aksi-btn.edit:hover {
            background: #ffecb3;
            color: #ff9800;
        }
        .aksi-btn.hapus:hover {
            background: #ffebee;
            color: #e53935;
        }
        .aksi-btn:focus {
            outline: none;
        }
        .aksi-btn i {
            color: inherit !important;
        }
        .diklat-table td {
            padding: 14px 10px;
            font-size: 15px;
        }
        .diklat-table td[title] {
            cursor: help;
        }
        .empty-row {
            text-align: center;
            color: #888;
            font-size: 15px;
        }
        @media (max-width: 900px) {
            .diklat-table th, .diklat-table td {
                font-size: 13px;
                padding: 10px 5px;
            }
        }
    </style>
@endsection 