@extends('layouts.master_admin')
@section('title', 'Pelamar yang Diterima')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Pelamar yang Diterima</h3>
                    <!-- Badge jumlah pelamar diterima dihapus sesuai permintaan -->
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
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');
body, .card, .card-header, .card-title, .card-body, .table th, .table td {
    font-family: 'Poppins', Arial, Helvetica, sans-serif !important;
}
.card {
    border: none;
    box-shadow: 0 4px 24px rgba(0,0,0,0.10);
    border-radius: 22px;
    margin-top: 32px;
    margin-bottom: 32px;
    overflow: hidden;
    background: #fff;
}
.card-header {
    background: linear-gradient(135deg, #0070c9 0%, #005fa3 100%);
    color: #fff;
    border-radius: 22px 22px 0 0 !important;
    padding: 32px 40px 32px 32px;
    font-size: 26px;
    font-weight: 700;
    min-height: 80px;
    display: flex;
    align-items: center;
    gap: 18px;
    border: none;
}
.card-title {
    font-size: 26px;
    font-weight: 700;
    letter-spacing: 0.5px;
    margin-bottom: 0;
    color: #fff;
    line-height: 1.2;
}
.card-body {
    padding: 32px 32px 32px 32px;
    background: #fff;
    border-radius: 0 0 22px 22px;
}
.table-responsive {
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
}
.table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    background: #fff;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 2px 12px #0070c91a;
    min-width: 700px;
}
.table th {
    background: #eaf4fb;
    color: #0070c9;
    font-weight: 700;
    border: none;
    font-size: 1.08rem;
    padding: 18px 10px;
    text-align: center;
    white-space: nowrap;
}
.table td {
    border: none;
    font-size: 1.01rem;
    padding: 15px 10px;
    vertical-align: middle;
    text-align: center;
    white-space: nowrap;
}
.table tbody tr {
    border-bottom: 1px solid #f0f0f0;
    transition: background 0.2s;
}
.table tbody tr:hover {
    background: #f3faff;
}
.badge-success {
    font-size: 13px;
    padding: 6px 18px;
    border-radius: 16px;
    font-weight: 600;
    letter-spacing: 0.2px;
    background: #28a745;
    color: #fff;
    display: inline-block;
}
@media (max-width: 991.98px) {
    .card-header {
        padding: 20px 16px 20px 16px;
        font-size: 20px;
    }
    .card-body {
        padding: 16px 8px 16px 8px;
    }
    .card-title {
        font-size: 20px;
    }
    .table th, .table td {
        font-size: 0.98rem;
        padding: 10px 4px;
    }
    .table {
        min-width: 600px;
    }
}
@media (max-width: 600px) {
    .card-header {
        flex-direction: column;
        align-items: flex-start;
        padding: 14px 6px 14px 6px;
        font-size: 16px;
    }
    .card-title {
        font-size: 16px;
    }
    .card-body {
        padding: 8px 2px 8px 2px;
    }
    .table th, .table td {
        font-size: 0.93rem;
        padding: 7px 2px;
    }
    .table {
        min-width: 480px;
    }
    .table-responsive {
        padding-bottom: 8px;
    }
}
</style>
@endsection 