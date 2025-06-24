@extends('layouts.master')
@section('title', 'Beranda')
@section('content')

<style>
    

    .hero-section {
        padding: 60px 40px;
        color: #000;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
        gap: 40px;
        max-width: 1200px;
        margin: auto;
    }

    .hero-left {
        flex: 1;
        min-width: 300px;
    }

    .hero-left h1 {
        font-size: 48px;
        font-weight: bold;
        margin-bottom: 10px;
        line-height: 1.2;
    }

    .hero-left h1 span {
        color: #0b1957;
        font-weight: 900;
        font-style: italic;
    }

    .hero-left h4 {
        font-weight: bold;
        margin-top: 20px;
        color: #222;
    }

    .hero-left p {
        margin-top: 16px;
        line-height: 1.7;
        font-size: 16px;
        color: #0e0e0e;
    }

    .hero-right {
        flex: 1;
        min-width: 280px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .hero-right img {
        width: 300px;
        height: 300px;
        object-fit: cover;
        border-radius: 50%;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
        border: 6px solid #ffffff;
        background-color: #fff;
    }

    @media (max-width: 768px) {
        .hero-section {
            padding: 40px 20px;
            flex-direction: column;
            text-align: center;
        }

        .hero-left h1 {
            font-size: 36px;
        }

        .hero-right {
            margin-top: 30px;
        }

        .hero-right img {
            width: 220px;
            height: 220px;
        }
    }
</style>

<div class="hero-wrapper">
    <div class="hero-section">
        <div class="hero-left">
            <h1>Selamat Datang,<br> Di <span>PPSDM</span></h1>
            <h4>PT Pelindo Multi Terminal</h4>
            <p>
                Selamat datang di Portal Pengelolaan dan Pembelajaran  SDM PT Pelindo Multi Terminal. Kami berkomitmen untuk meningkatkan kualitas dan kapasitas seluruh insan Pelindo melalui platform yang terintegrasi dan adaptif.
                Platform ini menyediakan akses informasi terkini seputar berita perusahaan, pengumuman penting, serta peluang pengembangan karier dan pelatihan yang menunjang performa profesional Anda di dunia kerja.
            </p>
        </div>
        <div class="hero-right">
            <img src="{{ asset('assets/images/logo-login.jpg') }}" alt="Monumen PT Pelindo">
        </div>
    </div>
</div>

@endsection
