@extends('layouts.master_admin')

@section('title', 'Daftar Berita')

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
    .berita-table-wrapper {
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        overflow: hidden;
        margin-top: 24px;
    }
    .berita-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        background: #fff;
    }
    .berita-table th {
        background: #0070c9;
        color: #fff;
        font-weight: 700;
        padding: 18px 20px;
        border: none;
        font-size: 16px;
        text-align: left;
    }
    .berita-table th:first-child {
        border-top-left-radius: 18px;
    }
    .berita-table th:last-child {
        border-top-right-radius: 18px;
    }
    .berita-table td {
        padding: 18px 20px;
        border-bottom: 1px solid #e0e0e0;
        font-size: 15px;
        color: #222;
        vertical-align: middle;
        background: #fff;
    }
    .berita-table tr:last-child td {
        border-bottom: none;
    }
    .berita-table tr:hover {
        background-color: #f8f9fa;
    }
    .berita-table img {
        max-width: 70px;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.10);
        display: block;
        margin: 0 auto;
    }
    .btn-edit {
        background: #ffc107;
        color: #000;
        margin-right: 8px;
        padding: 8px 18px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 15px;
        font-weight: 600;
        border: none;
        transition: all 0.2s;
        box-shadow: 0 2px 8px rgba(255,193,7,0.08);
    }
    .btn-edit:hover {
        background: #ffb300;
        color: #000;
        text-decoration: none;
    }
    .btn-delete {
        background: #dc3545;
        color: #fff;
        padding: 8px 18px;
        border: none;
        border-radius: 8px;
        font-size: 15px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s;
        box-shadow: 0 2px 8px rgba(220,53,69,0.08);
    }
    .btn-delete:hover {
        background: #b71c1c;
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
    .btn-tambah i {
        font-size: 18px;
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
    @media (max-width: 900px) {
        .container {
            padding: 8px;
        }
        .header-section {
            flex-direction: column;
            gap: 16px;
            padding: 18px 10px;
        }
        .berita-table th, .berita-table td {
            padding: 10px 6px;
            font-size: 13px;
        }
        .berita-table img {
            max-width: 48px;
        }
    }
</style>

<div class="container">
    <div class="header-section">
        <h1>Daftar Berita</h1>
        <a href="{{ route('admin.berita.create') }}" class="btn-tambah">
            <i>+</i>
            Tambah Berita
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($beritas->count())
    <div class="berita-table-wrapper">
        <table class="berita-table">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Isi</th>
                    <th>File</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($beritas as $berita)
                    <tr>
                        <td>{{ $berita->judul }}</td>
                        <td>{{ Str::limit(strip_tags($berita->isi), 100) }}</td>
                        <td>
                            @if($berita->gambar)
                                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar">
                            @else
                                Tidak ada
                            @endif
                        </td>
                        <td>
                            <div class="aksi-group">
                                <a href="{{ route('admin.berita.edit', $berita->id) }}" class="btn-edit">Edit</a>
                                <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST" style="display:inline;">
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
    </div>
    @else
        <div class="empty-state">
            <p>Belum ada berita yang tersedia.</p>
        </div>
    @endif
</div>
<div id="deleteModal" style="display:none;position:fixed;z-index:9999;left:0;top:0;width:100vw;height:100vh;background:rgba(0,0,0,0.18);justify-content:center;align-items:center;">
    <div class="custom-logout-modal">
        <div class="custom-logout-title" id="deleteModalTitle">Apakah Anda yakin ingin menghapus berita ini?</div>
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
@endsection
