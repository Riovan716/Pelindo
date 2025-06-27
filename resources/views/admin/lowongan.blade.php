@extends('layouts.master_admin')
@section('title', 'Tambah Lowongan')
@section('content')
    @php use Illuminate\Support\Str; @endphp
    <h1>Form Tambah Lowongan Pekerjaan</h1>
    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif
    <form method="POST" action="{{ route('admin.lowongan.store') }}" enctype="multipart/form-data">
        @csrf
        <input type="text" name="judul" placeholder="Judul" value="{{ old('judul') }}"><br>
        @error('judul') <span style="color:red">{{ $message }}</span><br> @enderror

        <textarea name="deskripsi" placeholder="Deskripsi...">{{ old('deskripsi') }}</textarea><br>
        @error('deskripsi') <span style="color:red">{{ $message }}</span><br> @enderror

        <textarea name="kualifikasi" placeholder="Kualifikasi...">{{ old('kualifikasi') }}</textarea><br>
        @error('kualifikasi') <span style="color:red">{{ $message }}</span><br> @enderror

        <textarea name="keahlian" placeholder="Keahlian...">{{ old('keahlian') }}</textarea><br>
        @error('keahlian') <span style="color:red">{{ $message }}</span><br> @enderror

        <input type="file" name="foto" accept="image/*"><br>
        @error('foto') <span style="color:red">{{ $message }}</span><br> @enderror

        <button type="submit">Simpan</button>
    </form>

    <h2 style="margin-top:40px;">Daftar Lowongan</h2>
    @if($lowongans->count())
        <div style="display: flex; flex-wrap: wrap; gap: 24px; margin-top: 20px;">
            @foreach($lowongans as $lowongan)
                <div style="background: #f9f9f9; border-radius: 12px; box-shadow: 0 2px 8px #0001; width: 320px; padding: 18px; display: flex; flex-direction: column; align-items: center;">
                    @if($lowongan->foto)
                        <img src="{{ asset('storage/'.$lowongan->foto) }}" alt="Foto Lowongan" style="width: 100%; max-width: 220px; height: 140px; object-fit: cover; border-radius: 8px; margin-bottom: 12px;">
                    @else
                        <div style="width: 100%; max-width: 220px; height: 140px; background: #e0e0e0; border-radius: 8px; margin-bottom: 12px; display: flex; align-items: center; justify-content: center; color: #aaa;">Tidak ada foto</div>
                    @endif
                    <h3 style="margin: 0 0 8px 0; font-size: 20px; color: #1f1f1f;">{{ $lowongan->judul }}</h3>
                    <div style="font-size: 14px; color: #444; margin-bottom: 8px; min-height: 40px;">{{ Str::limit($lowongan->deskripsi, 60) }}</div>
                    <div style="font-size: 13px; color: #666; margin-bottom: 4px;"><b>Kualifikasi:</b> {{ Str::limit($lowongan->kualifikasi, 40) }}</div>
                    <div style="font-size: 13px; color: #666; margin-bottom: 4px;"><b>Keahlian:</b> {{ Str::limit($lowongan->keahlian, 40) }}</div>
                    <div style="font-size: 12px; color: #aaa; margin-top: 8px;">Diposting: {{ $lowongan->created_at->format('d M Y') }}</div>
                    <a href="{{ route('admin.lowongan.pendaftar', $lowongan->id) }}" style="margin-top:10px; color: #fff; background: #588996; padding: 8px 18px; border-radius: 6px; text-decoration: none; display: inline-block;">Lihat Pendaftar</a>
                </div>
            @endforeach
        </div>
    @else
        <div style="margin-top: 24px; color: #888;">Belum ada data lowongan.</div>
    @endif
@endsection
