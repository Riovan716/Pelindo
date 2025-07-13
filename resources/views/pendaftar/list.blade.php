@extends('layouts.master_admin')
@section('title', 'Daftar Pendaftar')
@section('content')
    <div class="pendaftar-container">
        <div class="pendaftar-header">
            <h1><i class="fas fa-users"></i> Daftar Pendaftar</h1>
            <p>Untuk Lowongan: <b>{{ $lowongan->judul }}</b></p>
        </div>
        <div class="pendaftar-card">
            @if($pendaftar->count())
                <div class="table-responsive">
                    <table class="pendaftar-table">
                        <thead>
                            <tr>
                                <th><i class="fas fa-user"></i> Nama</th>
                                <th><i class="fas fa-phone"></i> Nomor Telepon</th>
                                <th><i class="fas fa-envelope"></i> Email</th>
                                <th><i class="fas fa-university"></i> Asal Kampus</th>
                                <th><i class="fas fa-file-alt"></i> Berkas</th>
                                <th><i class="fas fa-clock"></i> Waktu Daftar</th>
                                <th><i class="fas fa-cogs"></i> Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pendaftar as $p)
                                <tr>
                                    <td>{{ $p->nama }}</td>
                                    <td>{{ $p->nomor_telepon }}</td>
                                    <td>{{ $p->email }}</td>
                                    <td>{{ $p->asal_kampus }}</td>
                                    <td>
                                        @foreach($p->berkas as $file)
                                            <a href="{{ asset('storage/'.$file) }}" target="_blank" class="berkas-link"><i class="fas fa-paperclip"></i> Lihat File</a><br>
                                        @endforeach
                                    </td>
                                    <td><span class="waktu-badge">{{ $p->created_at->format('d M Y H:i') }}</span></td>
                                    <td>
                                        @if($p->status === 'rejected')
                                            <span style="background:#dc3545;color:#fff;padding:6px 14px;border-radius:8px;font-weight:600;">Rejected</span>
                                        @elseif($p->status === 'accepted')
                                            <span style="background:#28a745;color:#fff;padding:6px 14px;border-radius:8px;font-weight:600;">Accepted</span>
                                        @else
                                            <form action="{{ route('pendaftar.accept', $p->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                <button type="submit" style="background:#28a745;color:#fff;padding:6px 14px;border:none;border-radius:8px;font-weight:600;cursor:pointer;">
                                                    <i class="fas fa-check"></i> Accept
                                                </button>
                                            </form>
                                            <form action="{{ route('pendaftar.reject', $p->id) }}" method="POST" style="display:inline-block;margin-left:6px;">
                                                @csrf
                                                <button type="submit" style="background:#dc3545;color:#fff;padding:6px 14px;border:none;border-radius:8px;font-weight:600;cursor:pointer;">
                                                    <i class="fas fa-times"></i> Reject
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="empty-state">
                    <i class="fas fa-inbox"></i>
                    <h3>Belum ada pendaftar untuk lowongan ini.</h3>
                </div>
            @endif
        </div>
    </div>
    <style>
        .pendaftar-container {
            max-width: 1200px;
            margin: 0 auto;
        }
        .pendaftar-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .pendaftar-header h1 {
            color: #0070c9;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
        }
        .pendaftar-header p {
            color: #666;
            font-size: 16px;
        }
        .pendaftar-card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            overflow: hidden;
            border: 1px solid #f0f0f0;
        }
        .table-responsive {
            overflow-x: auto;
        }
        .pendaftar-table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
        }
        .pendaftar-table thead {
            background: linear-gradient(135deg, #0070c9 0%, #005fa3 100%);
            color: white;
        }
        .pendaftar-table th {
            padding: 16px 18px;
            text-align: left;
            font-weight: 600;
            font-size: 15px;
            border: none;
            vertical-align: middle;
        }
        .pendaftar-table th i {
            font-size: 16px;
            margin-right: 8px;
        }
        .pendaftar-table tbody tr {
            border-bottom: 1px solid #f0f0f0;
            transition: background-color 0.2s ease;
        }
        .pendaftar-table tbody tr:hover {
            background-color: #f8f9fa;
        }
        .pendaftar-table td {
            padding: 14px 18px;
            vertical-align: middle;
        }
        .berkas-link {
            color: #0070c9;
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
            transition: color 0.2s;
        }
        .berkas-link:hover {
            color: #005fa3;
            text-decoration: underline;
        }
        .waktu-badge {
            background: #e8f4f8;
            color: #0070c9;
            padding: 6px 12px;
            border-radius: 16px;
            font-size: 13px;
            font-weight: 600;
            display: inline-block;
        }
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #666;
        }
        .empty-state i {
            font-size: 48px;
            color: #ddd;
            margin-bottom: 20px;
        }
        .empty-state h3 {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 8px;
            color: #333;
        }
        @media (max-width: 768px) {
            .pendaftar-table th,
            .pendaftar-table td {
                padding: 10px 8px;
                font-size: 13px;
            }
            .berkas-link {
                font-size: 12px;
            }
            .waktu-badge {
                font-size: 11px;
                padding: 4px 8px;
            }
        }
    </style>
@endsection
