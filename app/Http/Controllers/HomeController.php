<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function adminDashboard()
    {
        $jumlahPendaftar = \App\Models\Pendaftar::count();
        return view('admin.dashboard', compact('jumlahPendaftar'));
    }
}
