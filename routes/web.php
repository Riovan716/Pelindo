<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;


//tanda ->name dibawah untuk mengarahkan route nya nanti di blade templating harus kemana routing url nya
//middleware sama sekali bukan untuk mengganti route. Middleware semacam filter sebelum masuk ke route tertentu, untuk keamanan akses 

Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('actionregister', [RegisterController::class, 'actionregister'])->name('actionregister');

Route::get('/', function () {
    return view('landing');
});


Route::view('/register', 'register')->name('register');


Route::get('/', function () {
    return view('landing');
})->name('beranda');



//route yang kita pake
Route::get('/', fn() => view('beranda'))->name('beranda');
Route::get('/berita', fn() => view('berita'))->name('berita');
Route::get('/pengumuman', fn() => view('pengumuman'))->name('pengumuman');
Route::get('/lowongan-pekerjaan', fn() => view('lowongan'))->name('lowongan');
Route::get('/tentang', fn() => view('tentang'))->name('tentang');
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('actionlogin');
