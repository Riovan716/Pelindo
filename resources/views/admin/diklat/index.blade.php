@extends('layouts.master_admin')
@section('title', 'Daftar Diklat')
@section('content')
    <h1>Daftar Diklat</h1>
    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif
    <a href="{{ route('admin.diklat.create') }}" style="margin-bottom:18px; display:inline-block; background:#588996; color:#fff; padding:10px 24px; border-radius:6px; text-decoration:none;">Tambah Diklat</a>
    <table border="1" cellpadding="8" style="width:100%; background:#fff; margin-top:12px;">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Deskripsi</th>
                <th>File</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($diklats as $d)
                <tr>
                    <td>{{ $d->judul }}</td>
                    <td>{{ $d->tanggal }}</td>
                    <td>{{ Str::limit($d->deskripsi, 60) }}</td>
                    <td>
                        @if($d->file)
                            <a href="{{ asset('storage/'.$d->file) }}" target="_blank">Download</a>
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.diklat.show', $d->id) }}">Detail</a> |
                        <a href="{{ route('admin.diklat.edit', $d->id) }}">Edit</a> |
                        <form action="{{ route('admin.diklat.destroy', $d->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus?')">
                            @csrf @method('DELETE')
                            <button type="submit" style="color:red; background:none; border:none; cursor:pointer;">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" style="text-align:center; color:#888;">Belum ada data.</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection 