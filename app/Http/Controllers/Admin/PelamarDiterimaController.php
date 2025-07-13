<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MahasiswaDiterima;

class PelamarDiterimaController extends Controller
{
    public function index()
    {
        // Ambil semua mahasiswa yang diterima dari tabel mahasiswa_diterima
        $pelamarDiterima = MahasiswaDiterima::with('lowongan')->orderBy('tanggal_diterima', 'desc')->get();
        return view('admin.pelamar_diterima.index', compact('pelamarDiterima'));
    }

    public function show($id)
    {
        $pelamar = MahasiswaDiterima::with('lowongan')->findOrFail($id);
        return view('admin.pelamar_diterima.show', compact('pelamar'));
    }

    // Untuk update status, bisa di-nonaktifkan atau diubah sesuai kebutuhan
    public function updateStatus(Request $request, $id)
    {
        // Contoh: hapus data dari mahasiswa_diterima jika "ditolak" lagi
        $pelamar = MahasiswaDiterima::findOrFail($id);
        $pelamar->delete();
        return redirect()->route('admin.pelamar-diterima.index')->with('success', 'Data pelamar diterima telah dihapus.');
    }
} 