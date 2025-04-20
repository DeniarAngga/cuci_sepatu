@extends('layouts.adminlte')

@section('container')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Pesanan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Data Pesanan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex align-items-center">
                                <h3 class="card-title">Data Pesanan</h3>
                                {{-- <div class="form-group mb-0 ml-auto" style="width: 200px;">
                                    <select class="form-control" id="filterLayanan">
                                        <option value="">-- Pilih Jenis Layanan --</option>
                                        <option value="utama">Utama</option>
                                        <option value="pickup">Pickup Services</option>
                                    </select>
                                </div> --}}
                            </div>
                            <div class="card-body">
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
                                            <th>Aksi</th>
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

                                                <!-- Form untuk update status -->
                                                <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST"
                                                    class="d-flex align-items-center">
                                                    @csrf
                                                    <td>
                                                        <select class="form-control" name="status_pesanan" required>
                                                            <option value="Dalam pengerjaan"
                                                                {{ $order->status_pesanan === 'Dalam pengerjaan' ? 'selected' : '' }}>
                                                                Dalam pengerjaan</option>
                                                            <option value="Sedang dijemput"
                                                                {{ $order->status_pesanan === 'Sedang dijemput' ? 'selected' : '' }}>
                                                                Sedang dijemput</option>
                                                            <option value="Selesai"
                                                                {{ $order->status_pesanan === 'Selesai' ? 'selected' : '' }}>
                                                                Selesai</option>
                                                        </select>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="d-flex justify-content-between">
                                                            <button type="submit" class="btn btn-success"><i
                                                                    class="fas fa-check"></i></button>
                                                </form>
                                                <!-- Tombol delete (opsional) -->
                                                <form action="{{ route('orders.delete', $order->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger"
                                                        onclick="return confirm('Yakin ingin menghapus pesanan ini?')">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </form>
                            </div>
                            </td>
                            </tr>
                            @endforeach
                            </tbody>
                            </table>

                            <div class="d-flex justify-content-between mt-3">
                                <span>Menampilkan {{ $orders->firstItem() }} sampai {{ $orders->lastItem() }} dari
                                    {{ $orders->total() }} data</span>
                                {{ $orders->links('pagination::bootstrap-4') }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>
@endsection

@push('scripts')
    <script>
        document.getElementById('filterLayanan').addEventListener('change', function() {
            const selectedValue = this.value;
            // Tambahkan logika filter jika dibutuhkan
            console.log('Jenis layanan yang dipilih:', selectedValue);
        });
    </script>
@endpush
