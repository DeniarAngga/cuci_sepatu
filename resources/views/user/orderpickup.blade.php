<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Pickup Form - DenShoes Cleaning</title>
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
        bottom: -25px; /* tampil di bawah slider */
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
                        <input
                            type="range"
                            class="form-range"
                            min="1"
                            max="10"
                            step="1"
                            value="1"
                            id="jumlahItemRange"
                            name="jumlah_item"
                            oninput="updateBubble(this)"
                        >
                        <output id="rangeBubble">1</output>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat Pickup</label>
                    <input type="text" name="alamat" class="form-control" placeholder="Gunakan lokasi saat ini?" value="{{ old('alamat', Auth::user()->alamat ?? '') }}">
                </div>

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
            </div>
            

            <!-- Kanan -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama lengkap" value="{{ old('nama_lengkap', Auth::user()->name ?? '') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email aktif" value="{{ old('email', Auth::user()->email ?? '') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Nomor HP / WhatsApp</label>
                    <input type="text" name="nomor_handphone" class="form-control" placeholder="08xxxxxxxxxx" value="{{ old('nomor_handphone', Auth::user()->phone ?? '') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Layanan / Treatment</label>
                    <select name="jenis_layanan" class="form-control" required>
                        <option value="">Pilih layanan</option>
                        @foreach ($layanans as $layanan)
                            @if ($layanan->jenis_layanan !== 'PICKUP SERVICES')
                                @php
                                    $layananText = $layanan->jenis_layanan
                                @endphp
                                <option value="{{ $layananText }}" data-harga="{{ $layanan->harga }}" {{ old('layanan') == $layananText ? 'selected' : '' }}>
                                    {{ $layananText }}
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
                            <span id="biayaLayanan">Rp0</span>
                        </li>
                        <hr>
                        <li class="d-flex justify-content-between fs-5 fw-bold">
                            <span>Total Pembayaran</span>
                            <span id="totalPembayaran" class="text-danger">Rp0</span>
                        </li>
                    </ul>
                    <!-- Optional: Kirim total ke server -->
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectLayanan = document.getElementById('jenis_layanan');
            const pickupPrice = parseInt(document.getElementById('pickup_price').value);
            const totalHargaInput = document.getElementById('total_harga');

            selectLayanan.addEventListener('change', function() {
                const selectedOption = selectLayanan.options[selectLayanan.selectedIndex];
                const hargaLayanan = parseInt(selectedOption.getAttribute('data-harga')) || 0;
                const totalHarga = layananHarga + pickupPrice;
                totalHargaInput.value = totalHarga;
            });
        });
    </script>

    <script>
    function updateBubble(range) {
        const bubble = document.getElementById('rangeBubble');
        const value = range.value;
        bubble.innerHTML = value;

        const rangeWidth = range.offsetWidth;
        const max = range.max;
        const min = range.min;
        const percent = (value - min) / (max - min);

        const thumbWidth = 20; // perkiraan lebar thumb
        const bubbleLeft = percent * (rangeWidth - thumbWidth) + thumbWidth / 2;

        bubble.style.left = `${bubbleLeft}px`;
    }

    document.addEventListener("DOMContentLoaded", function () {
        updateBubble(document.getElementById('jumlahItemRange'));
    });
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const layananSelect = document.querySelector('select[name="jenis_layanan"]');
    const jumlahRange = document.getElementById('jumlahItemRange');
    const subtotalPesanan = document.getElementById('subtotalPesanan');
    const subtotalPengirimanEl = document.getElementById('subtotalPengiriman');
    const biayaLayananEl = document.getElementById('biayaLayanan');
    const totalPembayaran = document.getElementById('totalPembayaran');
    const totalHargaInput = document.getElementById('totalHargaInput');

    // Biaya tetap
    const biayaPengiriman = 32000;
    const biayaLayanan = 2000;

    function formatRupiah(angka) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        }).format(angka);
    }

    function hitungTotal() {
        const selectedOption = layananSelect.options[layananSelect.selectedIndex];
        const hargaLayanan = parseInt(selectedOption.getAttribute('data-harga')) || 0;
        const jumlahItem = parseInt(jumlahRange.value) || 1;

        const subtotal = hargaLayanan * jumlahItem;
        const total = subtotal + biayaPengiriman + biayaLayanan;

        subtotalPesanan.textContent = formatRupiah(subtotal);
        subtotalPengirimanEl.textContent = formatRupiah(biayaPengiriman);
        biayaLayananEl.textContent = formatRupiah(biayaLayanan);
        totalPembayaran.textContent = formatRupiah(total);
        totalHargaInput.value = total;
    }

    jumlahRange.addEventListener('input', hitungTotal);
    layananSelect.addEventListener('change', hitungTotal);

    hitungTotal(); // hitung saat pertama load
});
</script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
