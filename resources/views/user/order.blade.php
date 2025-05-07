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
            background-image: url('{{ asset('user/img/cuci2.png') }}');
            /* Ganti dengan path gambar kamu */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            padding: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;
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

    <!-- Konten Order -->
    <div class="container hero-section mt-5 d-flex justify-content-center align-items-center"
        style="height: 50vh; position: relative;">
        <div
            style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0,0,0,0.4); border-radius: 10px;">
        </div>
        <div style="position: relative; z-index: 1;">
            <h5 class="text-center">
                <a href="{{ route('welcome') }}" class="text-decoration-none" style="color: #0d6efd;">Home</a>
                <span class="text-white">/</span>
                <span class="text-white">Order</span>
            </h5>
            <h2 class="text-center text-light">Order Pesanan</h2>
        </div>
    </div>



    @if (session('success'))
        <div class="alert alert-success transition-opacity duration-500 ease-out" id="success-message">
            {{ session('success') }}
        </div>
    @endif

    <!-- Pesan Peringatan Jika Belum Login -->
    @if (session('warning'))
        <div class="alert alert-warning transition-opacity duration-500 ease-out" id="warning-message">
            {{ session('warning') }}
        </div>
    @endif

    <div class="container mt-5">
        <form action="{{ route('user.order.store') }}" method="POST">
            @csrf

            <!-- Nama Pemesan -->
            <div class="mb-3">
                <label class="block font-semibold mb-1">Nama Pemesan</label>
                <input type="text" name="nama_lengkap" class="form-control"
                    value="{{ old('nama_lengkap', Auth::user()->name ?? '') }}" required>
            </div>

            <!-- Nomor Handphone -->
            <div class="mb-3">
                <label class="block font-semibold mb-1">Nomor Handphone</label>
                <input type="text" name="nomor_handphone" class="form-control"
                    value="{{ old('nomor_handphone', Auth::user()->phone ?? '') }}" required>
            </div>

            <!-- Alamat Pemesan -->
            <div class="mb-3">
                <label class="block font-semibold mb-1">Alamat Pemesan</label>
                <textarea name="alamat" class="form-control" required>{{ old('alamat', Auth::user()->alamat ?? '') }}</textarea>
            </div>

            <!-- Paket Layanan (Terisi Otomatis) -->
            <div class="mb-3">
                <label class="block font-semibold mb-1">Paket Layanan</label>
                <input type="text" name="jenis_layanan" id="jenis_layanan" class="form-control"
                    value="{{ old('jenis_layanan', $jenisLayanan ?? '') }}" {{ $readonly ? 'readonly' : '' }} required>
            </div>

            <!-- Jenis Sepatu -->
            <div class="mb-3">
                <label class="block font-semibold mb-1">Jenis Sepatu</label>
                <select name="jenis_sepatu" class="form-control" required>
                    <option value="" selected>Pilih jenis sepatu</option>
                    @foreach ($jenisSepatu as $jenis)
                        <option value="{{ $jenis->jenis_sepatu }}">{{ $jenis->jenis_sepatu }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Tanggal Pesan -->
            <div class="mb-4">
                <label class="block font-semibold mb-1">Tanggal Pesan</label>
                <input type="date" name="tanggal_pesan" class="form-control" required>
            </div>

            <!-- Tombol Submit -->
            <button type="submit" class="btn btn-primary">Pesan</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const warningMessage = document.getElementById('warning-message');

            if (warningMessage) {
                // Mulai hilangkan pesan setelah 5 detik
                setTimeout(() => {
                    warningMessage.classList.add('opacity-0');

                    // Hapus elemen setelah transisi selesai (0.5 detik)
                    setTimeout(() => {
                        warningMessage.remove();
                    }, 500);
                }, 5000);
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const warningMessage = document.getElementById('success-message');

            if (warningMessage) {
                // Mulai hilangkan pesan setelah 5 detik
                setTimeout(() => {
                    warningMessage.classList.add('opacity-0');

                    // Hapus elemen setelah transisi selesai (0.5 detik)
                    setTimeout(() => {
                        warningMessage.remove();
                    }, 500);
                }, 5000);
            }
        });
    </script>


    <!-- Script untuk Mengisi Paket Otomatis -->
    @if ($readonly)
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const jenisLayananInput = document.getElementById('jenis_layanan');

                // Mencegah perubahan nilai menggunakan JavaScript
                jenisLayananInput.addEventListener('keydown', function(e) {
                    e.preventDefault();
                });

                jenisLayananInput.addEventListener('paste', function(e) {
                    e.preventDefault();
                });

                jenisLayananInput.addEventListener('input', function(e) {
                    e.preventDefault();
                });
            });
        </script>
    @endif


    @include('layoutsuser.footer')

    <script>
        document.addEventListener('scroll', function() {
            const navbar = document.querySelector('.custom-navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+3i5d5L5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5>
 </body>
</html>
