@extends('layouts.master')
@section('title', 'Beranda')
@section('content')

<!-- Google Fonts for Poppins -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;900&display=swap" rel="stylesheet">

<style>
    body {
        font-family: 'Poppins', 'Segoe UI', 'Roboto', Arial, sans-serif;
        background: #f4fbfd;
    }
    .hero-section {
        padding: 80px 40px 60px 40px;
        color: #000;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
        gap: 60px;
        max-width: 1300px;
        margin: auto;
    }
    .hero-left {
        flex: 1;
        min-width: 320px;
    }
    .hero-left h1 {
        font-size: 60px;
        font-weight: 900;
        margin-bottom: 18px;
        line-height: 1.1;
        font-family: 'Poppins', 'Segoe UI', 'Roboto', Arial, sans-serif;
        letter-spacing: -2px;
    }
    .hero-left h1 span {
        color: #0b1957;
        font-weight: 900;
        font-style: italic;
        text-shadow: 0 2px 8px #b2e0f7;
    }
    .hero-left h4 {
        font-weight: 700;
        margin-top: 18px;
        color: #0288d1;
        font-size: 1.7rem;
        letter-spacing: 1px;
        font-family: 'Poppins', 'Segoe UI', 'Roboto', Arial, sans-serif;
    }
    .hero-left p {
        margin-top: 22px;
        line-height: 1.8;
        font-size: 1.18rem;
        color: #222;
        font-family: 'Poppins', 'Segoe UI', 'Roboto', Arial, sans-serif;
        max-width: 600px;
        text-shadow: 0 1px 2px #e0f7fa;
    }
    .hero-right {
        flex: 1;
        min-width: 320px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .hero-right img {
        width: 420px;
        height: 420px;
        object-fit: cover;
        border-radius: 40px;
        box-shadow: 0 10px 32px rgba(0, 0, 0, 0.18), 0 2px 8px #b2e0f7;
        border: 10px solid #fff;
        background-color: #fff;
        transition: transform 0.3s, box-shadow 0.3s;
    }
    .hero-right img:hover {
        transform: scale(1.04) rotate(-2deg);
        box-shadow: 0 16px 40px rgba(2,136,209,0.18), 0 4px 16px #b2e0f7;
    }
    @media (max-width: 900px) {
        .hero-section {
            padding: 40px 10px 30px 10px;
            flex-direction: column;
            text-align: center;
            gap: 30px;
        }
        .hero-left h1 {
            font-size: 38px;
        }
        .hero-left h4 {
            font-size: 1.2rem;
        }
        .hero-right {
            margin-top: 20px;
        }
        .hero-right img {
            width: 220px;
            height: 220px;
            border-radius: 24px;
        }
    }
    .hero-slider-custom {
        position: relative;
        width: 420px;
        height: 420px;
        max-width: 100%;
        max-height: 100%;
        border-radius: 40px;
        box-shadow: 0 8px 32px 0 rgba(0,112,201,0.13), 0 2px 8px #b2e0f7;
        background: #fff;
        overflow: hidden;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .hero-slider-custom img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 40px;
        background-color: #fff;
        transition: opacity 0.7s, transform 0.3s, box-shadow 0.3s;
        box-shadow: none;
        padding: 0;
    }
    .slider-nav-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(255,255,255,0.7);
        border: 2px solid #0070c9;
        color: #0070c9;
        font-size: 2.1rem;
        width: 48px;
        height: 48px;
        border-radius: 50%;
        cursor: pointer;
        z-index: 2;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 8px #0070c933;
        transition: background 0.2s, color 0.2s, border 0.2s;
        outline: none;
        opacity: 0.92;
    }
    #hero-prev { left: 18px; }
    #hero-next { right: 18px; }
    .slider-nav-btn:hover, .slider-nav-btn:focus {
        background: #0070c9;
        color: #fff;
        border: 2px solid #005fa3;
        opacity: 1;
    }
    .slider-indicators {
        position: absolute;
        bottom: 32px;
        left: 0;
        right: 0;
        display: flex;
        justify-content: center;
        gap: 16px;
        z-index: 2;
    }
    .slider-indicators span {
        width: 18px;
        height: 18px;
        display: inline-block;
        border-radius: 50%;
        background: #b3d8f7;
        border: 2.5px solid #fff;
        box-shadow: 0 2px 8px #0070c91a;
        transition: background 0.3s, border 0.3s;
        cursor: pointer;
        margin-top: 0;
    }
    .slider-indicators span.active {
        background: #0070c9;
        border: 2.5px solid #005fa3;
    }
    @media (max-width: 900px) {
        .hero-slider-custom {
            width: 220px;
            height: 220px;
            border-radius: 24px;
        }
        .hero-slider-custom img {
            border-radius: 24px;
        }
        .slider-nav-btn {
            width: 36px;
            height: 36px;
            font-size: 1.3rem;
        }
        .slider-indicators span {
            width: 12px;
            height: 12px;
        }
    }
</style>

<div class="hero-wrapper">
    <div class="hero-section">
        <div class="hero-left">
            <h1>Selamat Datang,<br> Di <span>PPSDM</span></h1>
            <h4>PT Pelindo Multi Terminal</h4>
            <p>
                Selamat datang di <b>Portal Pengelolaan dan Pembelajaran SDM PT Pelindo Multi Terminal</b>.<br>
                Kami berkomitmen untuk meningkatkan kualitas dan kapasitas seluruh insan Pelindo melalui platform yang <b>terintegrasi</b> dan <b>adaptif</b>.<br><br>
                Platform ini menyediakan akses informasi terkini seputar berita perusahaan, pengumuman penting, serta peluang pengembangan karier dan pelatihan yang menunjang performa profesional Anda di dunia kerja.
            </p>
        </div>
        <div class="hero-right">
            <div class="hero-slider-custom">
                <img id="hero-slide-img" src="{{ asset('assets/images/Logo.Dashboard1.jpg') }}" alt="Dashboard Slide">
                <div id="hero-indicators" class="slider-indicators"></div>
            </div>
        </div>
    </div>
</div>
<script>
const heroImages = [
    "{{ asset('assets/images/Logo.Dashboard1.jpg') }}",
    "{{ asset('assets/images/Logo.Dashboard2.jpg') }}",
    "{{ asset('assets/images/Logo.Dashboard3.jpg') }}",
    "{{ asset('assets/images/Logo.Dashboard4.jpg') }}"
];
let heroIdx = 0;
const heroImg = document.getElementById('hero-slide-img');
const indicators = document.getElementById('hero-indicators');

function updateHeroSlider(idx) {
    heroImg.style.opacity = 0;
    setTimeout(() => {
        heroImg.src = heroImages[idx];
        heroImg.style.opacity = 1;
        updateIndicators();
    }, 400);
}
function updateIndicators() {
    indicators.innerHTML = '';
    for (let i = 0; i < heroImages.length; i++) {
        const dot = document.createElement('span');
        dot.className = i === heroIdx ? 'active' : '';
        dot.onclick = () => { heroIdx = i; updateHeroSlider(heroIdx); };
        indicators.appendChild(dot);
    }
}
let heroInterval = setInterval(() => {
    heroIdx = (heroIdx + 1) % heroImages.length;
    updateHeroSlider(heroIdx);
}, 3000);
indicators.addEventListener('mouseenter', () => clearInterval(heroInterval));
indicators.addEventListener('mouseleave', () => { heroInterval = setInterval(() => {
    heroIdx = (heroIdx + 1) % heroImages.length;
    updateHeroSlider(heroIdx);
}, 3000); });
updateIndicators();
</script>

@endsection
