<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Denshoes Cleaning - Review</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

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

        .transition-opacity {
            transition: opacity 0.5s ease-out;
        }

        .opacity-0 {
            opacity: 0;
        }

        .star-rating input:checked~label,
        .star-rating label:hover,
        .star-rating label:hover~label {
            color: gold;
        }

        .star-rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: center;
        }

        .star-rating input {
            display: none;
        }

        .star-rating label {
            font-size: 25px;
            color: #ccc;
            cursor: pointer;
        }
    </style>
</head>

<body>

    @include('layoutsuser.navbar')

    <!-- Hero Section -->
    <div class="container hero-section mt-5 d-flex justify-content-center align-items-center" style="height: 50vh;">
        <div>
            <h5 class="text-center">
                <a href="{{ route('welcome') }}" class="text-decoration-none">Home</a> / Review
            </h5>
            <h2 class="text-center">Review</h2>
        </div>
    </div>

    <!-- Form Review -->
    <div class="container mt-5 mb-4">
        <div class="card shadow p-4">
            <h4 class="text-center mb-4">Bagikan pengalaman Anda!</h4>

            <!-- Pesan Sukses -->
            @if (session('success'))
                <div class="alert alert-success" id="success-message">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Pesan Peringatan Jika Belum Login -->
            @if (session('warning'))
                <div class="alert alert-warning transition-opacity duration-500 ease-out" id="warning-message">
                    {{ session('warning') }}
                </div>
            @endif

            <form action="{{ route('user.kirimreview') }}" method="POST">
                @csrf

                <!-- Nama -->
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama"
                        value="{{ optional(Auth::user())->name }}" @if (Auth::check()) readonly @endif>
                </div>

                <!-- Rating -->
                <div class="mb-3 text-center">
                    <label class="form-label">Rating</label>
                    <div class="star-rating">
                        <input type="radio" id="star5" name="rating" value="5"><label for="star5"><i
                                class="fas fa-star"></i></label>
                        <input type="radio" id="star4" name="rating" value="4"><label for="star4"><i
                                class="fas fa-star"></i></label>
                        <input type="radio" id="star3" name="rating" value="3"><label for="star3"><i
                                class="fas fa-star"></i></label>
                        <input type="radio" id="star2" name="rating" value="2"><label for="star2"><i
                                class="fas fa-star"></i></label>
                        <input type="radio" id="star1" name="rating" value="1" required><label
                            for="star1"><i class="fas fa-star"></i></label>
                    </div>
                </div>

                <!-- Review -->
                <div class="mb-3">
                    <label for="review" class="form-label">Ulasan</label>
                    <textarea class="form-control" id="review" name="review" rows="4" required></textarea>
                </div>

                <!-- Tombol Submit -->
                <button type="submit" class="btn btn-primary w-100">Kirim Ulasan</button>
            </form>
        </div>
    </div>

    <!-- Script untuk menyembunyikan pesan otomatis -->
    <script>
        setTimeout(function() {
            let successMessage = document.getElementById("success-message");
            if (successMessage) {
                successMessage.style.opacity = "0";
                setTimeout(() => successMessage.remove(), 500);
            }

            let warningMessage = document.getElementById("warning-message");
            if (warningMessage) {
                warningMessage.style.opacity = "0";
                setTimeout(() => warningMessage.remove(), 500);
            }
        }, 3000);
    </script>

    @include('layoutsuser.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+3i5d5L5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5>
 </body>
</html>
