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
                            <li class="breadcrumb-item"><a href="{{ route('admin.laporanpenjualan') }}">Home</a></li>
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
                        <form action="" method="GET" class="row" id="filterForm">
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

                {{-- Cek ada "Belum bayar" --}}
                @php
                    $adaBelumBayar = $orders->contains(fn($order) => $order->status_transaksi === 'Belum bayar');
                @endphp

                {{-- Card Laporan Penjualan --}}
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title mb-0">Laporan Penjualan</h3>
                    </div>
                    <div class="card-body">

                        {{-- Tombol Cetak --}}
                        <button id="cetakPdfBtn" class="btn btn-success me-2 mb-3" {{ $adaBelumBayar ? 'disabled' : '' }}
                            title="{{ $adaBelumBayar ? 'Tidak bisa cetak PDF karena ada pesanan yang belum bayar' : 'Cetak laporan penjualan dalam format PDF' }}">
                            <i class="fas fa-file-pdf"></i> Cetak PDF
                        </button>

                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nomor Pesan</th>
                                    <th>Nama Pemesan</th>
                                    <th>Alamat Pesanan</th>
                                    <th>Pilihan Paket</th>
                                    <th>Tanggal Pesan</th>
                                    <th>Total Harga</th>
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
                                        <td>Rp {{ number_format($order->total ?? 0, 0, ',', '.') }}</td>
                                        <td>
                                            @if ($order->status_transaksi === 'Belum bayar')
                                                <span class="badge bg-danger">{{ $order->status_transaksi }}</span>
                                            @elseif ($order->status_transaksi === 'Lunas')
                                                <span class="badge bg-success">{{ $order->status_transaksi }}</span>
                                            @else
                                                <span class="badge bg-secondary">{{ $order->status_transaksi }}</span>
                                            @endif
                                        </td>
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

    {{-- Modal PDF --}}
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
                    <iframe id="pdfIframe" src="" width="100%" height="600px"></iframe>
                </div>
            </div>
        </div>
    </div>

    {{-- JS --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            // Validasi tanggal saat submit filter
            $('#filterForm').submit(function(e) {
                const tanggalMulai = $('#tanggal_mulai').val();
                const tanggalSelesai = $('#tanggal_selesai').val();
    
                if (tanggalMulai && tanggalSelesai && tanggalMulai > tanggalSelesai) {
                    e.preventDefault();
                    Swal.fire({
                        icon: 'error',
                        title: 'Tanggal tidak valid',
                        text: 'Tanggal mulai tidak boleh lebih besar dari tanggal selesai.',
                    });
                }
            });
    
            // Notifikasi sukses setelah filter ditampilkan (dari controller)
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    timer: 2000,
                    showConfirmButton: false
                });
            @endif
    
            // Inisialisasi Bootstrap 5 modal instance
            var pdfModal = new bootstrap.Modal(document.getElementById('pdfModal'));
    
            // Event klik tombol cetak PDF
            $('#cetakPdfBtn').click(function(e) {
                if ($(this).is(':disabled')) {
                    e.preventDefault();
                    Swal.fire({
                        icon: 'warning',
                        title: 'Tidak bisa cetak PDF',
                        text: 'Masih ada pesanan dengan status "Belum bayar". Silakan selesaikan terlebih dahulu.',
                    });
                    return;
                }
    
                var tanggalMulai = $('#tanggal_mulai').val();
                var tanggalSelesai = $('#tanggal_selesai').val();
    
                if (!tanggalMulai || !tanggalSelesai) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Tanggal kosong',
                        text: 'Harap masukkan tanggal mulai dan tanggal selesai.',
                    });
                    return;
                }
    
                if (tanggalMulai > tanggalSelesai) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Tanggal tidak valid',
                        text: 'Tanggal mulai tidak boleh lebih besar dari tanggal selesai.',
                    });
                    return;
                }
    
                e.preventDefault(); // cegah default klik reload halaman
    
                // AJAX request untuk generate PDF
                $.ajax({
                    url: '{{ route('laporan.penjualan.pdf') }}',
                    method: 'GET',
                    data: {
                        tanggal_mulai: tanggalMulai,
                        tanggal_selesai: tanggalSelesai
                    },
                    xhrFields: {
                        responseType: 'blob'
                    },
                    success: function(response) {
                        var blob = new Blob([response], { type: 'application/pdf' });
                        var url = URL.createObjectURL(blob);
                        $('#pdfIframe').attr('src', url);
                        pdfModal.show();
    
                        Swal.fire({
                            icon: 'success',
                            title: 'PDF Berhasil Dibuka',
                            text: 'File laporan PDF berhasil dimuat.',
                            timer: 2000,
                            showConfirmButton: false
                        });
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal Memuat PDF',
                            text: error
                        });
                    }
                });
            });
        });
    </script>    
@endsection
