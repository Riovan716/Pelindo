<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\PublicTentangController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\PendaftarController;

//tanda ->name dibawah untuk mengarahkan route nya nanti di blade templating harus kemana routing url nya
//middleware sama sekali bukan untuk mengganti route. Middleware semacam filter sebelum masuk ke route tertentu, untuk keamanan akses 

Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('actionregister', [RegisterController::class, 'actionregister'])->name('actionregister');

Route::get('/', fn() => view('beranda'))->name('beranda');
Route::get('/lowongan-pekerjaan', [\App\Http\Controllers\LowonganController::class, 'showToPublic'])->name('lowongan');
Route::get('/lowongan/{id}', [LowonganController::class, 'show'])->name('lowongan.show');
Route::get('/tentang', [PublicTentangController::class, 'index'])->name('tentang');
Route::get('/rekomendasi-magang', [\App\Http\Controllers\RekomendasiMagangController::class, 'create'])->name('rekomendasi');
Route::get('/rekomendasi-magang/form', [\App\Http\Controllers\RekomendasiMagangController::class, 'create'])->name('rekomendasi.form');
Route::post('/rekomendasi-magang', [\App\Http\Controllers\RekomendasiMagangController::class, 'store'])->name('rekomendasi.store');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [LoginController::class, 'actionlogin'])->name('actionlogin');

// ⬇ Route untuk dashboard admin setelah login
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\HomeController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/pendaftar/rekap', [\App\Http\Controllers\Admin\PendaftarController::class, 'rekap'])->name('admin.pendaftar.rekap');
    Route::resource('datasio', \App\Http\Controllers\Admin\DatasioController::class, [
        'as' => 'admin'
    ]);
    Route::resource('diklat', \App\Http\Controllers\Admin\DiklatController::class, [
        'as' => 'admin'
    ]);
    Route::get('/lowongan', [LowonganController::class, 'create'])->name('admin.lowongan');
    Route::get('/lowongan/create', function() { return view('admin.create_lowongan'); })->name('admin.lowongan.create');
    Route::post('/lowongan', [LowonganController::class, 'store'])->name('admin.lowongan.store');
    
    // Pengumuman admin routes
    Route::get('/pengumuman', [PengumumanController::class, 'adminIndex'])->name('admin.pengumuman');
    Route::get('/pengumuman/create', [PengumumanController::class, 'create'])->name('admin.pengumuman.create');
    Route::post('/pengumuman', [PengumumanController::class, 'store'])->name('admin.pengumuman.store');
    Route::get('/pengumuman/{id}/edit', [PengumumanController::class, 'edit'])->name('admin.pengumuman.edit');
    Route::put('/pengumuman/{id}', [PengumumanController::class, 'update'])->name('admin.pengumuman.update');
    Route::delete('/pengumuman/{id}', [PengumumanController::class, 'destroy'])->name('admin.pengumuman.destroy');
});

//tentang
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/tentang', [TentangController::class, 'index'])->name('admin.tentang');
    Route::post('/tentang', [TentangController::class, 'store'])->name('admin.tentang.store');
    Route::put('/tentang/{tentang}', [TentangController::class, 'update'])->name('admin.tentang.update');
    Route::delete('/tentang/{tentang}', [TentangController::class, 'destroy'])->name('admin.tentang.destroy');
});

//berita user
Route::get('/berita', [BeritaController::class, 'showToPublic'])->name('berita.public');
Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');

//berita admin
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::resource('berita', BeritaController::class)
        ->names([
            'index' => 'admin.berita.index',
            'create' => 'admin.berita.create',
            'store' => 'admin.berita.store',
            'edit' => 'admin.berita.edit',
            'update' => 'admin.berita.update',
            'destroy' => 'admin.berita.destroy',
        ])
        ->parameters(['berita' => 'berita']);
});

//route user pengumuman
Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman');
Route::get('/pengumuman/{id}', [PengumumanController::class, 'show'])->name('pengumuman.show');

Route::get('/lowongan/{id}/daftar', [PendaftarController::class, 'create'])->name('pendaftar.create');
Route::post('/lowongan/{id}/daftar', [PendaftarController::class, 'store'])->name('pendaftar.store');

Route::get('/admin/lowongan/{id}/pendaftar', [PendaftarController::class, 'listByLowongan'])->name('admin.lowongan.pendaftar');

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/rekomendasi-magang', [\App\Http\Controllers\RekomendasiMagangController::class, 'adminIndex'])->name('admin.rekomendasi');
    Route::get('/rekomendasi-magang/{id}/mahasiswa', [\App\Http\Controllers\RekomendasiMagangController::class, 'adminMahasiswa'])->name('admin.rekomendasi.mahasiswa');
});