@extends('layouts.master_admin')
@section('title', 'Daftar Lowongan')
@section('content')
<style>
    body {
        background: #f4fbfd;
    }
    .main-card {
        max-width: 1200px;
        margin: 40px auto 0 auto;
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        padding: 32px 32px 28px 32px;
    }
    .header-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        background: #fff;
        padding: 24px 32px;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    }
    .header-section h1 {
        color: #0070c9;
        font-size: 28px;
        font-weight: 700;
        margin: 0;
    }
    .btn-tambah {
        background: #0070c9;
        color: #fff;
        padding: 14px 28px;
        border: none;
        border-radius: 12px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0,112,201,0.3);
    }
    .btn-tambah:hover {
        background: #005fa3;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0,112,201,0.4);
        color: #fff;
        text-decoration: none;
    }
    .btn-tambah .plus-icon {
        font-size: 18px;
        font-weight: 900;
        margin-right: 6px;
        display: flex;
        align-items: center;
    }
    .lowongan-title {
        color: #0070c9;
        font-size: 20px;
        font-weight: 700;
        margin: 24px 0 18px 0;
        text-align: center;
        letter-spacing: 0.2px;
    }
    .lowongan-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 36px;
        margin-top: 18px;
        justify-content: center;
    }
    .lowongan-card {
        background: #fafdff;
        border-radius: 18px;
        box-shadow: 0 4px 24px #0070c91a;
        width: 340px;
        padding: 28px 22px 22px 22px;
        display: flex;
        flex-direction: column;
        align-items: center;
        transition: box-shadow 0.25s, transform 0.25s;
        position: relative;
        border: 1.5px solid #e1e8ed;
    }
    .lowongan-card:hover {
        box-shadow: 0 12px 40px #0070c933;
        transform: translateY(-4px) scale(1.025);
        border-color: #0070c9;
    }
    .lowongan-card img {
        width: 100%;
        max-width: 230px;
        height: 150px;
        object-fit: cover;
        border-radius: 10px;
        margin-bottom: 16px;
        background: #e0e0e0;
        box-shadow: 0 2px 8px #0070c91a;
    }
    .lowongan-card .no-foto {
        width: 100%;
        max-width: 230px;
        height: 150px;
        background: #e0e0e0;
        border-radius: 10px;
        margin-bottom: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #aaa;
        font-size: 1rem;
    }
    .lowongan-card h3 {
        margin: 0 0 10px 0;
        font-size: 1.25rem;
        color: #1f1f1f;
        font-weight: 800;
        text-align: center;
        letter-spacing: 0.2px;
    }
    .lowongan-card .desc {
        font-size: 1.05rem;
        color: #444;
        margin-bottom: 10px;
        min-height: 40px;
        text-align: center;
        font-weight: 500;
    }
    .lowongan-card .meta {
        font-size: 0.98rem;
        color: #0070c9;
        margin-bottom: 4px;
        text-align: center;
        font-weight: 600;
    }
    .lowongan-card .date {
        font-size: 0.93rem;
        color: #aaa;
        margin-top: 10px;
        text-align: center;
        font-style: italic;
    }
    .btn-pendaftar {
        margin-top: 18px;
        color: #fff;
        background: linear-gradient(90deg, #0070c9 60%, #005fa3 100%);
        padding: 12px 32px;
        border-radius: 10px;
        text-decoration: none;
        display: block;
        font-size: 1.08rem;
        font-weight: 700;
        transition: background 0.2s, transform 0.2s;
        box-shadow: 0 2px 12px #0070c933;
        text-align: center;
        border: none;
    }
    .btn-pendaftar:hover {
        background: linear-gradient(90deg, #005fa3 60%, #0070c9 100%);
        transform: translateY(-2px) scale(1.04);
        color: #fff;
    }
    .empty-state {
        text-align: center;
        padding: 60px 20px;
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    }
    .empty-state p {
        color: #666;
        font-size: 16px;
        margin: 0;
    }
    .action-group {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 14px;
        margin-top: 10px;
    }
    .btn-edit, .btn-hapus {
        padding: 9px 22px;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: 700;
        border: none;
        cursor: pointer;
        transition: background 0.18s, box-shadow 0.18s, color 0.18s;
        box-shadow: 0 2px 8px #0070c91a;
        outline: none;
        text-decoration: none;
        display: inline-block;
    }
    .btn-edit {
        background: #ffc107;
        color: #000;
        padding: 8px 16px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        transition: all 0.2s;
        border: none;
        margin-right: 0;
    }
    .btn-edit:hover {
        background: #ffb300;
        color: #000;
        text-decoration: none;
    }
    .btn-hapus {
        background: #dc3545;
        color: #fff;
        padding: 8px 16px;
        border: none;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s;
    }
    .btn-hapus:hover {
        background: #b71c1c;
    }
    .lowongan-list {
        width: 100%;
        margin-top: 18px;
        border-radius: 16px;
        overflow: hidden;
        background: #fff;
        box-shadow: 0 4px 20px rgba(0,0,0,0.07);
    }
    .lowongan-row {
        display: flex;
        align-items: center;
        gap: 32px;
        padding: 28px 36px;
        border-bottom: 1px solid #e0e0e0;
        transition: background 0.18s;
        font-size: 15px;
        background: #fff;
    }
    .lowongan-row:last-child { border-bottom: none; }
    .lowongan-img {
        width: 90px;
        height: 90px;
        border-radius: 12px;
        object-fit: cover;
        background: #e0e0e0;
        box-shadow: 0 2px 8px #0070c91a;
        flex-shrink: 0;
        display: block;
        margin: 0 auto;
    }
    .lowongan-no-foto {
        width: 90px;
        height: 90px;
        background: #e0e0e0;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #aaa;
        font-size: 1.1rem;
        flex-shrink: 0;
        margin: 0 auto;
    }
    .lowongan-info {
        flex: 1;
        min-width: 0;
        display: flex;
        flex-direction: column;
        justify-content: center;
        gap: 4px;
    }
    .lowongan-info h3 {
        margin: 0 0 4px 0;
        font-size: 17px;
        color: #1f1f1f;
        font-weight: 700;
        letter-spacing: 0.1px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .lowongan-info .desc {
        font-size: 15px;
        color: #444;
        margin-bottom: 2px;
        font-weight: 500;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .lowongan-info .meta {
        font-size: 15px;
        color: #0070c9;
        margin-bottom: 2px;
        font-weight: 600;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .lowongan-info .date {
        font-size: 14px;
        color: #aaa;
        margin-top: 2px;
        font-style: italic;
    }
    .lowongan-actions {
        display: flex;
        flex-direction: column;
        gap: 14px;
        align-items: flex-end;
        min-width: 150px;
        justify-content: center;
    }
    .lowongan-actions .btn-pendaftar {
        margin-top: 0;
        width: 140px;
        background: #0070c9;
        color: #fff;
        padding: 12px 0;
        border-radius: 8px;
        font-size: 15px;
        font-weight: 600;
        box-shadow: 0 2px 8px #0070c91a;
        border: none;
        text-align: center;
        transition: background 0.2s;
    }
    .lowongan-actions .btn-pendaftar:hover {
        background: #005fa3;
        color: #fff;
    }
    .lowongan-actions .action-group {
        gap: 10px;
        margin-top: 0;
        display: flex;
        flex-direction: row;
    }
    @media (max-width: 900px) {
        .main-card { padding: 10px 2vw; }
        .header-section { padding: 10px 8px; }
        .lowongan-list { box-shadow: 0 1px 4px #0070c91a; }
        .lowongan-row { gap: 12px; padding: 14px 6px; font-size: 14px; }
        .lowongan-img, .lowongan-no-foto { width: 60px; height: 60px; }
        .lowongan-actions .btn-pendaftar { width: 100px; font-size: 13px; }
        .lowongan-actions { min-width: 90px; }
    }
    @media (max-width: 600px) {
        .main-card { padding: 2px 0; }
        .header-section { flex-direction: column; gap: 8px; }
        .lowongan-title { font-size: 1.1rem; }
        .lowongan-list { border-radius: 8px; }
        .lowongan-row { flex-direction: column; align-items: flex-start; gap: 10px; padding: 12px 4px; }
        .lowongan-actions { flex-direction: row; gap: 8px; width: 100%; justify-content: flex-end; min-width: 0; }
        .lowongan-actions .btn-pendaftar { width: auto; }
        .lowongan-actions .action-group { flex-direction: row; }
        .lowongan-img, .lowongan-no-foto { width: 48px; height: 48px; }
    }
</style>
<div class="main-card">
    <div class="header-section">
        <h1>Daftar Lowongan</h1>
        <a href="{{ route('admin.lowongan.create') }}" class="btn-tambah">
            <span class="plus-icon">&#43;</span> Tambah Lowongan
        </a>
    </div>
    <div class="lowongan-title">Daftar Lowongan</div>
    @if($lowongans->count())
        <div class="lowongan-list">
            @foreach($lowongans as $lowongan)
                <div class="lowongan-row">
                    @if($lowongan->foto)
                        <img src="{{ asset('storage/'.$lowongan->foto) }}" alt="Foto Lowongan" class="lowongan-img">
                    @else
                        <div class="lowongan-no-foto">Tidak ada foto</div>
                    @endif
                    <div class="lowongan-info">
                        <h3 title="{{ $lowongan->judul }}">{{ $lowongan->judul }}</h3>
                        <div class="desc">{{ Str::limit($lowongan->deskripsi, 60) }}</div>
                        <div class="meta"><b>Kualifikasi:</b> {{ Str::limit($lowongan->kualifikasi, 40) }}</div>
                        <div class="meta"><b>Keahlian:</b> {{ Str::limit($lowongan->keahlian, 40) }}</div>
                        <div class="date">Diposting: {{ $lowongan->created_at->format('d M Y') }}</div>
                    </div>
                    <div class="lowongan-actions">
                        <a href="{{ route('admin.lowongan.pendaftar', $lowongan->id) }}" class="btn-pendaftar">Lihat Pendaftar</a>
                        <div class="action-group">
                            <a href="{{ route('admin.lowongan.edit', $lowongan->id) }}" class="btn-edit">Edit</a>
                            <form action="{{ route('admin.lowongan.destroy', $lowongan->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn-hapus">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="empty-state">
            <p>Belum ada data lowongan.</p>
        </div>
    @endif
</div>
<div id="deleteModal" style="display:none;position:fixed;z-index:9999;left:0;top:0;width:100vw;height:100vh;background:rgba(0,0,0,0.18);justify-content:center;align-items:center;">
    <div class="custom-logout-modal">
        <div class="custom-logout-title" id="deleteModalTitle">Apakah Anda yakin ingin menghapus data ini?</div>
        <div class="custom-logout-btns">
            <button id="cancelDeleteBtn" class="custom-logout-btn cancel">Cancel</button>
            <button id="confirmDeleteBtn" class="custom-logout-btn yes">Ya</button>
        </div>
    </div>
</div>
<script>
let deleteForm = null;
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.btn-hapus').forEach(function(btn) {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            deleteForm = btn.closest('form');
            document.getElementById('deleteModal').style.display = 'flex';
        });
    });
    document.getElementById('cancelDeleteBtn').onclick = function() {
        document.getElementById('deleteModal').style.display = 'none';
        deleteForm = null;
    };
    document.getElementById('confirmDeleteBtn').onclick = function() {
        if(deleteForm) deleteForm.submit();
    };
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            document.getElementById('deleteModal').style.display = 'none';
            deleteForm = null;
        }
    });
});
</script>
@endsection
