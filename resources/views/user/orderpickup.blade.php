<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Pickup Form - DenShoes Cleaning</title>
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
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

        #jumlahItemRange {
            width: 100%;
        }

        output#rangeBubble {
            position: absolute;
            bottom: -25px;
            /* tampil di bawah slider */
            left: 0;
            transform: translateX(-50%);
            background: #000;
            color: #fff;
            padding: 4px 8px;
            font-size: 0.8rem;
            border-radius: 20px;
            white-space: nowrap;
            pointer-events: none;
            transition: left 0.1s ease;
        }

        #map {
            height: 300px;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .lokasi-link {
            font-size: 0.875rem;
            display: block;
            margin-bottom: 0.5rem;
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .lokasi-link:hover,
        .lokasi-link:focus {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    @include('layoutsuser.navbar')

    <div class="container py-5">
        <h2 class="fw-bold mb-2 text-center">
            Layanan Pickup / Ambil dari DENSHOES CLEANING ini <span class="text-danger">GRATIS</span>
        </h2>
        <p class="text-center mb-4">Silakan isi data di bawah ini dan tekan <strong>'Submit Now'</strong>.</p>
        <hr class="mb-4">

        {{-- Alert Messages --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('warning'))
            <div class="alert alert-warning">{{ session('warning') }}</div>
        @endif

        <form action="{{ route('orderpickup.store') }}" method="POST">
            @csrf
            <div class="row">
                <!-- Kiri -->
                <div class="col-md-6">
                    <div class="position-relative" style="padding-bottom: 2.5rem;">
                        <label class="form-label">Jumlah Item</label>
                        <div class="position-relative">
                            <input type="range" class="form-range" min="1" max="10" step="1"
                                value="1" id="jumlahItemRange" name="jumlah_item" oninput="updateBubble(this)">
                            <output id="rangeBubble">1</output>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Alamat Pickup</label>
                        <span id="getLocationNow" class="lokasi-link">
                            Gunakan lokasi saat ini?
                        </span>
                        <input type="text" name="alamat" id="alamatPickup" class="form-control">
                    </div>

                    <input type="hidden" name="pickup_lat" id="pickupLat">
                    <input type="hidden" name="pickup_lng" id="pickupLng">

                    <!-- Peta -->
                    <div id="map"
                        style="height: 300px; border: 1px solid #ccc; border-radius: 8px; margin-bottom: 1rem;"></div>

                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama lengkap"
                            value="{{ old('nama_lengkap', Auth::user()->name ?? '') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email aktif"
                            value="{{ old('email', Auth::user()->email ?? '') }}">
                    </div>
                </div>


                <!-- Kanan -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Tanggal Pickup</label>
                        <input type="date" name="tanggal_pesan" class="form-control">
                    </div>
                    <!-- Jenis Sepatu -->
                    <div class="mb-3">
                        <label class="form-label">Jenis Sepatu</label>
                        <select name="jenis_sepatu" class="form-control" required>
                            <option value="" selected>Pilih jenis sepatu</option>
                            @foreach ($jenisSepatu as $jenis)
                                <option value="{{ $jenis->jenis_sepatu }}">{{ $jenis->jenis_sepatu }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nomor HP / WhatsApp</label>
                        <input type="text" name="nomor_handphone" class="form-control" placeholder="08xxxxxxxxxx"
                            value="{{ old('nomor_handphone', Auth::user()->phone ?? '') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Layanan / Treatment</label>
                        <select name="jenis_layanan" id="jenis_layanan" class="form-control" required>
                            <option value="">Pilih layanan</option>
                            @foreach ($layanans as $layanan)
                                @if ($layanan->jenis_layanan !== 'PICKUP SERVICES')
                                    <option value="{{ $layanan->jenis_layanan }}" data-harga="{{ $layanan->harga }}">
                                        {{ $layanan->jenis_layanan }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-4">
                        <h5 class="mb-3">Rincian Pembayaran</h5>
                        <ul class="list-unstyled">
                            <li class="d-flex justify-content-between">
                                <span>Subtotal Pesanan</span>
                                <span id="subtotalPesanan">Rp0</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <span>Subtotal Pengiriman</span>
                                <span id="subtotalPengiriman">Rp0</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <span>Biaya Layanan</span>
                                <span id="biayaLayanan">Rp2000</span>
                            </li>
                            <hr>
                            <li class="d-flex justify-content-between fw-bold fs-5">
                                <span>Total</span>
                                <span id="totalPembayaran">Rp0</span>
                            </li>
                        </ul>
                    
                        <!-- Input hidden untuk data yang akan dikirim ke controller -->
                        <input type="hidden" name="subtotal_pesanan" id="subtotalPesananInput">
                        <input type="hidden" name="subtotal_pengiriman" id="subtotalPengirimanInput">
                        <input type="hidden" name="biaya_layanan" id="biayaLayananInput">
                        <input type="hidden" name="total_harga" id="totalHargaInput">
                    </div>                    
                </div>
            </div>

            <!-- Submit Button -->
            <div class="text-end">
                <button type="submit" class="btn btn-dark px-4 py-2">SUBMIT NOW</button>
            </div>
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

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const layananSelect = document.getElementById('jenis_layanan');
            const jumlahRange = document.getElementById('jumlahItemRange');
            const subtotalPesanan = document.getElementById('subtotalPesanan');
            const subtotalPengirimanEl = document.getElementById('subtotalPengiriman');
            const biayaLayananEl = document.getElementById('biayaLayanan');
            const totalPembayaran = document.getElementById('totalPembayaran');
            const totalHargaInput = document.getElementById('totalHargaInput');
    
            // Tambahan input hidden
            const subtotalPesananInput = document.getElementById('subtotalPesananInput');
            const subtotalPengirimanInput = document.getElementById('subtotalPengirimanInput');
            const biayaLayananInput = document.getElementById('biayaLayananInput');
    
            const alamatPickup = document.getElementById('alamatPickup');
            const pickupLatInput = document.getElementById('pickupLat');
            const pickupLngInput = document.getElementById('pickupLng');
            const getLocationBtn = document.getElementById('getLocationNow');
    
            const biayaLayanan = 2000;
            let biayaPengiriman = 0;
    
            function formatRupiah(angka) {
                return new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0
                }).format(angka);
            }
    
            function hitungTotal(dynamicBiayaPengiriman = biayaPengiriman) {
                const selectedOption = layananSelect.options[layananSelect.selectedIndex];
                const hargaLayanan = parseInt(selectedOption.getAttribute('data-harga')) || 0;
                const jumlahItem = parseInt(jumlahRange.value) || 1;
    
                const subtotal = hargaLayanan * jumlahItem;
                const total = subtotal + dynamicBiayaPengiriman + biayaLayanan;
    
                subtotalPesanan.textContent = formatRupiah(subtotal);
                subtotalPengirimanEl.textContent = formatRupiah(dynamicBiayaPengiriman);
                biayaLayananEl.textContent = formatRupiah(biayaLayanan);
                totalPembayaran.textContent = formatRupiah(total);
                totalHargaInput.value = total;
    
                // Tambahan hidden input
                subtotalPesananInput.value = subtotal;
                subtotalPengirimanInput.value = dynamicBiayaPengiriman;
                biayaLayananInput.value = biayaLayanan;
            }
    
            function updateBubble(range) {
                const bubble = document.getElementById('rangeBubble');
                const value = range.value;
                bubble.innerHTML = value;
                const percent = (value - range.min) / (range.max - range.min);
                const bubbleLeft = percent * (range.offsetWidth - 20) + 10;
                bubble.style.left = `${bubbleLeft}px`;
            }
    
            jumlahRange.addEventListener('input', () => {
                updateBubble(jumlahRange);
                hitungTotal();
            });
    
            layananSelect.addEventListener('change', () => hitungTotal());
    
            updateBubble(jumlahRange); // On load
    
            const tokoLatLng = L.latLng(-6.977124497671769, 109.1132571361185);
            const map = L.map('map').setView(tokoLatLng, 13);
    
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);
    
            let pickupMarker;
    
            function updatePickup(latlng) {
                pickupLatInput.value = latlng.lat;
                pickupLngInput.value = latlng.lng;
    
                const distance = map.distance(latlng, tokoLatLng) / 1000;
    
                if (distance <= 5) {
                    biayaPengiriman = 0;
                } else if (distance <= 10) {
                    biayaPengiriman = 7000;
                } else if (distance <= 20) {
                    biayaPengiriman = 15000;
                } else {
                    biayaPengiriman = 30000;
                }
    
                fetch(`https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${latlng.lat}&lon=${latlng.lng}`)
                    .then(res => res.json())
                    .then(data => {
                        if (data.display_name) {
                            alamatPickup.value = data.display_name;
                            if (pickupMarker) {
                                pickupMarker.bindPopup(`<strong>Alamat:</strong><br>${data.display_name}`).openPopup();
                            }
                        }
                    });
    
                hitungTotal(biayaPengiriman);
            }
    
            map.on('click', function(e) {
                const latlng = e.latlng;
    
                if (pickupMarker) {
                    pickupMarker.setLatLng(latlng);
                } else {
                    pickupMarker = L.marker(latlng, { draggable: true }).addTo(map);
                    pickupMarker.on('dragend', function(e) {
                        updatePickup(e.target.getLatLng());
                    });
                }
    
                updatePickup(latlng);
            });
    
            getLocationBtn.addEventListener('click', function(e) {
                e.preventDefault();
    
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(
                        function(position) {
                            const lat = position.coords.latitude;
                            const lng = position.coords.longitude;
                            const latlng = L.latLng(lat, lng);
    
                            map.setView(latlng, 16);
    
                            if (pickupMarker) {
                                pickupMarker.setLatLng(latlng);
                            } else {
                                pickupMarker = L.marker(latlng, { draggable: true }).addTo(map);
                                pickupMarker.on('dragend', function(e) {
                                    updatePickup(e.target.getLatLng());
                                });
                            }
    
                            updatePickup(latlng);
                        },
                        function(error) {
                            alert("Gagal mendapatkan lokasi. Pastikan izin lokasi diaktifkan.");
                            console.error(error);
                        }
                    );
                } else {
                    alert("Geolocation tidak didukung di browser ini.");
                }
            });
        });
    </script>
    



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
