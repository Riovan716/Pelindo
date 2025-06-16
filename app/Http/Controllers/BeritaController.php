<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function showToPublic()
    {
        $beritas = Berita::latest()->get();
        return view('berita', compact('beritas')); // file berita.blade.php di root
    }

    public function index()
    {
        $beritas = Berita::latest()->get();
        return view('admin.berita', compact('beritas'));
    }

    public function create()
    {
        // Tidak dipakai karena form tambah ada di halaman index
        return redirect()->route('admin.berita');
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
        $beritas = Berita::latest()->get(); // ← tambah baris ini
        return view('admin.editberita', compact('berita', 'beritas'));
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
}
