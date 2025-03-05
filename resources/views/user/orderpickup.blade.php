<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>Pickup Form - People Shoes</title>
  <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    .navbar-nav .nav-link {
      color: #6c757d;
    }
    .form-container {
      max-width: 800px;
      margin: 50px auto;
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }
    h2 {
      color: #333;
      margin-bottom: 20px;
    }
    .highlight {
      color: #ff6600;
      font-weight: bold;
    }
    .submit-btn {
      background-color: #00c6ff;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 1rem;
    }
    .submit-btn:hover {
      background-color: #009acd;
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

<div class="form-container">
  <h2>Layanan Pickup / Ambil dari DENSHOES CLEANING ini <span class="highlight">GRATIS</span></h2>
  <p>Silahkan isi data di bawah ini dan tekan <strong>'Submit Now'</strong>.</p>
  <hr>

  <form>
    <div class="mb-3">
      <label>Alamat Pickup</label>
      <input type="text" class="form-control" placeholder="Gunakan lokasi saat ini?">
    </div>
    <div class="mb-3">
      <label>Tanggal Pickup</label>
      <input type="date" class="form-control">
    </div>
    <div class="mb-3">
      <label>Waktu Pickup</label>
      <select class="form-control">
        <option>Pilih...</option>
        <option>Pagi (08:00 - 12:00)</option>
        <option>Siang (12:00 - 16:00)</option>
        <option>Sore (16:00 - 20:00)</option>
      </select>
    </div>
    <div class="mb-3">
      <label>Nama</label>
      <input type="text" class="form-control" placeholder="Nama lengkap">
    </div>
    <div class="mb-3">
      <label>Email</label>
      <input type="email" class="form-control" placeholder="Email aktif">
    </div>
    <div class="mb-3">
      <label>Nomor HP / WhatsApp</label>
      <input type="tel" class="form-control" placeholder="Nomor HP/WA">
    </div>
    <div class="mb-3">
      <label>Layanan / Treatment</label>
      <input type="text" class="form-control" placeholder="Jenis layanan yang diinginkan">
    </div>
    <button type="submit" class="submit-btn">SUBMIT NOW</button>
  </form>
</div>

@include('layoutsuser.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>