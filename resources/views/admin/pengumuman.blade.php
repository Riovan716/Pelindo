@extends('layouts.master_admin')

@section('title', 'Daftar Pengumuman')

@section('content')
<style>
    body {
        background: #f4fbfd;
    }
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
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
    .alert {
        padding: 16px 20px;
        border-radius: 8px;
        margin-bottom: 20px;
        font-weight: 600;
    }
    .alert-success {
        background: #d4edda;
        color: #155724;
        border-left: 4px solid #28a745;
    }
    .pengumuman-table {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    }
    .pengumuman-table th {
        background: #0070c9;
        color: #fff;
        font-weight: 700;
        padding: 16px 20px;
        border: none;
        font-size: 15px;
        text-align: left;
    }
    .pengumuman-table td {
        padding: 16px 20px;
        border-bottom: 1px solid #e0e0e0;
        font-size: 15px;
        color: #222;
        background: #fff;
        vertical-align: middle;
    }
    .pengumuman-table tr:last-child td {
        border-bottom: none;
    }
    .pengumuman-table tr:hover {
        background-color: #f8f9fa;
    }
    .pengumuman-table img {
        max-width: 80px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    .btn-edit {
        background: #ffc107;
        color: #000;
        margin-right: 8px;
        padding: 8px 16px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        transition: all 0.2s;
    }
    .btn-edit:hover {
        background: #ffb300;
        color: #000;
        text-decoration: none;
    }
    .btn-delete {
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
    .btn-delete:hover {
        background: #b71c1c;
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
    .aksi-group {
        display: flex;
        gap: 8px;
        align-items: center;
    }
</style>

<div class="container">
    <div class="header-section">
        <h1>Daftar Pengumuman</h1>
        <a href="{{ route('admin.pengumuman.create') }}" class="btn-tambah">
            <span class="plus-icon">&#43;</span> Tambah Pengumuman
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @php use Illuminate\Support\Str; @endphp

    @if($pengumuman->count())
        <table class="pengumuman-table">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Isi</th>
                    <th>File</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengumuman as $item)
                    @php
                        $isImage = $item->file && preg_match('/\.(jpg|jpeg|png|gif|webp)$/i', $item->file);
                        $filePath = $item->file ? asset('storage/' . ltrim($item->file, '/')) : null;
                    @endphp

                    <tr>
                        <td>{{ $item->judul }}</td>
                        <td>{{ Str::limit(strip_tags($item->isi), 100) }}</td>
                        <td>
                            @if ($filePath)
                                @if ($isImage)
                                    <img src="{{ $filePath }}" alt="File">
                                @else
                                    <a href="{{ $filePath }}" target="_blank" class="file-link">Lihat Dokumen</a>
                                @endif
                            @else
                                Tidak ada
                            @endif
                        </td>
                        <td>
                            <div class="aksi-group">
                                <a href="{{ route('admin.pengumuman.edit', $item->id) }}" class="btn-edit">Edit</a>
                                <form action="{{ route('admin.pengumuman.destroy', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn-delete">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="empty-state">
            <p>Tidak ada pengumuman yang tersedia.</p>
        </div>
    @endif
    <div id="deleteModal" style="display:none;position:fixed;z-index:9999;left:0;top:0;width:100vw;height:100vh;background:rgba(0,0,0,0.18);justify-content:center;align-items:center;">
        <div class="custom-logout-modal">
            <div class="custom-logout-title" id="deleteModalTitle">Apakah Anda yakin ingin menghapus pengumuman ini?</div>
            <div class="custom-logout-btns">
                <button id="cancelDeleteBtn" class="custom-logout-btn cancel">Cancel</button>
                <button id="confirmDeleteBtn" class="custom-logout-btn yes">Ya</button>
            </div>
        </div>
    </div>
    <script>
    let deleteForm = null;
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.btn-delete').forEach(function(btn) {
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
</div>
@endsection
