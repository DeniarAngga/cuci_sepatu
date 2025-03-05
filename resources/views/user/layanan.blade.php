<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   Denshoes Cleaning
  </title>
  <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
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
        .about-section, .services-section {
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
              <a href="{{ route('welcome') }}" class="text-decoration-none">Home</a> / Layanan
          </h5>
          <h2 class="text-center">Layanan Pesanan</h2>
      </div>
  </div>

  <!-- Konten Layanan -->
  <div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card service-card">
                <img src="user/img/fastcleaning.png" class="card-img-top mx-auto d-block" alt="Layanan 1">
                <div class="card-body text-center">
                    <h5 class="card-title">FAST CLEANING</h5>
                    <p class="card-text">Treatment pencucian untuk membersihkan sepatu pada bagian upper dan midsole</p>
                    <p class="price"><strong>Rp 0</strong></p>
                    <a href="{{ route('user.fastcleaning') }}" class="btn btn-primary">Keterangan Layanan</a>
                    <a href="{{ route('user.order') }}" class="btn btn-primary" style="margin-top: 10px;">Pesan</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card service-card">
                <img src="user/img/deepcleaning.png" class="card-img-top mx-auto d-block" alt="Layanan 2">
                <div class="card-body text-center">
                    <h5 class="card-title">DEEP CLEANING</h5>
                    <p class="card-text">Treatment pencucian untuk membersihkan sepatu pada bagian upper,midsole,outsole dan parfume</p>
                    <p class="price"><strong>Rp 0</strong></p>
                    <a href="{{ route('user.deepcleaning') }}" class="btn btn-primary">Keterangan Layanan</a>
                    <a href="{{ route('user.order') }}" class="btn btn-primary" style="margin-top: 10px;">Pesan</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card service-card">
                <img src="user/img/unyellowing.png" class="card-img-top mx-auto d-block" alt="Layanan 3">
                <div class="card-body text-center">
                    <h5 class="card-title">UNYELLOWING</h5>
                    <p class="card-text">Treatment pengoksidasi khusus untuk midsole sepatu,aman untuk bahan rubber/karet.Solusi untuk mengembalikan warna midsole yang menguning</p>
                    <p class="price"><strong>Rp 0</strong></p>
                    <a href="{{ route('user.unyellowing') }}" class="btn btn-primary">Keterangan Layanan</a>
                    <a href="{{ route('user.order') }}" class="btn btn-primary" style="margin-top: 10px;">Pesan</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-4">
            <div class="card service-card">
                <img src="user/img/whitening.png" class="card-img-top mx-auto d-block" alt="Layanan 1">
                <div class="card-body text-center">
                    <h5 class="card-title">WHITENING</h5>
                    <p class="card-text">Treatment pencucian khusus untuk sepatu berbaahan canvas dan mesh berwarna putih dengan noda kuning ataupun saus</p>
                    <p class="price"><strong>Rp 0</strong></p>
                    <a href="{{ route('user.whitening') }}" class="btn btn-primary">Keterangan Layanan</a>
                    <a href="{{ route('user.order') }}" class="btn btn-primary" style="margin-top: 10px;">Pesan</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-4">
            <div class="card service-card">
                <img src="user/img/reglue.png" class="card-img-top mx-auto d-block" alt="Layanan 1">
                <div class="card-body text-center">
                    <h5 class="card-title">REGLUE</h5>
                    <p class="card-text">Merapikan bagian sepatu yang sudah mengekupas</p>
                    <p class="price"><strong>Rp 0</strong></p>
                    <a href="{{ route('user.reglue') }}" class="btn btn-primary">Keterangan Layanan</a>
                    <a href="{{ route('user.order') }}" class="btn btn-primary" style="margin-top: 10px;">Pesan</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-4">
            <div class="card service-card">
                <img src="user/img/repaintbiasa.png" class="card-img-top mx-auto d-block" alt="Layanan 1">
                <div class="card-body text-center">
                    <h5 class="card-title">REPAINT BIASA</h5>
                    <p class="card-text">Menggunakan bahan standar untuk sepatu canvas</p>
                    <p class="price"><strong>Rp 0</strong></p>
                    <a href="{{ route('user.repaintbiasa') }}" class="btn btn-primary">Keterangan Layanan</a>
                    <a href="{{ route('user.order') }}" class="btn btn-primary" style="margin-top: 10px;">Pesan</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-4 mb-5  ">
            <div class="card service-card">
                <img src="user/img/repaintkhusus.png" class="card-img-top mx-auto d-block" alt="Layanan 1">
                <div class="card-body text-center">
                    <h5 class="card-title">REPAINT KHUSUS</h5>
                    <p class="card-text">Menggunakan bahan premium untuk sepatu suede,mesh,leather dan nubuck</p>
                    <p class="price"><strong>Rp 0</strong></p>
                    <a href="{{ route('user.repaintkhusus') }}" class="btn btn-primary">Keterangan Layanan</a>
                    <a href="{{ route('user.order') }}" class="btn btn-primary" style="margin-top: 10px;">Pesan</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-4 mb-5">
            <div class="card service-card">
                <img src="user/img/pickupservice.png" class="card-img-top mx-auto d-block" alt="Layanan 1">
                <div class="card-body text-center">
                    <h5 class="card-title">PICKUP SERVICES</h5>
                    <p class="card-text">Layanan untuk pengambilan sepatu di tempat yang anda tentukan</p>
                    <p class="price"><strong>Rp 0</strong></p>
                    <a href="{{ route('user.pickupservices') }}" class="btn btn-primary">Keterangan Layanan</a>
                    <a href="{{ route('user.orderpickup') }}" class="btn btn-primary" style="margin-top: 10px;">Pesan</a>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layoutsuser.footer')

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+3i5d5L5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5>
 </body>
</html>