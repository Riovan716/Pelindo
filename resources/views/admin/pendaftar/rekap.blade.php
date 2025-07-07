@extends('layouts.master_admin')
@section('title', 'Rekap Pendaftar per Lowongan')
@section('content')
    <div class="rekap-container">
        <div class="rekap-header">
            <h1><i class="fas fa-chart-bar"></i> Rekap Pendaftar per Lowongan</h1>
            <p>Statistik pendaftar untuk setiap lowongan yang tersedia</p>
        </div>

        <div class="rekap-card">
            @if($lowongans->count() > 0)
                <div class="table-responsive">
                    <table class="rekap-table">
                        <thead>
                            <tr>
                                <th><i class="fas fa-briefcase"></i> Judul Lowongan</th>
                                <th><i class="fas fa-users"></i> Jumlah Pendaftar</th>
                                <th><i class="fas fa-eye"></i> Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lowongans as $l)
                                <tr class="table-row">
                                    <td class="lowongan-title">
                                        <div class="title-wrapper">
                                            <i class="fas fa-file-alt"></i>
                                            <span>{{ $l->judul }}</span>
                                        </div>
                                    </td>
                                    <td class="pendaftar-count">
                                        <span class="count-badge">{{ $l->pendaftar_count }}</span>
                                    </td>
                                    <td class="action-cell">
                                        <a href="{{ route('admin.lowongan.pendaftar', $l->id) }}" class="detail-btn">
                                            <i class="fas fa-eye"></i>
                                            Lihat Detail
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="empty-state">
                    <i class="fas fa-inbox"></i>
                    <h3>Belum ada data lowongan</h3>
                    <p>Data lowongan akan muncul di sini setelah lowongan dibuat</p>
                </div>
            @endif
        </div>
    </div>

    <style>
        .rekap-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .rekap-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .rekap-header h1 {
            color: #0070c9;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
        }

        .rekap-header p {
            color: #666;
            font-size: 16px;
        }

        .rekap-card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            overflow: hidden;
            border: 1px solid #f0f0f0;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .rekap-table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
        }

        .rekap-table thead {
            background: linear-gradient(135deg, #0070c9 0%, #005fa3 100%);
            color: white;
        }

        .rekap-table th {
            padding: 18px 20px;
            text-align: left;
            font-weight: 600;
            font-size: 15px;
            border: none;
            vertical-align: middle;
        }

        .rekap-table th i {
            font-size: 16px;
            margin-right: 8px;
        }

        .rekap-table tbody tr {
            border-bottom: 1px solid #f0f0f0;
            transition: background-color 0.2s ease;
        }

        .rekap-table tbody tr:hover {
            background-color: #f8f9fa;
        }

        .rekap-table td {
            padding: 16px 20px;
            vertical-align: middle;
        }

        .lowongan-title {
            font-weight: 500;
            color: #333;
        }

        .title-wrapper {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .title-wrapper i {
            color: #0070c9;
            font-size: 14px;
        }

        .pendaftar-count {
            text-align: center;
        }

        .count-badge {
            background: linear-gradient(135deg, #0070c9, #005fa3);
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 14px;
            display: inline-block;
            min-width: 40px;
        }

        .action-cell {
            text-align: center;
        }

        .detail-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #f8f9fa;
            color: #0070c9;
            padding: 8px 16px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s ease;
            border: 1px solid #e9ecef;
        }

        .detail-btn:hover {
            background: #0070c9;
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0,112,201,0.2);
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

        .empty-state p {
            font-size: 16px;
            color: #888;
        }

        @media (max-width: 768px) {
            .rekap-table th,
            .rekap-table td {
                padding: 12px 15px;
                font-size: 14px;
            }

            .title-wrapper {
                flex-direction: column;
                align-items: flex-start;
                gap: 4px;
            }

            .detail-btn {
                padding: 6px 12px;
                font-size: 13px;
            }

            .count-badge {
                font-size: 12px;
                padding: 4px 8px;
            }
        }

        @media (max-width: 480px) {
            .rekap-header h1 {
                font-size: 24px;
                flex-direction: column;
                gap: 8px;
            }

            .rekap-table {
                font-size: 13px;
            }

            .rekap-table th,
            .rekap-table td {
                padding: 10px 12px;
            }
        }
    </style>
@endsection 