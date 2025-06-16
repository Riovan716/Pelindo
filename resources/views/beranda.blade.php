@extends('layouts.master')
@section('title', 'Beranda')
@section('content')

<style>
    body {
        margin: 0;
        padding: 0;
        background-color: #f0f4f8;
    }

    .hero-section {
        background: linear-gradient(to bottom, #82d7e9, #2f5862);
        padding: 100px 80px 150px 80px;
        color: #000;
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: relative;
    }

    .hero-left {
        max-width: 50%;
    }

    .hero-left h1 {
        font-size: 48px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .hero-left h1 span {
        color: #000042;
        font-weight: 900;
        font-style: italic;
    }

    .hero-left h4 {
        font-weight: bold;
        margin-top: 20px;
    }

    .hero-left p {
        margin-top: 10px;
        line-height: 1.6;
    }

    .hero-right img {
        width: 350px;
        height: 350px;
        object-fit: cover;
        border-radius: 50%;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    .curve {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        overflow: hidden;
        line-height: 0;
        transform: translateY(1px);
    }

    .curve svg {
        position: relative;
        display: block;
        width: calc(100% + 1.3px);
        height: 120px;
    }

    .curve .shape-fill {
        fill: #ffffff;
        filter: drop-shadow(0px -4px 6px rgba(0, 0, 0, 0.3));
    }

    .section-title {
        text-align: center;
        font-size: 42px;
        font-style: italic;
        font-weight: bold;
        margin-top: 60px;
        text-decoration: underline;
        color: #000;
    }

    .card-section {
        display: flex;
        justify-content: center;
        gap: 30px;
        flex-wrap: wrap;
        margin: 30px auto 60px auto;
        padding: 0 5vw;
    }

    .card {
        flex: 0 0 300px;
        background-color: #d0eff9;
        border-radius: 20px;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    .card h4 {
        color: #003355;
        margin-bottom: 10px;
    }

    .card p {
        font-size: 14px;
        color: #000;
    }

    .card a {
        display: block;
        margin-top: 10px;
        font-style: italic;
        color: #000;
        text-decoration: none;
    }
</style>

<div class="hero-section">
    <div class="hero-left">
        <h1>Selamat Datang,<br> Di <span>Pelindo</span></h1>
        <h4>PT Pelindo Multi Terminal</h4>
        <p>
            Selamat datang di Portal Pembelajaran dan Pengembangan SDM PT Pelindo Multi Terminal. Kami berkomitmen untuk meningkatkan kualitas dan kapasitas seluruh insan Pelindo melalui platform yang terintegrasi dan adaptif.
            Platform ini menyediakan akses informasi terkini seputar berita perusahaan, pengumuman penting, serta peluang pengembangan karier dan pelatihan yang menunjang performa profesional Anda di dunia kerja.
        </p>
    </div>
    <div class="hero-right">
        <img src="{{ asset('assets/images/pelindo.png') }}" alt="Monumen PT Pelindo">
    </div>

    <div class="curve">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
            preserveAspectRatio="none">
            <path d="M985.66,83.29C906.5,60.14,823.76,49.74,740.73,42.14c-99.52-9.16-198.33-6.11-297.55,1.9C352.2,52.37,255.88,66.4,161.75,86.9,112.2,97.77,62.73,110.63,0,109.87V0H1200V27.35C1122.95,66.06,1045.89,106.52,985.66,83.29Z"
                class="shape-fill"></path>
        </svg>
    </div>
</div>

<div class="section-title">BERITA</div>
<div class="card-section">
    <div class="card">
        <h4>Kolaborasi Pelindo dengan Kampus</h4>
        <p>Pelindo Multi Terminal menjalin kerja sama dengan berbagai perguruan tinggi untuk pengembangan SDM dan riset pelabuhan masa depan.</p>
        <a href="#">Selengkapnya..</a>
    </div>
    <div class="card">
        <h4>Digitalisasi Pelayanan</h4>
        <p>Transformasi layanan berbasis digital mempermudah pengguna jasa dalam mengakses informasi dan sistem kepelabuhanan.</p>
        <a href="#">Selengkapnya..</a>
    </div>
    <div class="card">
        <h4>Training Leadership Nasional</h4>
        <p>Program pelatihan kepemimpinan nasional digelar bagi para manajer lini pertama sebagai bagian dari roadmap SDM unggul.</p>
        <a href="#">Selengkapnya..</a>
    </div>
</div>

<div class="section-title">PENGUMUMAN</div>
<div class="card-section">
    <div class="card">
        <h4>Pendaftaran Program Sertifikasi</h4>
        <p>Karyawan aktif dapat mengikuti sertifikasi kompetensi bidang logistik dan kepelabuhanan. Pendaftaran dibuka hingga 30 Juni.</p>
        <a href="#">Lihat Detail</a>
    </div>
    <div class="card">
        <h4>Maintenance Sistem</h4>
        <p>Akan dilakukan pemeliharaan sistem pada 25 Juni pukul 23.00–04.00 WIB. Mohon hindari aktivitas selama periode tersebut.</p>
        <a href="#">Lihat Detail</a>
    </div>
</div>

<div class="section-title">LOWONGAN KERJA</div>
<div class="card-section">
    <div class="card">
        <h4>Staf Operasional Lapangan</h4>
        <p>Dibutuhkan lulusan D3/S1 untuk posisi operasional pelabuhan di area kerja Belawan dan Makassar.</p>
        <a href="#">Lamar Sekarang</a>
    </div>
    <div class="card">
        <h4>Data Analyst Magang</h4>
        <p>Program magang terbuka bagi mahasiswa semester akhir untuk membantu proyek digitalisasi dashboard Pelindo.</p>
        <a href="#">Lamar Sekarang</a>
    </div>
</div>

@endsection
