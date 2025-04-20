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
                        <th>Tanggal Pesan</th>
                        <th>Harga Paket</th>
                        <th>Status Pesanan</th>
                        {{-- <th>Status Transaksi</th> --}}
                        <th>Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pesanan as $item)
                        <tr>
                            <td>{{ $item->no_pesanan }}</td>
                            <td>{{ $item->nama_lengkap }}</td> {{-- Nama Pemesan dari tabel orders --}}
                            <td>{{ $item->alamat }}</td> {{-- Alamat dari tabel orders --}}
                            <td>{{ $item->jenis_layanan }}</td> {{-- Jenis Layanan dari tabel orders --}}
                            <td>{{ \Carbon\Carbon::parse($item->tanggal_pesan)->locale('id')->translatedFormat('d F Y') }}
                            </td> {{-- Format tanggal --}}
                            <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td> {{-- Harga dari tabel layanan --}}
                            <td class="text-secondary">{{ $item->status_pesanan }}</td>
                            {{-- <td class="text-secondary">{{ $item->status_transaksi }}</td> --}}
                            <td>
                                @if ($item->status_transaksi === 'Lunas')
                                    <button class="btn btn-success" disabled>Lunas</button>
                                @elseif ($item->status_transaksi === 'Menunggu Konfirmasi')
                                    <button class="btn btn-warning" disabled>Menunggu Konfirmasi</button>
                                @else
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#formPembayaranModal" data-id="{{ $item->id }}"
                                        data-no="{{ $item->no_pesanan }}" data-layanan="{{ $item->jenis_layanan }}"
                                        data-harga="{{ $item->harga }}" onclick="openBayarModal(this)">
                                        Bayar Sekarang
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Form Pembayaran -->
    <div class="modal fade" id="formPembayaranModal" tabindex="-1" aria-labelledby="formPembayaranLabel"
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
                            <select class="form-select" id="metode_id" name="metode_id" onchange="updateMetodeInfo()">
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
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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



    @include('layoutsuser.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+3i5d5L5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5yD5e5p5>
 </body>
</html>
