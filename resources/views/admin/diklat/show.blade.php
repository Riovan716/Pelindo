@extends('layouts.master_admin')
@section('title', 'Detail Diklat')
@section('content')
    <div class="diklat-detail-container">
        <div class="diklat-detail-header">
            <h1><i class="fas fa-info-circle"></i> Detail Diklat</h1>
        </div>
        <div class="diklat-detail-card">
            <div class="detail-row"><span class="detail-label">Judul:</span> <span class="detail-value">{{ $diklat->judul }}</span></div>
            <div class="detail-row"><span class="detail-label">Deskripsi:</span> <span class="detail-value">{{ $diklat->deskripsi }}</span></div>
            <div class="detail-row"><span class="detail-label">Tanggal:</span> <span class="detail-value">{{ $diklat->tanggal }}</span></div>
            <div class="detail-row"><span class="detail-label">File:</span> <span class="detail-value">
                @if($diklat->file)
                    <a href="{{ asset('storage/'.$diklat->file) }}" target="_blank" class="file-link"><i class="fas fa-paperclip"></i> Download File</a>
                @else
                    <span class="file-empty">-</span>
                @endif
            </span></div>
            <div class="detail-actions">
                <a href="{{ route('admin.diklat.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
            </div>
        </div>
    </div>
    <style>
        .diklat-detail-container {
            max-width: 600px;
            margin: 0 auto;
        }
        .diklat-detail-header {
            text-align: center;
            margin-bottom: 24px;
        }
        .diklat-detail-header h1 {
            color: #0070c9;
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        .diklat-detail-card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            padding: 32px 28px 24px 28px;
            border: 1px solid #f0f0f0;
        }
        .detail-row {
            margin-bottom: 18px;
            display: flex;
            gap: 10px;
            align-items: flex-start;
        }
        .detail-label {
            font-weight: 600;
            color: #0070c9;
            min-width: 90px;
            display: inline-block;
        }
        .detail-value {
            color: #333;
            flex: 1;
        }
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
        .detail-actions {
            margin-top: 24px;
            text-align: right;
        }
        .btn-secondary {
            background: #e8f4f8;
            color: #0070c9;
            border: none;
            border-radius: 8px;
            padding: 10px 22px;
            font-weight: 600;
            font-size: 15px;
            transition: all 0.2s;
            text-decoration: none;
        }
        .btn-secondary:hover {
            background: #d0e7f5;
            color: #005fa3;
        }
    </style>
@endsection 