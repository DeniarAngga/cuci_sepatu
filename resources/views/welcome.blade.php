<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>
        CUCIKICKS
    </title>
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        /* ===== NAVBAR ===== */
        .custom-navbar {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            background: transparent;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .custom-navbar .nav-link,
        .custom-navbar .navbar-brand,
        .custom-navbar .dropdown-toggle {
            color: #fff !important;
            transition: color 0.3s ease;
        }

        .custom-navbar.scrolled {
            background-color: #ffffff !important;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding-top: 2px;
            padding-bottom: 2px;
            transition: padding 0.2s ease;
        }

        .custom-navbar.scrolled .nav-link,
        .custom-navbar.scrolled .navbar-brand,
        .custom-navbar.scrolled .dropdown-toggle {
            color: #000 !important;
        }

        /* Logo default: putih (tidak di-filter) */
        .navbar-logo {
            transition: filter 0.3s ease;
        }

        /* Saat discroll, ubah warna logo putih jadi hitam dengan filter invert */
        .custom-navbar.scrolled .navbar-logo {
            filter: invert(1) brightness(0);
        }

        /* ===== HERO SECTION ===== */
        .hero-bg {
            background-image: url('{{ asset('user/img/cuci.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            position: relative;
        }

        .hero-overlay {
            background-color: rgba(0, 0, 0, 0.5);
            min-height: 100vh;
            display: flex;
            align-items: center;
            color: #fff;
            padding: 5rem 2rem;
        }

        /* ===== CONTENT SECTIONS ===== */
        .about-section {
            padding: 40px 0;
        }

        .services-section {
            padding: 60px 0;
        }

        .service-card {
            background: #ffffff;
            border-radius: 15px;
            padding: 30px 20px;
            margin: 20px 0;
            /* Tambahkan jarak atas dan bawah */
            text-align: center;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
        }

        .service-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .service-card img {
            margin-bottom: 20px;
        }

        .service-card h4 {
            font-weight: bold;
            color: #343a40;
        }

        .service-card p {
            color: #6c757d;
        }

        .btn-primary {
            padding: 12px 30px;
            font-size: 16px;
            border-radius: 25px;
        }

        .services-section h2,
        .services-section h3 {
            color: #343a40;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .services-section h3 {
            font-weight: normal;
            color: #6c757d;
            margin-bottom: 40px;
        }

        /* ===== FOOTER ===== */
        .footer {
            background-color: #000000;
            color: white;
            padding: 40px 0;
            font-size: 14px;
        }

        .footer a {
            color: white;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        .footer-logo {
            width: 200px;
            /* sebelumnya 100px */
            height: auto;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        /* ===== ICON CIRCLE ===== */
        .icon-circle {
            width: 70px;
            height: 70px;
            background-color: #007bff;
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
        }

        /* ===== FEATURE ===== */
        .feature-wrapper {
            padding-left: 2rem;
            padding-right: 2rem;
            background-color: #000000;
        }

        .feature.card {
            border-radius: 50px;
            background-color: #ffffff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .feature .card:hover {
            transform: translateY(-5px);
        }

        /* Responsive Feature */
        @media (max-width: 768px) {
            .feature {
                width: 100%;
                margin-bottom: 20px;
            }

            .feature {
                margin: 20px;
            }
        }

        /* Style tombol login (default - border putih) */
        .custom-navbar .nav-item .nav-link[href*="login"] {
            background-color: #007bff;
            /* Merah */
            color: #fff !important;
            padding: 6px 16px;
            border-radius: 10px;
            border: 1px solid white;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        /* Hover effect */
        .custom-navbar .nav-item .nav-link[href*="login"]:hover {
            background-color: #c82333;
            color: #fff !important;
        }

        /* Saat navbar discroll - ubah border jadi hitam */
        .custom-navbar.scrolled .nav-item .nav-link[href*="login"] {
            border: 1px solid black;
        }

        .marquee-gallery {
            overflow: hidden;
            position: relative;
            padding: 10px 0;
        }

        .marquee-track {
            display: flex;
            gap: 20px;
            animation: scrollGallery 25s linear infinite;
        }

        .gallery-card {
            flex: 0 0 auto;
            border: 3px solid #000;
            border-radius: 15px;
            overflow: hidden;
            width: 350px;
            height: 250px;
        }

        .gallery-card img {
            width: 200%;
            height: 200%;
            object-fit: cover;
            display: block;
            border-radius: 12px;
        }

        @keyframes scrollGallery {
            0% {
                transform: translateX(0%);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        .layanan-banner-section {
            margin-top: 80px;
            /* jarak dari galeri di atas */
        }

        .layanan-banner {
            position: relative;
            width: 100%;
            overflow: hidden;
        }

        .banner-bg {
            width: 100%;
            height: auto;
            display: block;
            object-fit: cover;
        }

        .banner-overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: #000;
            padding: 20px;
            z-index: 2;
            max-width: 90%;
        }

        .banner-title {
            font-size: 3rem;
            font-weight: bold;
            color: #ffffff;
            margin-bottom: 10px;
        }

        .banner-desc {
            color: #ffffff;
            font-size: 1.1rem;
            margin-bottom: 20px;
        }

        .banner-btn {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
            padding: 15px 20px;
            text-decoration: none;
            border-radius: 8px;
            border: 3px; /* Menambahkan border hitam */
            transition: background-color 0.3s ease;
        }

        /* .banner-btn:hover {
            background-color: #e6bc00;
        } */
    </style>
</head>

<body>

    @include('layoutsuser.navbar')

    <div class="container-fluid hero-bg">
        <div class="row hero-overlay">
            <div class="col-md-12 text-center">
                <h2 style="font-size: 36px; font-weight: bold;">Halo, Selamat datang di</h2>
                <h2 style="font-size: 48px; font-weight: bold;">CUCIKICKS!</h2>
                <p style="font-size: 24px;">
                    Kami menyediakan banyak layanan menarik untuk anda, klik tombol dibawah untuk info lebih lengkap
                </p>
                <a href="{{ route('user.layanan') }}" class="btn btn-primary"
                    style="padding: 12px 30px; font-size: 20px;">Layanan</a>
            </div>
        </div>
    </div>
    <div class="container about-section d-flex align-items-center" style="height: 90vh;">
        <div class="about-text"
            style="flex: 1; display: flex; flex-direction: column; justify-content: center; height: 100%;">
            <h2>ABOUT US</h2>
            <p style="text-align: justify;">
                Denshoes adalah sebuah website yang bisa digunakan untuk memesan jasa layanan cuci sepatu online. Dengan
                memanfaatkan teknologi yang ada, kalian bisa langsung memesan jasa hanya dengan melalui telepon genggam
                saja.
            </p>
            <p style="text-align: justify;">
                Kami berharap dengan adanya website ini dapat memberikan solusi, terlebih untuk kalian yang ingin
                menjaga
                sepatu tetap bagus dan bersih seperti pertama kali beli.
            </p>
        </div>
        <div class="about-image" style="flex: 1;">
            <img src="{{ asset('user/img/tampilanhome.png') }}" alt="Denshoes"
                style="width: 80%; height: auto; border-radius: 10px; margin-left: auto; display: block;">
        </div>
    </div>
    <div class="feature-wrapper py-5">
        <div class="container px-4">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="feature card p-4 text-center h-100">
                        <div class="icon-circle mb-3"><i class="fas fa-wallet fa-2x"></i></div>
                        <h4 class="text-dark">HARGA TERJANGKAU</h4>
                        <p class="text-dark">Semua layanan kami memiliki harga yang terjangkau baik untuk pelajar,
                            mahasiswa maupun untuk pekerja.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature card p-4 text-center h-100">
                        <div class="icon-circle mb-3"><i class="fas fa-user fa-2x"></i></div>
                        <h4>TEKNISI BERPENGALAMAN</h4>
                        <p>Tim kami yang sudah berpengalaman dapat dipercaya untuk menyelesaikan permasalahan pada
                            sepatu anda.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature card p-4 text-center h-100">
                        <div class="icon-circle mb-3"><i class="fas fa-home fa-2x"></i></div>
                        <h4>ECO FRIENDLY</h4>
                        <p>Kami menggunakan bahan-bahan alami yang aman dan di khususkan untuk bahan sepatu anda.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container services-section">
        <h2 class="text-center">OUR SERVICES</h2>
        <h3 class="text-center">Layanan kami</h3>
        <div class="row">
            @foreach ([['img' => 'fastcleaning.png', 'title' => 'FAST CLEANING', 'desc' => 'Treatment pencucian untuk membersihkan sepatu pada bagian upper dan midsole'], ['img' => 'whitening.png', 'title' => 'WHITENING', 'desc' => 'Treatment pencucian khusus untuk sepatu berbahan canvas dan mesh berwarna putih dengan noda kuning ataupun saus'], ['img' => 'reglue.png', 'title' => 'REGLUE', 'desc' => 'Merapikan bagian sepatu yang sudah mengelupas'], ['img' => 'repaintkhusus.png', 'title' => 'REPAINT KHUSUS', 'desc' => 'Menggunakan bahan premium untuk sepatu berbahan suede dan nubuck'], ['img' => 'pickupservice.png', 'title' => 'PICKUP SERVICES', 'desc' => 'Layanan untuk pengambilan sepatu di tempat yang anda tentukan']] as $service)
                <div class="col-md-4 d-flex mt-4 mb-4">
                    <div class="service-card w-100">
                        <img src="{{ asset('user/img/' . $service['img']) }}" alt="{{ $service['title'] }}"
                            height="100" width="100">
                        <h4>{{ $service['title'] }}</h4>
                        <p>{{ $service['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('user.layanan') }}" class="btn btn-primary">
                Selengkapnya
            </a>
        </div>
    </div>
    <div class="container mt-1 mb-5 py-4" style="background-color: #ffc107; border-radius: 20px;">
        <h2 class="text-center fw-bold">Promo Layanan Kami</h2>
        <p class="text-center">Promo layanan CUCIKICKS di bawah.</p>
        <div class="row row-cols-1 row-cols-md-4 g-4">
            @foreach ([['img' => 'cuci.jpg'], ['img' => 'cuci.jpg'], ['img' => 'cuci.jpg'], ['img' => 'cuci.jpg'], ['img' => 'cuci.jpg'], ['img' => 'cuci.jpg'], ['img' => 'cuci.jpg'], ['img' => 'cuci.jpg']] as $store)
                <div class="col">
                    <div class="bg-white shadow-sm border border-dark rounded overflow-hidden d-flex align-items-center"
                        style="height: 300px;">
                        <img src="{{ asset('user/img/' . $store['img']) }}" alt="store"
                            class="img-fluid w-100 h-100 object-fit-cover">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <h2 class="text-center fw-bold">Galeri Kami</h2>
    <div class="marquee-gallery">
        <div class="marquee-track">
            @foreach ([['img' => 'cuci.jpg'], ['img' => 'cuci.jpg'], ['img' => 'cuci.jpg'], ['img' => 'cuci.jpg'], ['img' => 'cuci.jpg'], ['img' => 'cuci.jpg'], ['img' => 'cuci.jpg'], ['img' => 'cuci.jpg']] as $gallery)
                <div class="gallery-card">
                    <img src="{{ asset('user/img/' . $gallery['img']) }}" class="img-fluid" alt="Galeri">
                </div>
            @endforeach
        </div>
    </div>

    <!-- Seksi Banner Bawah -->
    <section class="layanan-banner-section">
        <div class="layanan-banner">
            <img src="{{ asset('user/img/cuci.jpg') }}" alt="Banner Layanan" class="banner-bg">
            <div class="banner-overlay">
                <h2 class="banner-title">Tidak sempat mengunjungi <br>toko kami?</h2>
                <p class="banner-desc">Tenang, CUCIKICKS kini memiliki layanan antar jemput! Silakan hubungi kami
                    sekarang juga.</p>
                <a href="#layanan" class="banner-btn">Gunakan Layanan Sekarang</a>
            </div>
        </div>
    </section>


    @include('layoutsuser.footer')

    <script>
        window.addEventListener("scroll", function() {
            const navbar = document.querySelector(".custom-navbar");
            if (window.scrollY > 50) {
                navbar.classList.add("scrolled");
            } else {
                navbar.classList.remove("scrolled");
            }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const track = document.getElementById("marqueeTrack");
            let position = 0;

            function scrollMarquee() {
                position -= 0.5; // Kecepatan scroll
                if (Math.abs(position) >= track.scrollWidth / 2) {
                    position = 0;
                }
                track.style.transform = `translateX(${position}px)`;
                requestAnimationFrame(scrollMarquee);
            }

            scrollMarquee();
        });

        <
        script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity =
            "sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+3i5d5L5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5> < /
        body > <
            /html>
