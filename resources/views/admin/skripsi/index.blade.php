@extends('layouts.master_admin')
@section('title', 'E-Library Skripsi')
@section('content')
<div class="diklat-container">
    <div class="diklat-header">
        <h1><i class="fas fa-book"></i> E-Library Skripsi</h1>
    </div>
    
    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif
    
    <a href="{{ route('admin.skripsi.create') }}" class="btn btn-primary tambah-btn">
        <i class="fas fa-plus"></i> Tambah Skripsi
    </a>
    
    <!-- Filter Section -->
    <div class="filter-card">
        <form method="GET" action="{{ route('admin.skripsi.index') }}" class="filter-form">
            <div class="filter-row">
                <div class="filter-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari judul, penulis, NIM..." value="{{ request('search') }}">
                </div>
                <div class="filter-group">
                    <select name="status" class="form-control">
                        <option value="">Semua Status</option>
                        <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Published</option>
                        <option value="archived" {{ request('status') == 'archived' ? 'selected' : '' }}>Archived</option>
                    </select>
                </div>
                <div class="filter-group">
                    <select name="tahun" class="form-control">
                        <option value="">Semua Tahun</option>
                        @for($year = date('Y'); $year >= 2000; $year--)
                            <option value="{{ $year }}" {{ request('tahun') == $year ? 'selected' : '' }}>{{ $year }}</option>
                        @endfor
                    </select>
                </div>
                <div class="filter-group">
                    <select name="program_studi" class="form-control">
                        <option value="">Semua Program Studi</option>
                        <option value="Teknik Informatika" {{ request('program_studi') == 'Teknik Informatika' ? 'selected' : '' }}>Teknik Informatika</option>
                        <option value="Sistem Informasi" {{ request('program_studi') == 'Sistem Informasi' ? 'selected' : '' }}>Sistem Informasi</option>
                        <option value="Manajemen Informatika" {{ request('program_studi') == 'Manajemen Informatika' ? 'selected' : '' }}>Manajemen Informatika</option>
                    </select>
                </div>
                <div class="filter-actions">
                    <button type="submit" class="btn btn-info">
                        <i class="fas fa-search"></i> Cari
                    </button>
                    <a href="{{ route('admin.skripsi.index') }}" class="btn btn-secondary">
                        <i class="fas fa-refresh"></i> Reset
                    </a>
                </div>
            </div>
        </form>
    </div>

    <div class="diklat-card">
        <div class="table-responsive">
            @if($skripsi->count() > 0)
                <table class="diklat-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>NIM</th>
                            <th>Program Studi</th>
                            <th>Asal Kampus</th>
                            <th>Tahun</th>
                            <th>Status</th>
                            <th>File</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($skripsi as $index => $item)
                            <tr>
                                <td>{{ $index + 1 + ($skripsi->currentPage() - 1) * $skripsi->perPage() }}</td>
                                <td title="{{ $item->judul }}">
                                    <strong>{{ Str::limit($item->judul, 40) }}</strong>
                                    @if($item->kategori)
                                        <br><small class="text-muted">Kategori: {{ Str::limit($item->kategori, 20) }}</small>
                                    @endif
                                </td>
                                <td title="{{ $item->penulis }}">{{ Str::limit($item->penulis, 25) }}</td>
                                <td>{{ $item->nim }}</td>
                                <td>{{ Str::limit($item->program_studi, 20) }}</td>
                                <td>{{ Str::limit($item->asal_kampus, 20) }}</td>
                                <td>{{ $item->tahun }}</td>
                                <td>
                                    @if($item->status == 'published')
                                        <span class="status-badge published">Published</span>
                                    @elseif($item->status == 'draft')
                                        <span class="status-badge draft">Draft</span>
                                    @else
                                        <span class="status-badge archived">Archived</span>
                                    @endif
                                </td>
                                <td>
                                    @if($item->file_path)
                                        <a href="{{ route('admin.skripsi.download', $item->id) }}" class="file-link" title="Download PDF">
                                            <i class="fas fa-file-pdf"></i> Download
                                        </a>
                                    @else
                                        <span class="file-empty">-</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="aksi-group">
                                        <a href="{{ route('admin.skripsi.show', $item->id) }}" class="aksi-btn detail" title="Lihat Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.skripsi.edit', $item->id) }}" class="aksi-btn edit" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.skripsi.destroy', $item->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus skripsi ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="aksi-btn hapus" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <!-- Pagination -->
                <div class="pagination-container">
                    {{ $skripsi->appends(request()->query())->links() }}
                </div>
            @else
                <div class="empty-state">
                    <i class="fas fa-book fa-3x"></i>
                    <h3>Tidak ada data skripsi</h3>
                    <p>Belum ada skripsi yang ditambahkan ke dalam e-library.</p>
                    <a href="{{ route('admin.skripsi.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Tambah Skripsi Pertama
                    </a>
                </div>
            @endif
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
}
.btn-primary.tambah-btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(0,112,201,0.3);
}
.filter-card {
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    padding: 20px;
    margin-bottom: 20px;
    border: 1px solid #f0f0f0;
}
.filter-form {
    width: 100%;
}
.filter-row {
    display: flex;
    gap: 12px;
    align-items: end;
    flex-wrap: wrap;
}
.filter-group {
    flex: 1;
    min-width: 150px;
}
.filter-actions {
    display: flex;
    gap: 8px;
}
.form-control {
    width: 100%;
    padding: 10px 14px;
    border: 2px solid #e1e8ed;
    border-radius: 8px;
    font-size: 14px;
    transition: all 0.3s ease;
}
.form-control:focus {
    outline: none;
    border-color: #0070c9;
    box-shadow: 0 0 0 2px rgba(0,112,201,0.08);
}
.btn {
    padding: 10px 16px;
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
.btn-info {
    background: #17a2b8;
    color: #fff;
}
.btn-secondary {
    background: #6c757d;
    color: #fff;
}
.btn:hover {
    transform: translateY(-1px);
}
.diklat-card {
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    overflow: hidden;
    border: 1px solid #f0f0f0;
}
.diklat-table {
    width: 100%;
    border-collapse: collapse;
}
.diklat-table th {
    background: #f8f9fa;
    padding: 14px 12px;
    text-align: left;
    font-weight: 600;
    color: #495057;
    border-bottom: 2px solid #e9ecef;
    font-size: 14px;
}
.diklat-table td {
    padding: 12px;
    border-bottom: 1px solid #f0f0f0;
    font-size: 14px;
    vertical-align: top;
}
.diklat-table tr:hover {
    background: #f8f9fa;
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
.file-link {
    color: #0070c9;
    text-decoration: none;
    font-weight: 500;
    display: inline-flex;
    align-items: center;
    gap: 4px;
}
.file-link:hover {
    text-decoration: underline;
}
.file-empty {
    color: #6c757d;
    font-style: italic;
}
.aksi-group {
    display: flex;
    gap: 4px;
}
.aksi-btn {
    width: 32px;
    height: 32px;
    border-radius: 6px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    font-size: 12px;
    transition: all 0.2s;
    border: none;
    cursor: pointer;
}
.aksi-btn.detail {
    background: #17a2b8;
    color: #fff;
}
.aksi-btn.edit {
    background: #ffc107;
    color: #212529;
}
.aksi-btn.hapus {
    background: #dc3545;
    color: #fff;
}
.aksi-btn:hover {
    transform: scale(1.1);
}
.empty-state {
    text-align: center;
    padding: 60px 20px;
    color: #6c757d;
}
.empty-state i {
    margin-bottom: 16px;
    opacity: 0.5;
}
.empty-state h3 {
    margin-bottom: 8px;
    font-size: 18px;
}
.empty-state p {
    margin-bottom: 20px;
    font-size: 14px;
}
.pagination-container {
    padding: 20px;
    display: flex;
    justify-content: center;
}
.text-muted {
    color: #6c757d !important;
}
@media (max-width: 768px) {
    .filter-row {
        flex-direction: column;
    }
    .filter-group {
        min-width: auto;
    }
    .diklat-table {
        font-size: 12px;
    }
    .diklat-table th,
    .diklat-table td {
        padding: 8px 6px;
    }
}
</style>
@endsection
