<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LaporanKp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LaporanKpController extends Controller
{
    public function index(Request $request)
    {
        $query = LaporanKp::query();
        
        // Filter berdasarkan pencarian
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('penulis', 'like', "%{$search}%")
                  ->orWhere('nim', 'like', "%{$search}%")
                  ->orWhere('program_studi', 'like', "%{$search}%")
                  ->orWhere('kata_kunci', 'like', "%{$search}%")
                  ->orWhere('instansi_tujuan', 'like', "%{$search}%");
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
        
        // Filter berdasarkan instansi
        if ($request->filled('instansi')) {
            $query->where('instansi_tujuan', 'like', "%{$request->instansi}%");
        }
        
        $laporanKp = $query->latest()->paginate(10);
        
        return view('admin.laporan_kp.index', compact('laporanKp'));
    }

    public function create()
    {
        return view('admin.laporan_kp.create');
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
            'instansi_tujuan' => 'required|string|max:255',
            'periode_magang' => 'required|string|max:100',
            'kategori' => 'nullable|string|max:100',
            'jumlah_halaman' => 'nullable|integer|min:1',
            'status' => 'required|in:draft,published,archived',
            'file' => 'required|file|mimes:pdf|max:10240', // Max 10MB
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Upload file laporan
        if ($request->hasFile('file')) {
            $validated['file_path'] = $request->file('file')->store('laporan_kp/files', 'public');
        }

        // Upload cover image
        if ($request->hasFile('cover_image')) {
            $validated['cover_image'] = $request->file('cover_image')->store('laporan_kp/covers', 'public');
        }

        LaporanKp::create($validated);

        return redirect()->route('admin.laporan_kp.index')
            ->with('success', 'Laporan KP/PKL berhasil ditambahkan.');
    }

    public function show(LaporanKp $laporanKp)
    {
        return view('admin.laporan_kp.show', compact('laporanKp'));
    }

    public function edit(LaporanKp $laporanKp)
    {
        return view('admin.laporan_kp.edit', compact('laporanKp'));
    }

    public function update(Request $request, LaporanKp $laporanKp)
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
            'instansi_tujuan' => 'required|string|max:255',
            'periode_magang' => 'required|string|max:100',
            'kategori' => 'nullable|string|max:100',
            'jumlah_halaman' => 'nullable|integer|min:1',
            'status' => 'required|in:draft,published,archived',
            'file' => 'nullable|file|mimes:pdf|max:10240',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Upload file laporan baru jika ada
        if ($request->hasFile('file')) {
            // Hapus file lama
            if ($laporanKp->file_path) {
                Storage::disk('public')->delete($laporanKp->file_path);
            }
            $validated['file_path'] = $request->file('file')->store('laporan_kp/files', 'public');
        }

        // Upload cover image baru jika ada
        if ($request->hasFile('cover_image')) {
            // Hapus cover lama
            if ($laporanKp->cover_image) {
                Storage::disk('public')->delete($laporanKp->cover_image);
            }
            $validated['cover_image'] = $request->file('cover_image')->store('laporan_kp/covers', 'public');
        }

        $laporanKp->update($validated);

        return redirect()->route('admin.laporan_kp.index')
            ->with('success', 'Laporan KP/PKL berhasil diperbarui.');
    }

    public function destroy(LaporanKp $laporanKp)
    {
        // Hapus file dari storage
        if ($laporanKp->file_path) {
            Storage::disk('public')->delete($laporanKp->file_path);
        }
        if ($laporanKp->cover_image) {
            Storage::disk('public')->delete($laporanKp->cover_image);
        }

        $laporanKp->delete();

        return redirect()->route('admin.laporan_kp.index')
            ->with('success', 'Laporan KP/PKL berhasil dihapus.');
    }

    public function download(LaporanKp $laporanKp)
    {
        if (!$laporanKp->file_path) {
            return back()->with('error', 'File tidak ditemukan.');
        }

        $path = storage_path('app/public/' . $laporanKp->file_path);
        
        if (!file_exists($path)) {
            return back()->with('error', 'File tidak ditemukan di server.');
        }

        return response()->download($path, $laporanKp->judul . '.pdf');
    }
}
