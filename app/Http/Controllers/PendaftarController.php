<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftar;
use App\Models\Lowongan;

class PendaftarController extends Controller
{
    public function create($lowongan_id)
    {
        $lowongan = Lowongan::findOrFail($lowongan_id);
        return view('pendaftar.create', compact('lowongan'));
    }

    public function store(Request $request, $lowongan_id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:20',
            'email' => 'required|email',
            'asal_kampus' => 'required|string|max:255',
            'berkas.*' => 'required|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
        ]);

        $berkasPaths = [];
        if ($request->hasFile('berkas')) {
            foreach ($request->file('berkas') as $file) {
                $berkasPaths[] = $file->store('pendaftar_files', 'public');
            }
        }

        Pendaftar::create([
            'lowongan_id' => $lowongan_id,
            'nama' => $request->nama,
            'nomor_telepon' => $request->nomor_telepon,
            'email' => $request->email,
            'asal_kampus' => $request->asal_kampus,
            'berkas' => $berkasPaths,
        ]);

        return redirect()->back()->with('success', 'Pendaftaran berhasil!');
    }

    public function listByLowongan($lowongan_id)
    {
        $lowongan = \App\Models\Lowongan::findOrFail($lowongan_id);
        $pendaftar = $lowongan->pendaftar()->latest()->get();
        return view('pendaftar.list', compact('lowongan', 'pendaftar'));
    }
}
