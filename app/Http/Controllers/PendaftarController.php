<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftar;
use App\Models\Lowongan;
use App\Models\MahasiswaDiterima;

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

    public function accept($id)
    {
        $pendaftar = Pendaftar::findOrFail($id);
        // Cegah duplikasi
        if (!MahasiswaDiterima::where('pendaftar_id', $pendaftar->id)->exists()) {
            MahasiswaDiterima::create([
                'pendaftar_id' => $pendaftar->id,
                'nama' => $pendaftar->nama,
                'email' => $pendaftar->email,
                'nomor_telepon' => $pendaftar->nomor_telepon,
                'asal_kampus' => $pendaftar->asal_kampus,
                'lowongan_id' => $pendaftar->lowongan_id,
                'tanggal_diterima' => now(),
            ]);
        }
        $pendaftar->status = 'accepted';
        $pendaftar->save();
        return back()->with('success', 'Pendaftar diterima!');
    }

    public function reject($id)
    {
        $pendaftar = Pendaftar::findOrFail($id);
        $pendaftar->status = 'rejected';
        $pendaftar->save();
        return back()->with('success', 'Pendaftar ditolak!');
    }
}
