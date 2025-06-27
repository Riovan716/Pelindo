@extends('layouts.master_admin')
@section('title', 'Daftar Pendaftar')
@section('content')
    <h1>Daftar Pendaftar untuk Lowongan: <b>{{ $lowongan->judul }}</b></h1>
    @if($pendaftar->count())
        <table border="1" cellpadding="8" style="margin-top:20px; width:100%; background:#fff;">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Nomor Telepon</th>
                    <th>Email</th>
                    <th>Asal Kampus</th>
                    <th>Berkas</th>
                    <th>Waktu Daftar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pendaftar as $p)
                    <tr>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->nomor_telepon }}</td>
                        <td>{{ $p->email }}</td>
                        <td>{{ $p->asal_kampus }}</td>
                        <td>
                            @foreach($p->berkas as $file)
                                <a href="{{ asset('storage/'.$file) }}" target="_blank">Lihat File</a><br>
                            @endforeach
                        </td>
                        <td>{{ $p->created_at->format('d M Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div style="margin-top:24px; color:#888;">Belum ada pendaftar untuk lowongan ini.</div>
    @endif
@endsection
