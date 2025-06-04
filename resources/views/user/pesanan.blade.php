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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
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
    </style>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.clientKey') }}">
    </script>

</head>

<body>

    @include('layoutsuser.navbar')

    <!-- Konten Order -->
    <div class="container hero-section mt-5 d-flex justify-content-center align-items-center" style="height: 50vh;">
        <div>
            <h5 class="text-center">
                <a href="{{ route('welcome') }}" class="text-decoration-none">Home</a> / Pesanan
            </h5>
            <h2 class="text-center">Pesanan Saya</h2>
        </div>
    </div>

    {{-- Success Message --}}
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

    <!-- Konten Layanan -->
    <div class="container mt-5 mb-5">
        <div class="w-100 p-6 bg-white rounded-lg">
            <table class="table table-bordered text-center">
                <thead class="bg-light">
                    <tr>
                        <th>No Pesan</th>
                        <th>Nama Pemesan</th>
                        <th>Alamat Pemesan</th>
                        <th>Pilihan Paket</th>
                        <th>Jumlah Item</th>
                        <th>Tanggal Pesan</th>
                        <th>Total Pesanan</th>
                        <th>Status Pesanan</th>
                        <th>Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pesanan as $index => $item)
                        <tr>
                            <td>{{ $item->no_pesanan }}</td>
                            <td>{{ $item->nama_lengkap }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->jenis_layanan }}</td>
                            <td>{{ $item->jumlah_item }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal_pesan)->locale('id')->translatedFormat('d F Y') }}
                            </td>

                            {{-- Kolom Total Pesanan dengan Toggle Icon --}}
                            <td
                                style="position: relative; cursor: pointer; user-select: none; white-space: nowrap; width: 150px;">
                                <div style="display: inline-flex; align-items: center; gap: 4px;"
                                    onclick="toggleDetail({{ $loop->index }})">
                                    <span>Rp {{ number_format($item->total, 0, ',', '.') }}</span>
                                    <i class="bi bi-caret-down-fill" id="iconArrow{{ $loop->index }}"
                                        style="font-size: 1rem;"></i>
                                </div>

                                <div id="detail{{ $loop->index }}"
                                    style="display: none; position: absolute; top: 100%; left: 0; z-index: 10; background: white; 
                                            border: 1px solid #ddd; padding: 10px; width: 300px; box-shadow: 0 2px 5px rgba(0,0,0,0.15); 
                                            font-size: 0.875rem; color: #333; border-radius: 4px;">
                                    <ul class="list-unstyled mb-0">
                                        <li><strong>Subtotal Pesanan:</strong> Rp
                                            {{ number_format($item->subtotal_pesanan ?? 0, 0, ',', '.') }}</li>
                                        <li><strong>Subtotal Pengiriman:</strong> Rp
                                            {{ number_format($item->subtotal_pengiriman ?? 0, 0, ',', '.') }}</li>
                                        <li><strong>Biaya Layanan:</strong> Rp
                                            {{ number_format($item->biaya_layanan ?? 2000, 0, ',', '.') }}</li>
                                        <hr>
                                        <li><strong>Total:</strong> Rp {{ number_format($item->total, 0, ',', '.') }}
                                        </li>
                                    </ul>
                                </div>
                            </td>

                            <td class="text-secondary">{{ $item->status_pesanan }}</td>

                            <td>
                                @if ($item->status_transaksi === 'Belum Bayar' && isset($snapTokens[$item->midtrans_order_id]))
                                    <button class="btn btn-danger pay-button"
                                        data-order-id="{{ $item->midtrans_order_id }}"
                                        data-snap-token="{{ $snapTokens[$item->midtrans_order_id] }}"
                                        id="pay-button-{{ $item->id }}">
                                        Bayar
                                    </button>
                                @elseif ($item->status_transaksi === 'Lunas')
                                    <button class="btn btn-success" disabled>Lunas</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Form Pembayaran -->
    {{-- <div class="modal fade" id="formPembayaranModal" tabindex="-1" aria-labelledby="formPembayaranLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formPembayaranLabel">Form Pembayaran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div id="metode_info" style="display: none; margin-top: 10px;">
                            <p><strong id="jenis_bayar"></strong> | Atas Nama : <strong id="name"></strong> | Nomor
                                Rekening: <strong id="nomor_rekening"></strong></p>
                        </div>

                        <div class="mb-3">
                            <label for="no_pesanan" class="form-label">No Pesanan</label>
                            <input type="text" class="form-control" id="no_pesanan" name="no_pesanan" readonly
                                style="background-color: #e9ecef;">
                        </div>

                        <div class="mb-3">
                            <label for="jenis_layanan" class="form-label">Paket</label>
                            <input type="text" class="form-control" id="jenis_layanan" name="jenis_layanan" readonly
                                style="background-color: #e9ecef;">
                        </div>

                        <div class="mb-3">
                            <label for="metode_bayar" class="form-label">Metode Bayar</label>
                            <select class="form-select" id="metode_bayar" name="metode_bayar" required
                                onchange="getMetodeBayar()">
                                <option value="" selected>Pilih Metode</option>
                                <option value="Transfer Bank">Transfer Bank</option>
                                <option value="E-Wallet">E-Wallet</option>
                                <option value="COD">COD</option> <!-- Tambahkan Opsi COD -->
                            </select>
                        </div>

                        <!-- Pilihan Bank / E-Wallet -->
                        <div class="mb-3" id="metodeOptions" style="display: none;">
                            <label for="metode_id" class="form-label">Pilih Bank / E-Wallet</label>
                            <select class="form-select" id="metode_id" name="metode_id"
                                onchange="updateMetodeInfo()">
                                <option value="" selected>Pilih Bank / E-Wallet</option>
                            </select>
                        </div>


                        <div class="mb-3">
                            <label for="total_bayar_show" class="form-label">Total Bayar</label>
                            <input type="text" class="form-control" id="total_bayar_show" readonly
                                style="background-color: #e9ecef;">
                            <input type="hidden" id="total_bayar" name="total_bayar">
                        </div>

                        <div class="mb-3">
                            <label for="bukti_pembayaran" class="form-label">Upload Bukti Pembayaran</label>
                            <input type="file" class="form-control" id="bukti_pembayaran" name="bukti_pembayaran"
                                required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Bayar</button>
                    </div>
                </div>
            </form>
        </div>
    </div> --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.clientKey') }}">
    </script>

    <script>
        function toggleDetail(index) {
            const detail = document.getElementById(`detail${index}`);
            const icon = document.getElementById(`iconArrow${index}`);

            if (detail.style.display === "none" || detail.style.display === "") {
                detail.style.display = "block";
                icon.classList.remove("bi-caret-down-fill");
                icon.classList.add("bi-caret-up-fill");
            } else {
                detail.style.display = "none";
                icon.classList.remove("bi-caret-up-fill");
                icon.classList.add("bi-caret-down-fill");
            }
        }
    </script>

    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const items = @json($pesanan);
                items.forEach((_, i) => {
                    const collapseEl = document.getElementById(`rincian${i}`);
                    const iconEl = document.getElementById(`iconArrow${i}`);
                    collapseEl.addEventListener('show.bs.collapse', () => {
                        iconEl.classList.remove('bi-caret-down-fill');
                        iconEl.classList.add('bi-caret-up-fill');
                    });
                    collapseEl.addEventListener('hide.bs.collapse', () => {
                        iconEl.classList.remove('bi-caret-up-fill');
                        iconEl.classList.add('bi-caret-down-fill');
                    });
                });
            });
        </script>
    @endpush

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

    <script>
        function getMetodeBayar() {
            var metodeBayar = document.getElementById("metode_bayar").value;
            var metodeOptions = document.getElementById("metodeOptions");
            var metodeSelect = document.getElementById("metode_id");
            var metodeInfo = document.getElementById("metode_info");

            // Jika memilih COD, sembunyikan semua dropdown
            if (metodeBayar === "COD") {
                metodeOptions.style.display = "none";
                metodeInfo.style.display = "none";
                return;
            }

            if (metodeBayar) {
                fetch('/pesanan/get-metode?metode_bayar=' + metodeBayar)
                    .then(response => response.json())
                    .then(data => {
                        metodeSelect.innerHTML = '<option value="">Pilih Bank / E-Wallet</option>';
                        data.forEach(metode => {
                            metodeSelect.innerHTML +=
                                `<option value="${metode.id}" data-jenis="${metode.jenis_bayar}" data-name="${metode.name}" data-rekening="${metode.nomor_rekening}">${metode.jenis_bayar}</option>`;
                        });

                        metodeOptions.style.display = "block"; // Tampilkan dropdown bank/e-wallet
                    });
            } else {
                metodeOptions.style.display = "none"; // Sembunyikan jika metode kosong
                metodeInfo.style.display = "none";
            }
        }

        function updateMetodeInfo() {
            var selectedOption = document.getElementById("metode_id").selectedOptions[0];
            var metodeInfo = document.getElementById("metode_info");

            if (selectedOption.value) {
                document.getElementById("jenis_bayar").innerText = selectedOption.getAttribute("data-jenis");
                document.getElementById("name").innerText = selectedOption.getAttribute("data-name");
                document.getElementById("nomor_rekening").innerText = selectedOption.getAttribute("data-rekening");
                metodeInfo.style.display = "block"; // Tampilkan informasi metode pembayaran
            } else {
                metodeInfo.style.display = "none"; // Sembunyikan jika tidak memilih
            }
        }
    </script>

    <script>
        function openBayarModal(button) {
            const id = button.getAttribute('data-id');
            const no = button.getAttribute('data-no');
            const layanan = button.getAttribute('data-layanan');
            const harga = button.getAttribute('data-harga');

            // Format harga
            const formattedHarga = 'Rp ' + parseInt(harga).toLocaleString('id-ID');

            // Isi ke input form
            document.getElementById('no_pesanan').value = no;
            document.getElementById('jenis_layanan').value = layanan;
            document.getElementById('total_bayar_show').value = formattedHarga;
            document.getElementById('total_bayar').value = harga; // hanya angka

            // Set form action
            document.querySelector('#formPembayaranModal form').action = '/pembayaran/' + id;
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.pay-button').forEach(function(button) {
                button.addEventListener('click', function() {
                    const snapToken = this.getAttribute('data-snap-token');
                    const orderId = this.getAttribute('data-order-id');
                    const buttonEl = this;

                    snap.pay(snapToken, {
                        onSuccess: function(result) {
                            fetch("{{ route('midtrans.callback.manual') }}", {
                                    method: "POST",
                                    headers: {
                                        "Content-Type": "application/json",
                                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                                    },
                                    body: JSON.stringify({
                                        order_id: orderId,
                                        transaction_status: result
                                            .transaction_status
                                    })
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        buttonEl.classList.remove('btn-danger');
                                        buttonEl.classList.add('btn-success');
                                        buttonEl.innerText = 'Lunas';
                                        buttonEl.disabled = true;
                                        alert('Pembayaran berhasil!');
                                    } else {
                                        alert('Pembayaran berhasil, tapi gagal update status: ' +
                                            data.message);
                                    }
                                });
                        },
                        onPending: function() {
                            alert("Menunggu pembayaran.");
                        },
                        onError: function() {
                            alert("Pembayaran gagal.");
                        },
                        onClose: function() {
                            alert(
                                "Kamu menutup popup sebelum menyelesaikan pembayaran.");
                        }
                    });
                });
            });
        });
    </script>






    @include('layoutsuser.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+3i5d5L5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5>
 </body>
</html>
