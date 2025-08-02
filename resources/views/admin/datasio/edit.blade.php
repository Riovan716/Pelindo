@extends('layouts.master_admin')
@section('title', 'Edit Data SIO')
@section('content')
    <div class="diklat-form-container">
        <div class="diklat-form-header">
            <h1><i class="fas fa-edit"></i> Edit Data SIO</h1>
            <p>Perbarui data SIO dengan lengkap dan benar</p>
        </div>
        <form method="POST" action="{{ route('admin.datasio.update', $datasio->id) }}" class="diklat-form-card" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Judul</label>
                <input type="text" name="judul" value="{{ old('judul', $datasio->judul) }}" class="form-control @error('judul') is-invalid @enderror">
                @error('judul') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi', $datasio->deskripsi) }}</textarea>
                @error('deskripsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label>Tanggal Mulai</label>
                <input type="date" name="tanggal_mulai" value="{{ old('tanggal_mulai', $datasio->tanggal_mulai) }}" class="form-control @error('tanggal_mulai') is-invalid @enderror">
                @error('tanggal_mulai') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label>Tanggal Berakhir</label>
                <input type="date" name="tanggal_berakhir" value="{{ old('tanggal_berakhir', $datasio->tanggal_berakhir) }}" class="form-control @error('tanggal_berakhir') is-invalid @enderror">
                @error('tanggal_berakhir') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label>File (opsional)</label><br>
                @if($datasio->file)
                    <a href="{{ asset('storage/'.$datasio->file) }}" target="_blank" class="file-link"><i class="fas fa-paperclip"></i> Download File Lama</a><br>
                @endif
                <input type="file" name="file" class="form-control-file @error('file') is-invalid @enderror">
                @error('file') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
                <a href="{{ route('admin.datasio.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
    <style>
        .diklat-form-container {
            max-width: 540px;
            margin: 0 auto;
        }
        .diklat-form-header {
            text-align: center;
            margin-bottom: 24px;
        }
        .diklat-form-header h1 {
            color: #0070c9;
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        .diklat-form-header p {
            color: #666;
            font-size: 15px;
        }
        .diklat-form-card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            padding: 32px 28px 24px 28px;
            border: 1px solid #f0f0f0;
        }
        .form-group {
            margin-bottom: 18px;
        }
        .form-group label {
            font-weight: 600;
            color: #333;
            margin-bottom: 6px;
            display: block;
        }
        .form-control {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e1e8ed;
            border-radius: 10px;
            font-size: 15px;
            transition: all 0.3s ease;
            background: #fff;
        }
        .form-control:focus {
            outline: none;
            border-color: #0070c9;
            box-shadow: 0 0 0 2px rgba(0,112,201,0.08);
        }
        .form-control.is-invalid {
            border-color: #dc3545;
        }
        .invalid-feedback {
            color: #dc3545;
            font-size: 13px;
            margin-top: 4px;
        }
        .form-actions {
            display: flex;
            gap: 12px;
            margin-top: 18px;
        }
        .btn-primary {
            background: linear-gradient(135deg, #0070c9 0%, #005fa3 100%);
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px 28px;
            font-weight: 600;
            font-size: 15px;
            transition: all 0.2s;
            box-shadow: 0 2px 8px rgba(0,112,201,0.08);
        }
        .btn-primary:hover {
            background: #005fa3;
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
        }
        .btn-secondary:hover {
            background: #d0e7f5;
            color: #005fa3;
        }
        .form-control-file {
            border: none;
            background: none;
            padding: 0;
        }
        .file-link {
            color: #0070c9;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 6px;
            display: inline-block;
        }
        .file-link:hover {
            color: #005fa3;
            text-decoration: underline;
        }
    </style>
@endsection 