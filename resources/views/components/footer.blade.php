<footer style="width: 100vw; margin: 0; padding: 0; border: none; position: relative; min-height: 320px;">
    <!-- Bagian putih atas -->
    <div style="width: 100vw; height: 120px; position: relative; overflow: hidden;">
        <img src="{{ asset('assets/images/Footer.png') }}"
             alt="Footer Logo"
             style="
                position: absolute;
                left: 0;
                top: 0;
                width: 100vw;
                height: 120px;
                object-fit: cover;
                opacity: 1;
                pointer-events: none;
             ">
    </div>
    <!-- Garis abu tipis -->
    <div style="background: #f5f5f6; width: 130vw; height: 5px;"></div>
    <!-- Bagian biru bawah dengan background image Footer.png -->
    <div style="
        background: #0d7bc1 url('{{ asset('assets/images/Footer.png') }}') no-repeat right bottom;
        background-size: 600px auto;
        width: 100vw;
        min-height: 320px;
        position: relative;
        display: flex;
        align-items: center;
    ">
        <div style="
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: flex-start;
            gap: 2rem;
            padding: 48px 0 48px 0;
            position: relative;
            z-index: 2;
        ">
            <!-- KANTOR PUSAT -->
            <div style="flex: 1; min-width: 260px; max-width: 350px; color: #fff;">
                <h2 style="font-size: 1.2rem; font-weight: bold; margin-bottom: 18px; letter-spacing: 1px; text-transform: uppercase;">KANTOR CABANG BELAWAN</h2>
                <div style="font-size: 1rem; line-height: 1.7;">
                    PT Pelabuhan Indonesia (Persero) Regional 1 Cabang Belawan<br>
                    Alamat : Kapten R.Sulian No. 1, Belawan, Sumatera Utara 20411<br><br>
                    <b>Email</b> : <span style="font-size: 1em; color: #fff;">belawan@pelindo.co.id</span><br>
                    <b>No. Telp</b> : <span style="font-size: 1.1em; color: #ffb6c1;">+62 61 6941919</span>
                </div>
            </div>
            <!-- LINK TERKAIT -->
            <div style="flex: 1; min-width: 220px; max-width: 350px; color: #fff;">
                <h2 style="font-size: 1.2rem; font-weight: bold; margin-bottom: 18px; letter-spacing: 1px; text-transform: uppercase;">LINK TERKAIT</h2>
                <div style="font-size: 1rem; line-height: 1.7;">
                    <a href="https://www.danantaraindonesia.com/" target="_blank" rel="noopener" style="color: #fff; text-decoration: underline;">Danantara Indonesia</a><br>
                    <a href="https://bumn.go.id/" target="_blank" rel="noopener" style="color: #fff; text-decoration: underline;">Kementerian BUMN RI</a><br>
                    <a href="https://dephub.go.id/" target="_blank" rel="noopener" style="color: #fff; text-decoration: underline;">Kementerian Perhubungan RI</a>
                </div>
            </div>
            <!-- SOCIAL MEDIA -->
            <div style="flex: 1; min-width: 220px; max-width: 350px; color: #fff;">
                <h2 style="font-size: 1.2rem; font-weight: bold; margin-bottom: 18px; letter-spacing: 1px; text-transform: uppercase;">SOCIAL MEDIA</h2>
                <div style="display: flex; gap: 18px; margin-top: 18px;">
                    <a href="https://twitter.com/pelindonesia" target="_blank" rel="noopener" style="background: #fff; color: #0d7bc1; border-radius: 8px; padding: 8px 12px; font-size: 2rem; display: flex; align-items: center;"><i class='bx bxl-twitter'></i></a>
                    <a href="https://facebook.com/pelindonesia" target="_blank" rel="noopener" style="background: #fff; color: #0d7bc1; border-radius: 8px; padding: 8px 12px; font-size: 2rem; display: flex; align-items: center;"><i class='bx bxl-facebook'></i></a>
                    <a href="https://www.instagram.com/pelindo_belawan" target="_blank" rel="noopener" style="background: #fff; color: #0d7bc1; border-radius: 8px; padding: 8px 12px; font-size: 2rem; display: flex; align-items: center;"><i class='bx bxl-instagram'></i></a>
                    <a href="https://youtube.com/@pelindonesia" target="_blank" rel="noopener" style="background: #fff; color: #0d7bc1; border-radius: 8px; padding: 8px 12px; font-size: 2rem; display: flex; align-items: center;"><i class='bx bxl-youtube'></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>

