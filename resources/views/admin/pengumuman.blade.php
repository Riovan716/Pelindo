@extends('layouts.master_admin')

@section('title', 'Tambah Pengumuman')

@section('content')
<style>
    .form-container {
        max-width: 700px;
        margin: 30px auto;
        padding: 30px;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
        display: block;
        margin-bottom: 6px;
    }

    input[type="text"],
    textarea,
    input[type="file"] {
        width: 100%;
        padding: 10px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    button,
    .btn {
        padding: 10px 16px;
        font-size: 14px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn-edit {
        background-color: #ffc107;
        color: #000;
    }

    .btn-delete {
        background-color: #dc3545;
        color: #fff;
    }

    .btn:hover {
        opacity: 0.85;
    }

    .table-container {
        margin: 50px auto;
        max-width: 900px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th,
    td {
        padding: 12px;
        border: 1px solid #ccc;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    img {
        max-width: 100px;
        height: auto;
    }
</style>

<div class="form-container">
    <h2>Form Tambah Pengumuman</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form Tambah --}}
    <form action="{{ url('/pengumuman') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="judul">Judul:</label>
            <input type="text" name="judul" id="judul" placeholder="Judul" required>
        </div>

        <div class="form-group">
            <label for="isi">Isi:</label>
            <textarea name="isi" id="isi" rows="6" placeholder="Isi pengumuman..." required></textarea>
        </div>

        <div class="form-group">
            <label for="file">Upload File:</label>
            <input type="file" name="file" id="file">
        </div>

        <button type="submit">Simpan</button>
    </form>
</div>

<div class="table-container">
    <h2>Daftar Pengumuman Sebelumnya</h2>

    @php use Illuminate\Support\Str; @endphp

    @if($pengumuman->count())
        <table>
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
                        <td>{{ Str::limit($item->isi, 100) }}</td>
                        <td>
                            @if ($filePath)
                                @if ($isImage)
                                    <img src="{{ $filePath }}" alt="File">
                                @else
                                    <a href="{{ $filePath }}" target="_blank">Lihat Dokumen</a>
                                @endif
                            @else
                                Tidak ada
                            @endif
                        </td>
                        <td>
                            <form action="{{ url('/pengumuman/' . $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete" onclick="return confirm('Yakin ingin menghapus pengumuman ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Tidak ada pengumuman yang tersedia.</p>
    @endif
</div>
@endsection
