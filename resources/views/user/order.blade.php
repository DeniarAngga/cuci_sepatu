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
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        .navbar-nav .nav-link {
            color: #6c757d;
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
            background-color: #495057;
            color: white;
            padding: 40px 0;
        }

        .footer a {
            color: white;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    @include('layoutsuser.navbar')

    <!-- Konten Order -->
    <div class="container hero-section mt-5 d-flex justify-content-center align-items-center" style="height: 50vh;">
        <div>
            <h5 class="text-center">
                <a href="{{ route('welcome') }}" class="text-decoration-none">Home</a> / Order
            </h5>
            <h2 class="text-center">Order Pesanan</h2>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="container mt-5">
        <form action="{{ route('user.order.store') }}" method="POST">
            @csrf

            <!-- Nama Pemesan -->
            <div class="mb-3">
                <label class="block font-semibold mb-1">Nama Pemesan</label>
                <input type="text" name="customer_name" class="form-control" required>
            </div>

            <!-- Nomor Handphone -->
            <div class="mb-3">
                <label class="block font-semibold mb-1">Nomor Handphone</label>
                <input type="text" name="phone_number" class="form-control" required>
            </div>

            <!-- Alamat Pemesan -->
            <div class="mb-3">
                <label class="block font-semibold mb-1">Alamat Pemesan</label>
                <textarea name="address" class="form-control" required></textarea>
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
                <select name="shoe_type" class="form-control" required>
                    <option value="" disabled selected>Pilih jenis sepatu</option>
                    <option value="Suede">Suede</option>
                    <option value="Canvas">Canvas</option>
                    <option value="Leather">Leather</option>
                    <option value="Nubuck">Nubuck</option>
                    <option value="Mesh">Mesh</option>
                </select>
            </div>

            <!-- Tanggal Pesan -->
            <div class="mb-4">
                <label class="block font-semibold mb-1">Tanggal Pesan</label>
                <input type="date" name="order_date" class="form-control" required>
            </div>

            <!-- Tombol Submit -->
            <button type="submit" class="btn btn-primary">Pesan</button>
        </form>
    </div>

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+3i5d5L5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5>
 </body>
</html>
