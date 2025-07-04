@extends('layouts.master_admin')
@section('title', 'Dashboard Admin')
@section('content')
    <h1>Selamat Datang di Dashboard Admin</h1>
    <p>Silakan pilih menu di atas untuk mulai mengelola konten.</p>

    <div style="margin-top:40px; display:flex; justify-content:center; gap:32px;">
        <div style="background:#588996; color:#fff; border-radius:12px; padding:32px 48px; font-size:2rem; font-weight:bold; box-shadow:0 2px 8px #0001;">
            Jumlah Pendaftar: {{ $jumlahPendaftar }}
        </div>
        <a href="{{ route('admin.datasio.index') }}" style="text-decoration:none;">
            <div style="background:#ee5219; color:#fff; border-radius:12px; padding:32px 48px; font-size:2rem; font-weight:bold; box-shadow:0 2px 8px #0001; display:flex; align-items:center; justify-content:center; transition:background 0.2s;">
                Menuju Data SIO
            </div>
        </a>
        <a href="{{ route('admin.diklat.index') }}" style="text-decoration:none;">
            <div style="background:#0f1035; color:#fff; border-radius:12px; padding:32px 48px; font-size:2rem; font-weight:bold; box-shadow:0 2px 8px #0001; display:flex; align-items:center; justify-content:center; transition:background 0.2s;">
                Menuju Daftar Diklat
            </div>
        </a>
    </div>
@endsection
