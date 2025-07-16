<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Diklat;

class DiklatController extends Controller
{
    public function index()
    {
        $diklats = Diklat::latest()->get();
        return view('admin.diklat.index', compact('diklats'));
    }

    public function create()
    {
        return view('admin.diklat.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date',
            'file' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:4096',
            'link' => 'nullable|string|max:255',
        ]);
        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('diklat', 'public');
        }
        Diklat::create($validated);
        return redirect()->route('admin.diklat.index')->with('success', 'Diklat berhasil ditambahkan.');
    }

    public function show(Diklat $diklat)
    {
        return view('admin.diklat.show', compact('diklat'));
    }

    public function edit(Diklat $diklat)
    {
        return view('admin.diklat.edit', compact('diklat'));
    }

    public function update(Request $request, Diklat $diklat)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date',
            'file' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:4096',
            'link' => 'nullable|string|max:255',
        ]);
        if ($request->hasFile('file')) {
            if ($diklat->file) {
                \Storage::disk('public')->delete($diklat->file);
            }
            $validated['file'] = $request->file('file')->store('diklat', 'public');
        }
        $diklat->update($validated);
        return redirect()->route('admin.diklat.index')->with('success', 'Diklat berhasil diupdate.');
    }

    public function destroy(Diklat $diklat)
    {
        if ($diklat->file) {
            \Storage::disk('public')->delete($diklat->file);
        }
        $diklat->delete();
        return redirect()->route('admin.diklat.index')->with('success', 'Diklat berhasil dihapus.');
    }
}
