@extends('layouts.master_admin')
@section('title', 'Data SIO')
@section('content')
    <h1>Data SIO</h1>
    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif
    <a href="{{ route('admin.datasio.create') }}" style="margin-bottom:18px; display:inline-block; background:#588996; color:#fff; padding:10px 24px; border-radius:6px; text-decoration:none;">Tambah Data SIO</a>
    <table border="1" cellpadding="8" style="width:100%; background:#fff; margin-top:12px;">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Berakhir</th>
                <th>Tanggal Dibuat</th>
                <th>File</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($datasios as $d)
                <tr>
                    <td>{{ $d->judul }}</td>
                    <td>{{ Str::limit($d->deskripsi, 60) }}</td>
                    <td>{{ $d->tanggal_mulai }}</td>
                    <td>{{ $d->tanggal_berakhir }}</td>
                    <td>{{ $d->created_at->format('d M Y H:i') }}</td>
                    <td>
                        @if($d->file)
                            <a href="{{ asset('storage/'.$d->file) }}" target="_blank">Download</a>
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.datasio.show', $d->id) }}">Detail</a> |
                        <a href="{{ route('admin.datasio.edit', $d->id) }}">Edit</a> |
                        <form action="{{ route('admin.datasio.destroy', $d->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus?')">
                            @csrf @method('DELETE')
                            <button type="submit" style="color:red; background:none; border:none; cursor:pointer;">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="7" style="text-align:center; color:#888;">Belum ada data.</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection 