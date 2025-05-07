@extends('layouts.adminlte')

@section('container')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Laporan Penjualan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Laporan Penjualan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">

                {{-- Filter Tanggal --}}
                <div class="card mb-3">
                    <div class="card-header">
                        <h3 class="card-title">Filter Tanggal</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="GET" class="row">
                            <div class="col-md-5">
                                <label for="tanggal_mulai">Dari Tanggal:</label>
                                <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control"
                                    value="{{ request('tanggal_mulai') }}">
                            </div>
                            <div class="col-md-5">
                                <label for="tanggal_selesai">Sampai Tanggal:</label>
                                <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control"
                                    value="{{ request('tanggal_selesai') }}">
                            </div>
                            <div class="col-md-2 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary btn-block">Tampilkan</button>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Card Laporan Penjualan --}}
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title mb-0">Laporan Penjualan</h3>
                    </div>
                    <div class="card-body">

                        {{-- Tombol Cetak --}}
                        <div class="mb-3">
                            <div class="mb-3">
                                <button id="cetakPdfBtn" class="btn btn-success me-2">
                                    <i class="fas fa-file-pdf"></i> Cetak PDF
                                </button>
                                {{-- <button onclick="window.print()" class="btn btn-primary">
                                    <i class="fas fa-print"></i> Print
                                </button> --}}
                            </div>
                        </div>

                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nomor Pesan</th>
                                    <th>Nama Pemesan</th>
                                    <th>Alamat Pesanan</th>
                                    <th>Pilihan Paket</th>
                                    <th>Tanggal Pesan</th>
                                    <th>Harga Paket</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->no_pesanan }}</td>
                                        <td>{{ $order->nama_lengkap }}</td>
                                        <td>{{ $order->alamat }}</td>
                                        <td>{{ $order->jenis_layanan }}</td>
                                        <td>{{ \Carbon\Carbon::parse($order->tanggal_pesan)->locale('id')->translatedFormat('d F Y') }}
                                        </td>
                                        <td>Rp {{ number_format($order->harga ?? 0, 0, ',', '.') }}</td>
                                        <td>Selesai</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{-- Pagination --}}
                        <div class="d-flex justify-content-between mt-3">
                            <span>Menampilkan {{ $orders->firstItem() }} sampai {{ $orders->lastItem() }} dari
                                {{ $orders->total() }} data</span>
                            {{ $orders->appends(request()->query())->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div id="pdfModal" class="modal fade" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pdfModalLabel">Laporan Penjualan PDF</h5>
                    <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Tempat untuk menampilkan PDF -->
                    <iframe id="pdfIframe" src="" width="100%" height="600px"></iframe>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript untuk menangani klik tombol Cetak PDF -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS (Pastikan ini ada, dan setelah jQuery jika pakai jQuery) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


    <script>
        $(document).ready(function() {
            $('#cetakPdfBtn').click(function() {
                var tanggalMulai = $('#tanggal_mulai').val();
                var tanggalSelesai = $('#tanggal_selesai').val();

                // Validasi input tanggal
                if (!tanggalMulai || !tanggalSelesai) {
                    alert("Harap masukkan tanggal mulai dan selesai.");
                    return;
                }

                $.ajax({
                    url: '{{ route('laporan.penjualan.pdf') }}',
                    method: 'GET',
                    data: {
                        tanggal_mulai: tanggalMulai,
                        tanggal_selesai: tanggalSelesai
                    },
                    xhrFields: {
                        responseType: 'blob' // <--- PENTING!
                    },
                    success: function(response) {
                        var blob = new Blob([response], {
                            type: 'application/pdf'
                        });
                        var url = URL.createObjectURL(blob);
                        $('#pdfIframe').attr('src', url);
                        $('#pdfModal').modal('show');
                    },
                    error: function(xhr, status, error) {
                        alert("Terjadi kesalahan saat memuat PDF: " + error);
                    }
                });
            });
        });
    </script>
@endsection
