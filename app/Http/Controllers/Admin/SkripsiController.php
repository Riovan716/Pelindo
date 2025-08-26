<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skripsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SkripsiController extends Controller
{
    public function index(Request $request)
    {
        $query = Skripsi::query();
        
        // Filter berdasarkan pencarian
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('penulis', 'like', "%{$search}%")
                  ->orWhere('nim', 'like', "%{$search}%")
                  ->orWhere('program_studi', 'like', "%{$search}%")
                  ->orWhere('kata_kunci', 'like', "%{$search}%");
            });
        }
        
        // Filter berdasarkan status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        
        // Filter berdasarkan tahun
        if ($request->filled('tahun')) {
            $query->where('tahun', $request->tahun);
        }
        
        // Filter berdasarkan program studi
        if ($request->filled('program_studi')) {
            $query->where('program_studi', $request->program_studi);
        }
        
        $skripsi = $query->latest()->paginate(10);
        
        return view('admin.skripsi.index', compact('skripsi'));
    }

    public function create()
    {
        return view('admin.skripsi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'nim' => 'required|string|max:20',
            'program_studi' => 'required|string|max:100',
            'asal_kampus' => 'required|string|max:255',
            'tahun' => 'required|integer|min:2000|max:' . (date('Y') + 1),
            'abstrak' => 'required|string',
            'kata_kunci' => 'required|string|max:255',
            'dosen_pembimbing' => 'required|string|max:255',
            'kategori' => 'nullable|string|max:100',
            'jumlah_halaman' => 'nullable|integer|min:1',
            'status' => 'required|in:draft,published,archived',
            'file' => 'required|file|mimes:pdf|max:10240', // Max 10MB
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Upload file skripsi
        if ($request->hasFile('file')) {
            $validated['file_path'] = $request->file('file')->store('skripsi/files', 'public');
        }

        // Upload cover image
        if ($request->hasFile('cover_image')) {
            $validated['cover_image'] = $request->file('cover_image')->store('skripsi/covers', 'public');
        }

        Skripsi::create($validated);

        return redirect()->route('admin.skripsi.index')
            ->with('success', 'Skripsi berhasil ditambahkan.');
    }

    public function show(Skripsi $skripsi)
    {
        return view('admin.skripsi.show', compact('skripsi'));
    }

    public function edit(Skripsi $skripsi)
    {
        return view('admin.skripsi.edit', compact('skripsi'));
    }

    public function update(Request $request, Skripsi $skripsi)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'nim' => 'required|string|max:20',
            'program_studi' => 'required|string|max:100',
            'asal_kampus' => 'required|string|max:255',
            'tahun' => 'required|integer|min:2000|max:' . (date('Y') + 1),
            'abstrak' => 'required|string',
            'kata_kunci' => 'required|string|max:255',
            'dosen_pembimbing' => 'required|string|max:255',
            'kategori' => 'nullable|string|max:100',
            'jumlah_halaman' => 'nullable|integer|min:1',
            'status' => 'required|in:draft,published,archived',
            'file' => 'nullable|file|mimes:pdf|max:10240',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Upload file skripsi baru jika ada
        if ($request->hasFile('file')) {
            // Hapus file lama
            if ($skripsi->file_path) {
                Storage::disk('public')->delete($skripsi->file_path);
            }
            $validated['file_path'] = $request->file('file')->store('skripsi/files', 'public');
        }

        // Upload cover image baru jika ada
        if ($request->hasFile('cover_image')) {
            // Hapus cover lama
            if ($skripsi->cover_image) {
                Storage::disk('public')->delete($skripsi->cover_image);
            }
            $validated['cover_image'] = $request->file('cover_image')->store('skripsi/covers', 'public');
        }

        $skripsi->update($validated);

        return redirect()->route('admin.skripsi.index')
            ->with('success', 'Skripsi berhasil diperbarui.');
    }

    public function destroy(Skripsi $skripsi)
    {
        // Hapus file dari storage
        if ($skripsi->file_path) {
            Storage::disk('public')->delete($skripsi->file_path);
        }
        if ($skripsi->cover_image) {
            Storage::disk('public')->delete($skripsi->cover_image);
        }

        $skripsi->delete();

        return redirect()->route('admin.skripsi.index')
            ->with('success', 'Skripsi berhasil dihapus.');
    }

    public function download(Skripsi $skripsi)
    {
        if (!$skripsi->file_path) {
            return back()->with('error', 'File tidak ditemukan.');
        }

        $path = storage_path('app/public/' . $skripsi->file_path);
        
        if (!file_exists($path)) {
            return back()->with('error', 'File tidak ditemukan di server.');
        }

        return response()->download($path, $skripsi->judul . '.pdf');
    }
}
