<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengumumanController extends Controller
{

  public function index(Request $request)
  {
    $query = $request->input('q');
    $pengumuman = Pengumuman::query();
    if ($query) {
      $pengumuman = $pengumuman->where(function($qObj) use ($query) {
        $qObj->where('judul', 'like', "%$query%")
             ->orWhere('isi', 'like', "%$query%")
             ;
      });
    }
    $pengumuman = $pengumuman->latest()->get();
    return view('pengumuman', compact('pengumuman', 'query'));
  }
  // Tampilkan form tambah
  public function adminIndex()
  {
    $pengumuman = Pengumuman::latest()->get();
    return view('admin.pengumuman', compact('pengumuman'));
  }

  // Tampilkan form tambah
  public function create()
  {
    return view('admin.create_pengumuman');
  }

  // Simpan pengumuman baru
  public function store(Request $request)
  {
    $request->validate([
      'judul' => 'required|string',
      'isi' => 'required|string',
      'file' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048'
    ]);

    $filePath = null;

    if ($request->hasFile('file')) {
      $extension = strtolower($request->file('file')->getClientOriginalExtension());

      // Cek apakah file adalah gambar
      $isImage = in_array($extension, ['jpg', 'jpeg', 'png']);

      // Tentukan folder simpan
      $directory = $isImage ? 'pengumuman_files/images' : 'pengumuman_files/documents';

      // Simpan file
      $filePath = $request->file('file')->store($directory, 'public');
    }

    Pengumuman::create([
      'judul' => $request->judul,
      'isi' => $request->isi,
      'file' => $filePath,
    ]);

    // Redirect kembali ke form tambah + pesan sukses
    return redirect()->route('admin.pengumuman')->with('success', 'Pengumuman berhasil ditambahkan.');
  }

  // Tampilkan form edit
  public function edit($id)
  {
    $pengumuman = Pengumuman::findOrFail($id);
    return view('admin.edit_pengumuman', compact('pengumuman'));
  }

  // Proses update
  public function update(Request $request, $id)
  {
    $pengumuman = Pengumuman::findOrFail($id);

    $request->validate([
      'judul' => 'required|string',
      'isi' => 'required|string',
      'file' => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:2048'
    ]);

    if ($request->hasFile('file')) {
      if ($pengumuman->file) {
        Storage::disk('public')->delete($pengumuman->file);
      }
      $filePath = $request->file('file')->store('pengumuman_files', 'public');
      $pengumuman->file = $filePath;
    }

    $pengumuman->update([
      'judul' => $request->judul,
      'isi' => $request->isi,
      'file' => $pengumuman->file,
    ]);

    return redirect()->route('admin.pengumuman')->with('success', 'Pengumuman berhasil diupdate.');
  }

  // Hapus pengumuman
  public function destroy($id)
  {
    $pengumuman = Pengumuman::findOrFail($id);
    if ($pengumuman->file) {
      Storage::disk('public')->delete($pengumuman->file);
    }
    $pengumuman->delete();

    return redirect()->route('admin.pengumuman')->with('success', 'Pengumuman berhasil dihapus.');
  }

  // Tampilkan detail pengumuman
  public function show($id)
  {
    $pengumuman = Pengumuman::findOrFail($id);
    return view('pengumumandetail', compact('pengumuman'));
  }
}
