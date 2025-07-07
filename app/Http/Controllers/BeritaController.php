<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function showToPublic(Request $request)
    {
        $query = $request->input('q');
        $beritas = Berita::query();
        if ($query) {
            $beritas = $beritas->where(function($q) use ($query) {
                $q->where('judul', 'like', "%$query%")
                  ->orWhere('isi', 'like', "%$query%")
                  ;
            });
        }
        $beritas = $beritas->latest()->get();
        return view('berita', compact('beritas', 'query'));
    }

    public function index()
    {
        $beritas = Berita::latest()->get();
        return view('admin.berita', compact('beritas'));
    }

    public function create()
    {
        return view('admin.create_berita');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('berita_files/images', 'public');
            $validated['gambar'] = $path;
        }

        Berita::create($validated);
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit(Berita $berita)
    {
        return view('admin.edit_berita', compact('berita'));
    }

    public function update(Request $request, Berita $berita)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            if ($berita->gambar) {
                Storage::disk('public')->delete($berita->gambar);
            }
            $path = $request->file('gambar')->store('berita_files/images', 'public');
            $validated['gambar'] = $path;
        }

        $berita->update($validated);
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Berita $berita)
    {
        if ($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus.');
    }

    // Tampilkan detail berita
    public function show($id)
    {
        try {
            $berita = Berita::findOrFail($id);
            return view('beritadetail', compact('berita'));
        } catch (\Exception $e) {
            return redirect()->route('berita.public')->with('error', 'Berita tidak ditemukan.');
        }
    }
}
