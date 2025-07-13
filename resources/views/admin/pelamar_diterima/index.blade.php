@extends('layouts.master_admin')
@section('title', 'Pelamar yang Diterima')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Pelamar yang Diterima</h3>
                    <div class="card-tools">
                        <span class="badge badge-success">{{ $pelamarDiterima->count() }} Pelamar Diterima</span>
                    </div>
                </div>
                <div class="card-body">
                    @if($pelamarDiterima->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Lowongan</th>
                                        <th>Tanggal Daftar</th>
                                        <th>Status</th>
                                  
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pelamarDiterima as $index => $pelamar)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $pelamar->nama }}</td>
                                        <td>{{ $pelamar->email }}</td>
                                        <td>{{ $pelamar->lowongan_id ? ($pelamar->lowongan->judul ?? '-') : 'Rekomendasi Magang' }}</td>
                                        <td>{{ $pelamar->created_at->format('d/m/Y H:i') }}</td>
                                        <td>
                                            <span class="badge badge-success">Diterima</span>
                                        </td>
                                        <td>
                                            {{-- Hapus tombol detail, tidak perlu aksi di sini --}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-users fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">Belum ada pelamar yang diterima</h5>
                            <p class="text-muted">Pelamar yang diterima akan muncul di sini</p>
                        </div>
                    @endif
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

.table {
    margin-bottom: 0;
}

.table th {
    background-color: #f8f9fa;
    border-top: none;
    font-weight: 600;
    color: #495057;
    padding: 15px 12px;
}

.table td {
    padding: 15px 12px;
    vertical-align: middle;
}

.btn-sm {
    padding: 6px 12px;
    font-size: 12px;
    border-radius: 6px;
}

.btn-info {
    background-color: #17a2b8;
    border-color: #17a2b8;
    color: white;
}

.btn-info:hover {
    background-color: #138496;
    border-color: #117a8b;
    color: white;
}

.text-center {
    text-align: center;
}

.py-5 {
    padding-top: 3rem;
    padding-bottom: 3rem;
}

.text-muted {
    color: #6c757d !important;
}

.mb-3 {
    margin-bottom: 1rem !important;
}
</style>
@endsection 