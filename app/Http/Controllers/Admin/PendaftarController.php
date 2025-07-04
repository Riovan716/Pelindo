<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lowongan;

class PendaftarController extends Controller
{
    public function rekap()
    {
        $lowongans = Lowongan::withCount('pendaftar')->get();
        return view('admin.pendaftar.rekap', compact('lowongans'));
    }
}
