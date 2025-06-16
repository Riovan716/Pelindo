@extends('layouts.master_admin')

@section('title', 'Edit Berita')

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

    button[type="submit"] {
        background-color: #007bff;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 16px;
    }

    button[type="submit"]:hover {
        background-color: #0056b3;
    }

    img {
        max-width: 150px;
        border: 1px solid #ddd;
        margin-top: 5px;
    }

    .alert {
        background-color: #f8d7da;
        color: #721c24;
        padding: 10px;
        border: 1px solid #f5c6cb;
        border-radius: 4px;
        margin-bottom: 20px;
    }
</style>

<div class="form-container">
    <h2>Edit Berita</h2>

    @if ($errors->any())
        <div class="alert">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="judul">Judul:</label>
            <input type="text" name="judul" id="judul" value="{{ old('judul', $berita->judul) }}" required>
        </div>

        <div class="form-group">
            <label for="isi">Isi:</label>
            <textarea name="isi" id="isi" rows="6" required>{{ old('isi', $berita->isi) }}</textarea>
        </div>

        <div class="form-group">
            <label>Gambar Saat Ini:</label><br>
            @if($berita->gambar)
                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar Berita">
            @else
                <p><i>Tidak ada gambar</i></p>
            @endif
        </div>

        <div class="form-group">
            <label for="gambar">Ganti Gambar:</label>
            <input type="file" name="gambar" id="gambar">
        </div>

        <button type="submit">Update</button>
    </form>
</div>
@endsection
