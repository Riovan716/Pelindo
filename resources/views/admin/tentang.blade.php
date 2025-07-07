@extends('layouts.master_admin')
@section('title', 'Kelola Tentang')
@section('content')

<style>
    body {
        background: #f4fbfd;
    }
    
    .main-card {
        max-width: 1000px;
        margin: 40px auto 0 auto;
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 6px 32px rgba(0,112,201,0.08);
        padding: 36px 36px 32px 36px;
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
    
    .success-message {
        background: #d4edda;
        color: #155724;
        padding: 16px 20px;
        border-radius: 12px;
        margin-bottom: 24px;
        border-left: 4px solid #28a745;
        font-weight: 500;
    }
    
    .form-section {
        background: #fff;
        border-radius: 16px;
        padding: 32px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        margin-bottom: 24px;
    }
    
    .form-group {
        margin-bottom: 24px;
    }
    
    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #333;
        font-size: 16px;
    }
    
    .form-control {
        width: 100%;
        padding: 16px 20px;
        border: 2px solid #e1e8ed;
        border-radius: 12px;
        font-size: 16px;
        font-family: inherit;
        transition: all 0.3s ease;
        resize: vertical;
        min-height: 200px;
    }
    
    .form-control:focus {
        outline: none;
        border-color: #0070c9;
        box-shadow: 0 0 0 3px rgba(0,112,201,0.1);
    }
    
    .btn-primary {
        background: #0070c9;
        color: #fff;
        padding: 14px 28px;
        border: none;
        border-radius: 12px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0,112,201,0.3);
        margin-right: 12px;
    }
    
    .btn-primary:hover {
        background: #005fa3;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0,112,201,0.4);
    }
    
    .btn-danger {
        background: #dc3545;
        color: #fff;
        padding: 14px 28px;
        border: none;
        border-radius: 12px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(220,53,69,0.3);
    }
    
    .btn-danger:hover {
        background: #c82333;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(220,53,69,0.4);
    }
    
    .preview-section {
        background: #f8fafc;
        border-radius: 16px;
        padding: 32px;
        margin-top: 24px;
        border: 2px solid #e1e8ed;
    }
    
    .preview-section h3 {
        color: #0070c9;
        font-size: 20px;
        font-weight: 600;
        margin-bottom: 16px;
    }
    
    .preview-content {
        background: #fff;
        padding: 24px;
        border-radius: 12px;
        border-left: 4px solid #0070c9;
        font-size: 16px;
        line-height: 1.6;
        color: #333;
    }
    
    .empty-state {
        text-align: center;
        padding: 40px 20px;
        color: #666;
        font-style: italic;
    }
    
    @media (max-width: 768px) {
        .main-card {
            margin: 20px;
            padding: 24px;
        }
        
        .header-section {
            flex-direction: column;
            gap: 16px;
            text-align: center;
        }
        
        .header-section h1 {
            font-size: 24px;
        }
        
        .form-section {
            padding: 24px;
        }
        
        .btn-primary, .btn-danger {
            width: 100%;
            margin-bottom: 12px;
        }
    }
</style>

<div class="main-card">
    <div class="header-section">
        <h1>Kelola Halaman Tentang</h1>
    </div>
    
    @if(session('success'))
        <div class="success-message">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif
    
    <div class="form-section">
        <form method="POST" action="{{ $tentang ? route('admin.tentang.update', $tentang->id) : route('admin.tentang.store') }}">
            @csrf
            @if($tentang) @method('PUT') @endif
            
            <div class="form-group">
                <label for="isi">Konten Tentang PPSDM</label>
                <textarea 
                    id="isi" 
                    name="isi" 
                    class="form-control" 
                    placeholder="Masukkan konten tentang PPSDM yang akan ditampilkan di halaman publik..."
                    required
                >{{ old('isi', $tentang->isi ?? '') }}</textarea>
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn-primary">
                    <i class="fas fa-save"></i> {{ $tentang ? 'Update Tentang' : 'Simpan Tentang' }}
                </button>
                
                @if($tentang)
                    <button type="button" class="btn-danger" onclick="confirmDelete()">
                        <i class="fas fa-trash"></i> Hapus Tentang
                    </button>
                @endif
            </div>
        </form>
        
        @if($tentang)
            <form id="deleteForm" method="POST" action="{{ route('admin.tentang.destroy', $tentang->id) }}" style="display: none;">
                @csrf
                @method('DELETE')
            </form>
        @endif
    </div>
    
    @if($tentang && $tentang->isi)
        <div class="preview-section">
            <h3><i class="fas fa-eye"></i> Preview Konten</h3>
            <div class="preview-content">
                {!! nl2br(e($tentang->isi)) !!}
            </div>
        </div>
    @else
        <div class="preview-section">
            <div class="empty-state">
                <i class="fas fa-info-circle"></i> Belum ada konten tentang yang tersimpan
            </div>
        </div>
    @endif
</div>

<script>
function confirmDelete() {
    if (confirm('Apakah Anda yakin ingin menghapus konten tentang ini? Tindakan ini tidak dapat dibatalkan.')) {
        document.getElementById('deleteForm').submit();
    }
}
</script>

@endsection
