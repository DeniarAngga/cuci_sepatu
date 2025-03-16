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
            border: 1px solid #e9ecef;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            margin-bottom: 20px;
        }

        .service-card img {
            max-width: 100px;
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

        .feature {
            width: 30%;
        }

        .features {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
            text-align: center;
            margin: 40px;
        }
    </style>
</head>

<body>

    @include('layoutsuser.navbar')

    <div class="container hero-section mt-5">
        <div>
            <h2>
                Hello there, Welcome to
            </h2>
            <h2>
                <strong>
                    DENSHOES!
                </strong>
            </h2>
            <p style="font-size: 20px">
                Kami menyediakan banyak layanan menarik untuk anda, klik tombol dibawah untuk info lebih lengkap
            </p>
            <a href="{{ route('user.layanan') }}" class="btn btn-primary">
                Layanan
            </a>
        </div>
        <img alt="Group of people holding up various types of shoes" height="400" src="user/img/tampilanhome1.png"
            width="300" />
    </div>
    <div class="container about-section">
        <h2>
            ABOUT US
        </h2>
        <p>
            Denshoes adalah sebuah website yang bisa digunakan untuk memesan jasa layanan cuci sepatu online. Dengan
            memanfaatkan teknologi yang ada, kalian bisa langsung memesan jasa hanya dengan melalui telepon genggam
            saja.
        </p>
        <p>
            Kami berharap dengan adanya website ini dapat memberikan solusi, terlebih untuk kalian yang ingin menjaga
            sepatu tetap bagus dan bersih seperti pertama kali beli.
        </p>
    </div>
    <div class="container services-section">
        <h2 class="text-center">
            OUR SERVICES
        </h2>
        <h3 class="text-center">
            Layanan kami
        </h3>
        <div class="row">
            <div class="col-md-4">
                <div class="service-card">
                    <img alt="Fast Cleaning service illustration" height="100" src="user/img/fastcleaning.png"
                        width="100" />
                    <h4>
                        FAST CLEANING
                    </h4>
                    <p>
                        Treatment pencucian untuk membersihkan sepatu pada bagian upper dan midsole
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-card">
                    <img alt="Whitening service illustration" height="100" src="user/img/whitening.png"
                        width="100" />
                    <h4>
                        WHITENING
                    </h4>
                    <p>
                        Treatment pencucian khusus untuk sepatu berbahan canvas dan mesh berwarna putih dengan noda
                        kuning ataupun saus
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-card">
                    <img alt="Reglue service illustration" height="100" src="user/img/reglue.png" width="100" />
                    <h4>
                        REGLUE
                    </h4>
                    <p>
                        Merapikan bagian sepatu yang sudah mengelupas
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-card">
                    <img alt="Repaint Khusus service illustration" height="100" src="user/img/repaintkhusus.png"
                        width="100" />
                    <h4>
                        REPAINT KHUSUS
                    </h4>
                    <p>
                        Menggunakan bahan premium untuk sepatu berbahan suede dan nubuck
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-card">
                    <img alt="Pickup Services illustration" height="100" src="user/img/pickupservice.png"
                        width="100" />
                    <h4>
                        PICKUP SERVICES
                    </h4>
                    <p>
                        Layanan untuk pengambilan sepatu di tempat yang anda tentukan
                    </p>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('user.layanan') }}" class="btn btn-primary">
                Selengkapnya
            </a>
        </div>
    </div>
    </div>
    <div class="features">
        <div class="feature">
            <div class="icon-circle"><i class="fas fa-wallet"></i></div>
            <h4>HARGA TERJANGKAU</h4>
            <p>Semua layanan kami memiliki harga yang terjangkau baik untuk pelajar, mahasiswa maupun untuk pekerja.</p>
        </div>
        <div class="feature">
            <div class="icon-circle"><i class="fas fa-user"></i></div>
            <h4>TEKNISI BERPENGALAMAN</h4>
            <p>Tim kami yang sudah berpengalaman dapat dipercaya untuk menyelesaikan permasalahan pada sepatu anda.</p>
        </div>
        <div class="feature">
            <div class="icon-circle"><i class="fas fa-home"></i></div>
            <h4>ECO FRIENDLY</h4>
            <p>Kami menggunakan bahan-bahan alami yang aman dan di khususkan untuk bahan sepatu anda.</p>
        </div>
    </div>

    @include('layoutsuser.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+3i5d5L5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5>
 </body>
</html>
