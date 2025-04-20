<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Pickup Form - People Shoes</title>
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
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

        {{-- Success Message --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Error Messages --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Pesan Peringatan Jika Belum Login -->
        @if (session('warning'))
            <div class="alert alert-warning transition-opacity" id="warning-message">
                {{ session('warning') }}
            </div>
        @endif

        <form action="{{ route('orderpickup.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Alamat Pickup</label>
                <input type="text" name="alamat" class="form-control"
                    value="{{ old('alamat', Auth::user()->alamat ?? '') }}" placeholder="Gunakan lokasi saat ini?">
            </div>
            <div class="mb-3">
                <label>Tanggal Pickup</label>
                <input type="date" name="tanggal_pesan" class="form-control">
            </div>
            {{-- <div class="mb-3">
                <label>Waktu Pickup</label>
                <select name="waktu" class="form-control">
                    <option value="">Pilih waktu</option>
                    <option>Pagi (08:00 - 12:00)</option>
                    <option>Siang (12:00 - 16:00)
                    </option>
                    <option>Sore (16:00 - 20:00)</option>
                </select>
            </div> --}}
            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama_lengkap" class="form-control"
                    value="{{ old('nama_lengkap', Auth::user()->name ?? '') }}" placeholder="Nama lengkap">
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control"
                    value="{{ old('email', Auth::user()->email ?? '') }}" placeholder="Email">
            </div>
            <div class="mb-3">
                <label>Nomor HP / WhatsApp</label>
                <input type="text" name="nomor_handphone" class="form-control"
                    value="{{ old('nomor_handphone', Auth::user()->phone ?? '') }}" placeholder="Nomor HP/WA">
            </div>
            <div class="mb-3">
                <label for="layanan">Layanan / Treatment</label>
                <select name="jenis_layanan" class="form-control" required>
                    <option value="">Pilih layanan</option>
                    @foreach ($layanans as $layanan)
                        @if ($layanan->jenis_layanan !== 'PICKUP SERVICES')
                            @php
                                $layananText =
                                    $layanan->jenis_layanan . ' - Rp' . number_format($layanan->harga, 0, ',', '.');
                            @endphp
                            <option value="{{ $layananText }}" {{ old('layanan') == $layananText ? 'selected' : '' }}>
                                {{ $layananText }}
                            </option>
                        @endif
                    @endforeach
                </select>
            </div>

            <!-- Tambahkan hidden input untuk pickup price -->
            <input type="hidden" id="pickup_price"
                value="{{ $layanans->where('jenis_layanan', 'PICKUP SERVICES')->first()->harga ?? 0 }}">
            <input type="hidden" name="total_harga" id="total_harga">

            <div class="mb-3">
                <label class="block font-semibold mb-1">Jenis Sepatu</label>
                <select name="jenis_sepatu" class="form-control" required>
                    <option value="" selected>Pilih jenis sepatu</option>
                    @foreach ($jenisSepatu as $jenis)
                        <option value="{{ $jenis->jenis_sepatu }}">{{ $jenis->jenis_sepatu }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="submit-btn">SUBMIT NOW</button>
        </form>
    </div>

    @include('layoutsuser.footer')

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

    <script>
        // Tunggu hingga DOM siap
        document.addEventListener("DOMContentLoaded", function() {
            const warningMessage = document.getElementById('warning-message');
            if (warningMessage) {
                setTimeout(() => {
                    warningMessage.style.opacity = '0';
                }, 3000); // 3 detik

                setTimeout(() => {
                    warningMessage.remove(); // Opsional: Hapus elemen dari DOM
                }, 3500);
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectLayanan = document.getElementById('jenis_layanan');
            const pickupPrice = parseInt(document.getElementById('pickup_price').value);
            const totalHargaInput = document.getElementById('total_harga');

            selectLayanan.addEventListener('change', function() {
                const selectedOption = selectLayanan.options[selectLayanan.selectedIndex];
                const layananHarga = parseInt(selectedOption.getAttribute('data-harga')) || 0;
                const totalHarga = layananHarga + pickupPrice;
                totalHargaInput.value = totalHarga;
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
