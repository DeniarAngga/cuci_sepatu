<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Keterangan Layanan</title>
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 1200px;
            margin: auto;
        }

        .center-image {
            text-align: center;
            margin-bottom: 20px;
        }

        .center-image img {
            width: 300px;
        }

        .left-section {
            width: 100%;
        }

        h2 {
            font-size: 24px;
        }

        .bold {
            font-weight: bold;
        }

        .gallery {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .gallery img {
            width: 10%;
            border-radius: 10px;
        }

        .features {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
            text-align: center;
            margin: 40px;
        }

        .feature {
            width: 30%;
        }

        .icon-circle {
            width: 50px;
            height: 50px;
            background-color: #007bff;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin: auto;
            margin-bottom: 40px;
        }

        .feature h4 {
            font-size: 17px;
            /* Ukuran lebih kecil dari <p> */
            font-weight: bold;
            margin-bottom: 5px;
        }

        .feature p {
            font-size: 16px;
            /* Ukuran lebih besar dari <h4> */
            color: #555;
        }

        .footer {
            background-color: #495057;
            color: white;
            padding: 40px 0;
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

    <div class="container">
        <div class="row align-items-center mb-4" style="margin-top: 60px;">
            <div class="col-sm-6">
                <h2>PICK UP SERVICES</h2>
            </div>
            <div class="col-sm-6 text-sm-end">
                <nav>
                    <ol class="breadcrumb justify-content-sm-end mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('welcome') }}" style="text-decoration: none;">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">PICK UP SERVICES</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="center-image">
        <img src="user/img/pickupservice.png" alt="Diagram Sepatu">
    </div>
    <div class="container">
        <div class="left-section">
            <h2>DETAIL LAYANAN</h2>
            <ul>
                <li>Layanan untuk pengambilan sepatu daerah tegal</li>
                <li>Layanan ini GRATIS</li>
            </ul>
            <p>Untuk mendapatkan layanan ini silahkan isi data diri dengan klik tombol dibawah</p>
            <a href="{{ route('user.orderpickup') }}"
            style="margin-bottom:12px; display: inline-block; background-color: #00bfff; color: white; padding: 15px 40px; border-radius: 50px; text-decoration: none; font-weight: bold;">
            Pickup Service
            </a>
            <h3>NOTE:</h3>
            <ul>
                <li>Jangan biarkan noda melekat terlalu lama dan merusak bahan dari sepatu kesayanganmu.</li>
                <li>Jangan lupa untuk <b>Follow IG</b> kita untuk mendapatkan info promo-promo menarik untuk anda.</li>
            </ul>

        </div>
        <div class="features">
            <div class="feature">
                <div class="icon-circle"><i class="fas fa-wallet"></i></div>
                <h4>HARGA TERJANGKAU</h4>
                <p>Semua layanan kami memiliki harga yang terjangkau baik untuk pelajar, mahasiswa maupun untuk pekerja.
                </p>
            </div>
            <div class="feature">
                <div class="icon-circle"><i class="fas fa-user"></i></div>
                <h4>TEKNISI BERPENGALAMAN</h4>
                <p>Tim kami yang sudah berpengalaman dapat dipercaya untuk menyelesaikan permasalahan pada sepatu anda.
                </p>
            </div>
            <div class="feature">
                <div class="icon-circle"><i class="fas fa-home"></i></div>
                <h4>ECO FRIENDLY</h4>
                <p>Kami menggunakan bahan-bahan alami yang aman dan di khususkan untuk bahan sepatu anda.</p>
            </div>
        </div>
    </div>

    @include('layoutsuser.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+3i5d5L5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5>
</body>
</html>
