<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RekomendasiMagang;
use App\Models\NamaMahasiswa;

class RekomendasiMagangController extends Controller
{
    public function create()
    {
        return view('rekomendasi_form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kampus' => 'required|string|max:255',
            'email_kampus' => 'required|email',
            'email_dosen' => 'required|email',
            'nama_dosen' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:2048',
            'nama_mahasiswa' => 'required|array|min:1',
            'nama_mahasiswa.*' => 'required|string|max:255',
        ]);

        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('rekomendasi_files', 'public');
        }

        $rekomendasi = RekomendasiMagang::create([
            'nama_kampus' => $request->nama_kampus,
            'email_kampus' => $request->email_kampus,
            'email_dosen' => $request->email_dosen,
            'nama_dosen' => $request->nama_dosen,
            'file' => $filePath,
        ]);

        foreach ($request->nama_mahasiswa as $nama) {
            NamaMahasiswa::create([
                'rekomendasi_magang_id' => $rekomendasi->id,
                'nama' => $nama,
            ]);
        }

        return redirect()->back()->with('success', 'Rekomendasi magang berhasil dikirim!');
    }

    public function adminIndex()
    {
        $rekomendasi = \App\Models\RekomendasiMagang::with('nama_mahasiswa')->get();
        return view('admin.rekomendasi_magang', compact('rekomendasi'));
    }

    public function adminMahasiswa($id)
    {
        $rekomendasi = \App\Models\RekomendasiMagang::with('nama_mahasiswa')->findOrFail($id);
        return view('admin.rekomendasi_mahasiswa', compact('rekomendasi'));
    }
}
