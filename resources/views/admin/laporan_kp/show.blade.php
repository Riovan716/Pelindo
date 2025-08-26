@extends('layouts.master_admin')
@section('title', 'Detail Laporan KP/PKL')
@section('content')
<div class="diklat-container">
    <div class="diklat-header">
        <h1><i class="fas fa-eye"></i> Detail Laporan KP/PKL</h1>
    </div>
    
    <div class="action-buttons">
        <a href="{{ route('admin.laporan_kp.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
        <a href="{{ route('admin.laporan_kp.edit', $laporanKp->id) }}" class="btn btn-warning">
            <i class="fas fa-edit"></i> Edit
        </a>
        @if($laporanKp->file_path)
            <a href="{{ route('admin.laporan_kp.download', $laporanKp->id) }}" class="btn btn-success">
                <i class="fas fa-download"></i> Download
            </a>
        @endif
    </div>

    <div class="detail-grid">
        <div class="detail-main">
            <div class="detail-card">
                <div class="detail-card-header">
                    <h3><i class="fas fa-info-circle"></i> Informasi Laporan KP/PKL</h3>
                </div>
                <div class="detail-card-body">
                    <div class="detail-row">
                        <div class="detail-label">Judul:</div>
                        <div class="detail-value">{{ $laporanKp->judul }}</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Penulis:</div>
                        <div class="detail-value">{{ $laporanKp->penulis }}</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">NIM:</div>
                        <div class="detail-value">{{ $laporanKp->nim }}</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Program Studi:</div>
                        <div class="detail-value">{{ $laporanKp->program_studi }}</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Asal Kampus:</div>
                        <div class="detail-value">{{ $laporanKp->asal_kampus }}</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Tahun:</div>
                        <div class="detail-value">{{ $laporanKp->tahun }}</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Dosen Pembimbing:</div>
                        <div class="detail-value">{{ $laporanKp->dosen_pembimbing }}</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Instansi Tujuan:</div>
                        <div class="detail-value">{{ $laporanKp->instansi_tujuan }}</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Periode Magang:</div>
                        <div class="detail-value">{{ $laporanKp->periode_magang }}</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Kategori:</div>
                        <div class="detail-value">{{ $laporanKp->kategori ?: '-' }}</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Jumlah Halaman:</div>
                        <div class="detail-value">{{ $laporanKp->jumlah_halaman ?: '-' }}</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Status:</div>
                        <div class="detail-value">
                            @if($laporanKp->status == 'published')
                                <span class="status-badge published">Published</span>
                            @elseif($laporanKp->status == 'draft')
                                <span class="status-badge draft">Draft</span>
                            @else
                                <span class="status-badge archived">Archived</span>
                            @endif
                        </div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Tanggal Upload:</div>
                        <div class="detail-value">{{ $laporanKp->created_at->format('d/m/Y H:i') }}</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Kata Kunci:</div>
                        <div class="detail-value">{{ $laporanKp->kata_kunci }}</div>
                    </div>
                    <div class="detail-row full-width">
                        <div class="detail-label">Abstrak:</div>
                        <div class="detail-value">
                            <div class="abstract-content">
                                {{ $laporanKp->abstrak }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="detail-sidebar">
            <div class="detail-card">
                <div class="detail-card-header">
                    <h3><i class="fas fa-file-alt"></i> File & Cover</h3>
                </div>
                <div class="detail-card-body">
                    @if($laporanKp->cover_image)
                        <div class="cover-section">
                            <h6>Cover Image</h6>
                            <img src="{{ $laporanKp->cover_url }}" alt="Cover" class="cover-image">
                        </div>
                    @endif

                    @if($laporanKp->file_path)
                        <div class="file-section">
                            <h6>File PDF</h6>
                            <div class="file-info">
                                <i class="fas fa-file-pdf fa-2x text-danger"></i>
                                <p><strong>File PDF Tersedia</strong></p>
                                <a href="{{ route('admin.laporan_kp.download', $laporanKp->id) }}" class="btn btn-success btn-block">
                                    <i class="fas fa-download"></i> Download PDF
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="file-section">
                            <h6>File PDF</h6>
                            <div class="file-info">
                                <i class="fas fa-exclamation-triangle fa-2x text-warning"></i>
                                <p class="text-muted">File PDF tidak tersedia</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="detail-card">
                <div class="detail-card-header">
                    <h3><i class="fas fa-cogs"></i> Aksi</h3>
                </div>
                <div class="detail-card-body">
                    <div class="action-list">
                        <a href="{{ route('admin.laporan_kp.edit', $laporanKp->id) }}" class="btn btn-warning btn-block">
                            <i class="fas fa-edit"></i> Edit Laporan KP/PKL
                        </a>
                        <form action="{{ route('admin.laporan_kp.destroy', $laporanKp->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus laporan KP/PKL ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-block">
                                <i class="fas fa-trash"></i> Hapus Laporan KP/PKL
                            </button>
                        </form>
                    </div>
                </div>
            </div>
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
.action-buttons {
    display: flex;
    gap: 12px;
    margin-bottom: 24px;
    justify-content: center;
    flex-wrap: wrap;
}
.btn {
    padding: 10px 20px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
    border: none;
    cursor: pointer;
    transition: all 0.2s;
    display: inline-flex;
    align-items: center;
    gap: 6px;
}
.btn-secondary {
    background: #6c757d;
    color: #fff;
}
.btn-warning {
    background: #ffc107;
    color: #212529;
}
.btn-success {
    background: #28a745;
    color: #fff;
}
.btn-danger {
    background: #dc3545;
    color: #fff;
}
.btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}
.btn-block {
    width: 100%;
    justify-content: center;
}
.detail-grid {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 24px;
}
.detail-card {
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    overflow: hidden;
    border: 1px solid #f0f0f0;
    margin-bottom: 20px;
}
.detail-card-header {
    background: #f8f9fa;
    padding: 16px 20px;
    border-bottom: 1px solid #e9ecef;
}
.detail-card-header h3 {
    margin: 0;
    font-size: 16px;
    font-weight: 600;
    color: #495057;
    display: flex;
    align-items: center;
    gap: 8px;
}
.detail-card-body {
    padding: 20px;
}
.detail-row {
    display: flex;
    margin-bottom: 16px;
    align-items: flex-start;
}
.detail-row.full-width {
    flex-direction: column;
}
.detail-label {
    font-weight: 600;
    color: #495057;
    min-width: 140px;
    margin-right: 16px;
    flex-shrink: 0;
}
.detail-value {
    color: #333;
    flex: 1;
}
.status-badge {
    padding: 4px 8px;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
}
.status-badge.published {
    background: #e8f4e8;
    color: #2e7d32;
}
.status-badge.draft {
    background: #fff3cd;
    color: #856404;
}
.status-badge.archived {
    background: #f8d7da;
    color: #721c24;
}
.abstract-content {
    background: #f8f9fa;
    border: 1px solid #e9ecef;
    border-radius: 8px;
    padding: 16px;
    line-height: 1.6;
    white-space: pre-wrap;
}
.cover-section {
    margin-bottom: 20px;
}
.cover-section h6 {
    margin-bottom: 12px;
    color: #495057;
    font-weight: 600;
}
.cover-image {
    width: 100%;
    max-height: 200px;
    object-fit: cover;
    border-radius: 8px;
    border: 1px solid #e9ecef;
}
.file-section {
    margin-bottom: 20px;
}
.file-section h6 {
    margin-bottom: 12px;
    color: #495057;
    font-weight: 600;
}
.file-info {
    text-align: center;
    padding: 16px;
    background: #f8f9fa;
    border-radius: 8px;
    border: 1px solid #e9ecef;
}
.file-info i {
    margin-bottom: 8px;
}
.file-info p {
    margin-bottom: 12px;
    font-weight: 500;
}
.action-list {
    display: flex;
    flex-direction: column;
    gap: 12px;
}
@media (max-width: 768px) {
    .detail-grid {
        grid-template-columns: 1fr;
    }
    .action-buttons {
        flex-direction: column;
    }
    .detail-row {
        flex-direction: column;
        gap: 4px;
    }
    .detail-label {
        min-width: auto;
        margin-right: 0;
    }
}
</style>
@endsection
