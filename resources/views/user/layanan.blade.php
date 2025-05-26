<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>
        Denshoes Cleaning
    </title>
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        .custom-navbar {
            background-color: #ffffff !important;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1030;
        }

        .custom-navbar .navbar-brand img {
            max-height: 70px;
            transition: none !important;
            filter: none !important;
        }

        .custom-navbar .nav-link,
        .custom-navbar .navbar-brand,
        .custom-navbar .dropdown-toggle {
            color: #000 !important;
            transition: color 0.3s ease;
        }

        .custom-navbar.scrolled .nav-link,
        .custom-navbar.scrolled .navbar-brand {
            color: #000 !important;
        }

        .custom-navbar.scrolled .navbar-logo {
            filter: none !important;
        }

        /* Logo putih diubah jadi hitam */
        .custom-navbar .navbar-brand .navbar-logo {
            filter: invert(100%) brightness(0%) !important;
        }

        .hero-section {
            background-color: #e9ecef;
            padding: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .hero-section img {
            max-width: 50%;
            border-radius: 10px;
        }

        .about-section,
        .services-section {
            padding: 40px 0;
        }

        .service-card {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .service-card .card-body {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .service-card img {
            max-width: 250px;
            margin-bottom: 10px;
        }

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

        .transition-opacity {
            transition: opacity 0.5s ease-out;
        }

        .opacity-0 {
            opacity: 0;
        }

        /* Style tombol login (default - border putih) */
        .custom-navbar .nav-item .nav-link[href*="login"] {
            background-color: #dc3545;
            /* Merah */
            color: #fff !important;
            padding: 6px 16px;
            border-radius: 10px;
            border: 1px solid black;
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
    </style>
</head>

<body>

    @include('layoutsuser.navbar')

    @php
        $desiredOrder = [
            'FAST CLEANING',
            'DEEP CLEANING',
            'UNYELLOWING',
            'WHITENING',
            'REGLUE',
            'REPAINT BIASA',
            'REPAINT KHUSUS',
            'PICKUP SERVICES',
        ];

        // Urutkan layanan sesuai dengan $desiredOrder
        $sortedLayanans = $layanans->sortBy(function ($layanan) use ($desiredOrder) {
            return array_search(strtoupper($layanan->jenis_layanan), $desiredOrder);
        });
    @endphp

    <!-- Konten Order -->
    <div class="container hero-section mt-5 d-flex justify-content-center align-items-center" style="height: 50vh;">
        <div>
            <h5 class="text-center">
                <a href="{{ route('welcome') }}" class="text-decoration-none">Home</a> / Layanan
            </h5>
            <h2 class="text-center">Layanan Pesanan</h2>
        </div>
    </div>

    <!-- Konten Layanan -->
    <div class="container mt-5">
        <div class="row">
            @foreach ($layanans as $index => $item)
                <div class="col-md-4 mt-4 mb-4">
                    <div class="card service-card h-100 d-flex flex-column">
                        <img src="{{ asset('uploads/layanan/' . $item->gambar) }}" class="card-img-top mx-auto d-block"
                            alt="{{ $item->jenis_layanan }}" style="margin-top: 5px;">
                        <div class="card-body d-flex flex-column text-center">
                            <h5 class="card-title">{{ $item->jenis_layanan }}</h5>
                            <p class="card-text" style="min-height: 60px;">{{ $item->deskripsi }}</p>
                            <p class="price"><strong>Rp {{ number_format($item->harga, 0, ',', '.') }}</strong></p>
                            <div class="mt-auto">
                                @php
                                    $routeKeterangan = match ($item->jenis_layanan) {
                                        'FAST CLEANING' => route('user.fastcleaning'),
                                        'DEEP CLEANING' => route('user.deepcleaning'),
                                        'UNYELLOWING' => route('user.unyellowing'),
                                        'WHITENING' => route('user.whitening'),
                                        'REGLUE' => route('user.reglue'),
                                        'REPAINT BIASA' => route('user.repaintbiasa'),
                                        'REPAINT KHUSUS' => route('user.repaintkhusus'),
                                        'PICKUP SERVICES' => route('user.pickupservices'),
                                        default => '#',
                                    };

                                    $routePesan =
                                        $item->jenis_layanan == 'PICKUP SERVICES'
                                            ? route('user.orderpickup')
                                            : route('user.order', [
                                                'jenis_layanan' => $item->jenis_layanan,
                                                'source' => 'pesan',
                                            ]);
                                @endphp
                                <a href="{{ $routeKeterangan }}" class="btn btn-primary w-100 mb-2">
                                    Keterangan Layanan
                                </a>
                                {{-- <a href="{{ $routePesan }}" class="btn btn-primary w-100">
                                    Pesan
                                </a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    @include('layoutsuser.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+3i5d5L5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5>
 </body>
</html>
