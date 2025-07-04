<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Datasio;
use Illuminate\Support\Facades\Storage;

class DatasioController extends Controller
{
    public function index()
    {
        $datasios = Datasio::latest()->get();
        return view('admin.datasio.index', compact('datasios'));
    }

    public function create()
    {
        return view('admin.datasio.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_berakhir' => 'required|date|after_or_equal:tanggal_mulai',
            'file' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:4096',
        ]);

        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('datasio', 'public');
        }

        Datasio::create($validated);
        return redirect()->route('admin.datasio.index')->with('success', 'Data SIO berhasil ditambahkan.');
    }

    public function show(Datasio $datasio)
    {
        return view('admin.datasio.show', compact('datasio'));
    }

    public function edit(Datasio $datasio)
    {
        return view('admin.datasio.edit', compact('datasio'));
    }

    public function update(Request $request, Datasio $datasio)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_berakhir' => 'required|date|after_or_equal:tanggal_mulai',
            'file' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:4096',
        ]);

        if ($request->hasFile('file')) {
            if ($datasio->file) {
                Storage::disk('public')->delete($datasio->file);
            }
            $validated['file'] = $request->file('file')->store('datasio', 'public');
        }

        $datasio->update($validated);
        return redirect()->route('admin.datasio.index')->with('success', 'Data SIO berhasil diupdate.');
    }

    public function destroy(Datasio $datasio)
    {
        if ($datasio->file) {
            Storage::disk('public')->delete($datasio->file);
        }
        $datasio->delete();
        return redirect()->route('admin.datasio.index')->with('success', 'Data SIO berhasil dihapus.');
    }
}
