@extends('layouts.master_admin')
@section('title', 'Detail Pelamar Diterima')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Detail Pelamar Diterima</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.pelamar-diterima.index') }}" class="btn btn-sm btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="text-primary mb-3">Informasi Pelamar</h5>
                            <table class="table table-borderless">
                                <tr>
                                    <td width="150"><strong>Nama:</strong></td>
                                    <td>{{ $pelamar->nama }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Email:</strong></td>
                                    <td>{{ $pelamar->email }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Telepon:</strong></td>
                                    <td>{{ $pelamar->telepon ?? 'Tidak diisi' }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Alamat:</strong></td>
                                    <td>{{ $pelamar->alamat ?? 'Tidak diisi' }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Status:</strong></td>
                                    <td><span class="badge badge-success">Diterima</span></td>
                                </tr>
                                <tr>
                                    <td><strong>Tanggal Daftar:</strong></td>
                                    <td>{{ $pelamar->created_at->format('d/m/Y H:i') }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h5 class="text-primary mb-3">Informasi Lowongan</h5>
                            <table class="table table-borderless">
                                <tr>
                                    <td width="150"><strong>Judul:</strong></td>
                                    <td>{{ $pelamar->lowongan->judul ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Perusahaan:</strong></td>
                                    <td>{{ $pelamar->lowongan->perusahaan ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Lokasi:</strong></td>
                                    <td>{{ $pelamar->lowongan->lokasi ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Jenis:</strong></td>
                                    <td>{{ $pelamar->lowongan->jenis ?? 'N/A' }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    
                    @if($pelamar->cv_path)
                    <div class="row mt-4">
                        <div class="col-12">
                            <h5 class="text-primary mb-3">Dokumen CV</h5>
                            <div class="alert alert-info">
                                <i class="fas fa-file-pdf"></i>
                                <strong>CV Pelamar:</strong> 
                                <a href="{{ asset('storage/' . $pelamar->cv_path) }}" target="_blank" class="btn btn-sm btn-primary ml-2">
                                    <i class="fas fa-download"></i> Download CV
                                </a>
                            </div>
                        </div>
                    </div>
                    @endif
                    
                    <div class="row mt-4">
                        <div class="col-12">
                            <h5 class="text-primary mb-3">Aksi</h5>
                            <form action="{{ route('admin.pelamar-diterima.update-status', $pelamar->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <button type="submit" name="status" value="ditolak" class="btn btn-danger" 
                                        onclick="return confirm('Apakah Anda yakin ingin menolak pelamar ini?')">
                                    <i class="fas fa-times"></i> Tolak Pelamar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.card {
    border: none;
    box-shadow: 0 0 20px rgba(0,0,0,0.08);
    border-radius: 12px;
}

.card-header {
    background: linear-gradient(135deg, #0070c9 0%, #005fa3 100%);
    color: white;
    border-radius: 12px 12px 0 0 !important;
    padding: 20px 25px;
    border: none;
}

.card-title {
    margin: 0;
    font-weight: 600;
    font-size: 18px;
}

.card-tools {
    float: right;
}

.badge {
    padding: 8px 12px;
    font-size: 12px;
    border-radius: 20px;
}

.badge-success {
    background-color: #28a745;
    color: white;
}

.table-borderless td {
    border: none;
    padding: 8px 0;
}

.text-primary {
    color: #0070c9 !important;
}

.mb-3 {
    margin-bottom: 1rem !important;
}

.mt-4 {
    margin-top: 1.5rem !important;
}

.alert {
    border-radius: 8px;
    padding: 15px 20px;
}

.alert-info {
    background-color: #d1ecf1;
    border-color: #bee5eb;
    color: #0c5460;
}

.btn {
    border-radius: 6px;
    padding: 8px 16px;
    font-size: 14px;
}

.btn-sm {
    padding: 6px 12px;
    font-size: 12px;
}

.btn-secondary {
    background-color: #6c757d;
    border-color: #6c757d;
    color: white;
}

.btn-secondary:hover {
    background-color: #5a6268;
    border-color: #545b62;
    color: white;
}

.btn-primary {
    background-color: #0070c9;
    border-color: #0070c9;
    color: white;
}

.btn-primary:hover {
    background-color: #005fa3;
    border-color: #005fa3;
    color: white;
}

.btn-danger {
    background-color: #dc3545;
    border-color: #dc3545;
    color: white;
}

.btn-danger:hover {
    background-color: #c82333;
    border-color: #bd2130;
    color: white;
}

.ml-2 {
    margin-left: 0.5rem !important;
}

.d-inline {
    display: inline !important;
}
</style>
@endsection 