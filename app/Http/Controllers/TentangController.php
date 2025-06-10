<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tentang;

class TentangController extends Controller
{
    public function index()
    {
        $tentang = Tentang::first(); // hanya satu data
        return view('admin.tentang', compact('tentang'));
    }

    public function store(Request $request)
    {
        $request->validate(['isi' => 'required']);
        Tentang::create(['isi' => $request->isi]);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan.');
    }

    public function update(Request $request, Tentang $tentang)
    {
        $request->validate(['isi' => 'required']);
        $tentang->update(['isi' => $request->isi]);
        return redirect()->back()->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(Tentang $tentang)
    {
        $tentang->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
