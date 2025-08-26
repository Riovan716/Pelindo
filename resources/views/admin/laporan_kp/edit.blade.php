@extends('layouts.master_admin')
@section('title', 'Edit Laporan KP/PKL')
@section('content')
<div class="diklat-form-container">
    <div class="diklat-form-header">
        <h1><i class="fas fa-edit"></i> Edit Laporan KP/PKL</h1>
        <p>Perbarui data laporan KP/PKL dengan informasi yang benar</p>
    </div>
    
    <form action="{{ route('admin.laporan_kp.update', $laporanKp->id) }}" method="POST" class="diklat-form-card" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-row">
            <div class="form-group">
                <label>Judul Laporan <span class="required">*</span></label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror" 
                       id="judul" name="judul" value="{{ old('judul', $laporanKp->judul) }}" required>
                @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Nama Penulis <span class="required">*</span></label>
                <input type="text" class="form-control @error('penulis') is-invalid @enderror" 
                       id="penulis" name="penulis" value="{{ old('penulis', $laporanKp->penulis) }}" required>
                @error('penulis')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>NIM <span class="required">*</span></label>
                <input type="text" class="form-control @error('nim') is-invalid @enderror" 
                       id="nim" name="nim" value="{{ old('nim', $laporanKp->nim) }}" required>
                @error('nim')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Program Studi <span class="required">*</span></label>
                <input type="text" class="form-control @error('program_studi') is-invalid @enderror" 
                       id="program_studi" name="program_studi" value="{{ old('program_studi', $laporanKp->program_studi) }}" 
                       placeholder="Contoh: Teknik Informatika, Sistem Informasi" required>
                @error('program_studi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Asal Kampus <span class="required">*</span></label>
                <input type="text" class="form-control @error('asal_kampus') is-invalid @enderror" 
                       id="asal_kampus" name="asal_kampus" value="{{ old('asal_kampus', $laporanKp->asal_kampus) }}" 
                       placeholder="Contoh: Universitas Indonesia, ITB" required>
                @error('asal_kampus')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Tahun <span class="required">*</span></label>
                <select class="form-control @error('tahun') is-invalid @enderror" 
                        id="tahun" name="tahun" required>
                    <option value="">Pilih Tahun</option>
                    @for($year = date('Y'); $year >= 2000; $year--)
                        <option value="{{ $year }}" {{ old('tahun', $laporanKp->tahun) == $year ? 'selected' : '' }}>{{ $year }}</option>
                    @endfor
                </select>
                @error('tahun')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Dosen Pembimbing <span class="required">*</span></label>
                <input type="text" class="form-control @error('dosen_pembimbing') is-invalid @enderror" 
                       id="dosen_pembimbing" name="dosen_pembimbing" value="{{ old('dosen_pembimbing', $laporanKp->dosen_pembimbing) }}" required>
                @error('dosen_pembimbing')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Status <span class="required">*</span></label>
                <select class="form-control @error('status') is-invalid @enderror" 
                        id="status" name="status" required>
                    <option value="">Pilih Status</option>
                    <option value="draft" {{ old('status', $laporanKp->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ old('status', $laporanKp->status) == 'published' ? 'selected' : '' }}>Published</option>
                    <option value="archived" {{ old('status', $laporanKp->status) == 'archived' ? 'selected' : '' }}>Archived</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Instansi Tujuan <span class="required">*</span></label>
                <input type="text" class="form-control @error('instansi_tujuan') is-invalid @enderror" 
                       id="instansi_tujuan" name="instansi_tujuan" value="{{ old('instansi_tujuan', $laporanKp->instansi_tujuan) }}" 
                       placeholder="Contoh: PT. Pelindo Indonesia" required>
                @error('instansi_tujuan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Periode Magang <span class="required">*</span></label>
                <input type="text" class="form-control @error('periode_magang') is-invalid @enderror" 
                       id="periode_magang" name="periode_magang" value="{{ old('periode_magang', $laporanKp->periode_magang) }}" 
                       placeholder="Contoh: Januari - Maret 2024" required>
                @error('periode_magang')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Kategori</label>
                <input type="text" class="form-control @error('kategori') is-invalid @enderror" 
                       id="kategori" name="kategori" value="{{ old('kategori', $laporanKp->kategori) }}" 
                       placeholder="Contoh: Web Development, Database, Network">
                @error('kategori')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Jumlah Halaman</label>
                <input type="number" class="form-control @error('jumlah_halaman') is-invalid @enderror" 
                       id="jumlah_halaman" name="jumlah_halaman" value="{{ old('jumlah_halaman', $laporanKp->jumlah_halaman) }}" 
                       min="1" placeholder="Contoh: 60">
                @error('jumlah_halaman')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Kata Kunci <span class="required">*</span></label>
                <input type="text" class="form-control @error('kata_kunci') is-invalid @enderror" 
                       id="kata_kunci" name="kata_kunci" value="{{ old('kata_kunci', $laporanKp->kata_kunci) }}" 
                       placeholder="Contoh: Laravel, Database, API" required>
                @error('kata_kunci')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group full-width">
                <label>Abstrak <span class="required">*</span></label>
                <textarea class="form-control @error('abstrak') is-invalid @enderror" 
                          id="abstrak" name="abstrak" rows="6" required 
                          placeholder="Masukkan abstrak laporan KP/PKL...">{{ old('abstrak', $laporanKp->abstrak) }}</textarea>
                @error('abstrak')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>File Laporan (PDF)</label>
                <input type="file" class="form-control-file @error('file') is-invalid @enderror" 
                       id="file" name="file" accept=".pdf">
                <small class="form-text">Maksimal 10MB. Format yang diizinkan: PDF</small>
                @if($laporanKp->file_path)
                    <div class="current-file">
                        <small class="text-success">
                            <i class="fas fa-check-circle"></i> File saat ini: {{ basename($laporanKp->file_path) }}
                        </small>
                    </div>
                @endif
                @error('file')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Cover Image</label>
                <input type="file" class="form-control-file @error('cover_image') is-invalid @enderror" 
                       id="cover_image" name="cover_image" accept="image/*">
                <small class="form-text">Maksimal 2MB. Format: JPG, JPEG, PNG</small>
                @if($laporanKp->cover_image)
                    <div class="current-cover">
                        <img src="{{ $laporanKp->cover_url }}" alt="Current Cover" class="current-cover-image">
                        <small class="text-success d-block">
                            <i class="fas fa-check-circle"></i> Cover saat ini
                        </small>
                    </div>
                @endif
                @error('cover_image')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="info-card">
            <h6><i class="fas fa-info-circle"></i> Informasi</h6>
            <ul>
                <li>Kosongkan file jika tidak ingin mengubah</li>
                <li>Ukuran file maksimal 10MB</li>
                <li>Cover image bersifat opsional</li>
                <li>Status "Published" akan menampilkan laporan di e-library publik</li>
                <li>Pastikan data instansi dan periode magang diisi dengan benar</li>
            </ul>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Update Laporan KP/PKL
            </button>
            <a href="{{ route('admin.laporan_kp.show', $laporanKp->id) }}" class="btn btn-secondary">
                <i class="fas fa-times"></i> Batal
            </a>
        </div>
    </form>
</div>

<style>
.diklat-form-container {
    max-width: 800px;
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
.form-row {
    display: flex;
    gap: 16px;
    margin-bottom: 18px;
}
.form-group {
    flex: 1;
}
.form-group.full-width {
    flex: 1 1 100%;
}
.form-group label {
    font-weight: 600;
    color: #333;
    margin-bottom: 6px;
    display: block;
}
.required {
    color: #dc3545;
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
.form-control-file {
    padding: 8px 0;
}
.form-text {
    color: #6c757d;
    font-size: 12px;
    margin-top: 4px;
}
.current-file {
    margin-top: 8px;
    padding: 8px 12px;
    background: #e8f4e8;
    border-radius: 6px;
    border: 1px solid #c3e6cb;
}
.current-cover {
    margin-top: 8px;
    text-align: center;
}
.current-cover-image {
    width: 100%;
    max-height: 100px;
    object-fit: cover;
    border-radius: 6px;
    border: 1px solid #e9ecef;
    margin-bottom: 4px;
}
.info-card {
    background: #e3f2fd;
    border: 1px solid #bbdefb;
    border-radius: 10px;
    padding: 16px;
    margin-bottom: 24px;
}
.info-card h6 {
    color: #1976d2;
    font-weight: 600;
    margin-bottom: 8px;
    display: flex;
    align-items: center;
    gap: 6px;
}
.info-card ul {
    margin: 0;
    padding-left: 20px;
    color: #424242;
    font-size: 14px;
}
.info-card li {
    margin-bottom: 4px;
}
.form-actions {
    display: flex;
    gap: 12px;
    justify-content: center;
    margin-top: 24px;
}
.btn {
    padding: 12px 24px;
    border-radius: 10px;
    text-decoration: none;
    font-weight: 600;
    font-size: 15px;
    border: none;
    cursor: pointer;
    transition: all 0.2s;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}
.btn-primary {
    background: linear-gradient(135deg, #0070c9 0%, #005fa3 100%);
    color: #fff;
}
.btn-secondary {
    background: #6c757d;
    color: #fff;
}
.btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}
@media (max-width: 768px) {
    .form-row {
        flex-direction: column;
        gap: 12px;
    }
    .form-actions {
        flex-direction: column;
    }
    .diklat-form-card {
        padding: 20px 16px;
    }
}
</style>
@endsection
