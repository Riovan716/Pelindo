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

    public function edit($id)
    {
        $lowongan = \App\Models\Lowongan::findOrFail($id);
        return view('admin.create_lowongan', compact('lowongan'));
    }

    public function update(Request $request, $id)
    {
        $lowongan = \App\Models\Lowongan::findOrFail($id);
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kualifikasi' => 'nullable|string',
            'keahlian' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
        $data = $request->only(['judul', 'deskripsi', 'kualifikasi', 'keahlian']);
        if ($request->hasFile('foto')) {
            if ($lowongan->foto) {
                \Storage::disk('public')->delete($lowongan->foto);
            }
            $data['foto'] = $request->file('foto')->store('lowongan', 'public');
        }
        $lowongan->update($data);
        return redirect()->route('admin.lowongan')->with('success', 'Lowongan berhasil diupdate!');
    }

    public function destroy($id)
    {
        $lowongan = \App\Models\Lowongan::findOrFail($id);
        if ($lowongan->foto) {
            \Storage::disk('public')->delete($lowongan->foto);
        }
        $lowongan->delete();
        return redirect()->route('admin.lowongan')->with('success', 'Lowongan berhasil dihapus!');
    }
}
