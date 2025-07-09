<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lowongan;

class LowonganController extends Controller
{
    public function create()
    {
        $lowongans = \App\Models\Lowongan::latest()->get();
        return view('admin.lowongan', compact('lowongans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kualifikasi' => 'nullable|string',
            'keahlian' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('lowongan', 'public');
        }

        Lowongan::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'kualifikasi' => $request->kualifikasi,
            'keahlian' => $request->keahlian,
            'foto' => $fotoPath,
        ]);

        return redirect()->back()->with('success', 'Lowongan berhasil disimpan!');
    }

    public function showToPublic()
    {
        $lowongans = \App\Models\Lowongan::latest()->get();
        return view('lowongan', compact('lowongans'));
    }

    // Tampilkan detail lowongan
    public function show($id)
    {
        try {
            $lowongan = Lowongan::findOrFail($id);
            return view('lowongandetail', compact('lowongan'));
        } catch (\Exception $e) {
            return redirect()->route('lowongan')->with('error', 'Lowongan tidak ditemukan.');
        }
    }

    public function showRekomendasi()
    {
        $lowongans = \App\Models\Lowongan::latest()->get();
        return view('rekomendasi', compact('lowongans'));
    }
}
