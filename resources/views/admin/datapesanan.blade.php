@extends('layouts.adminlte')

@section('container')
    @include('sweetalert::alert')
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
                                                <td>Rp {{ number_format($order->total ?? 0, 0, ',', '.') }}</td>
                                                <!-- Form untuk update status -->
                                                <td class="text-center">
                                                    @if ($order->status_transaksi === 'Belum bayar')
                                                        <span class="badge bg-danger px-3 py-2">Belum bayar</span>
                                                    @elseif ($order->status_transaksi === 'Lunas')
                                                        <span class="badge bg-success px-3 py-2">Lunas</span>
                                                    @else
                                                        <span
                                                            class="badge bg-secondary px-3 py-2">{{ $order->status_transaksi }}</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <div class="d-flex justify-content-center align-items-center"
                                                        style="gap: 8px; flex-wrap: nowrap;">

                                                        {{-- Form Update Status (Gabung select + tombol check dalam satu form) --}}
                                                        <form action="{{ route('orders.updateStatus', $order->id) }}"
                                                            method="POST" class="d-inline d-flex" style="gap: 8px;">
                                                            @csrf

                                                            <select name="status_pesanan" class="form-select form-select-sm"
                                                                style="width: 180px;"
                                                                {{ $order->status_transaksi !== 'Lunas' ? 'disabled' : '' }}>
                                                                <option value="Dikonfirmasi & Sedang Atur Penjemputan"
                                                                    {{ $order->status_pesanan === 'Dikonfirmasi & Sedang Atur Penjemputan' ? 'selected' : '' }}>
                                                                    Dikonfirmasi & Atur Penjemputan
                                                                </option>
                                                                <option value="Sedang dijemput"
                                                                    {{ $order->status_pesanan === 'Sedang dijemput' ? 'selected' : '' }}>
                                                                    Sedang dijemput
                                                                </option>
                                                                <option value="Dalam Pengerjaan"
                                                                    {{ $order->status_pesanan === 'Dalam Pengerjaan' ? 'selected' : '' }}>
                                                                    Dalam Pengerjaan
                                                                </option>
                                                                <option value="Selesai"
                                                                    {{ $order->status_pesanan === 'Selesai' ? 'selected' : '' }}>
                                                                    Selesai
                                                                </option>
                                                            </select>

                                                            <button type="submit" class="btn btn-success btn-sm"
                                                                title="Perbarui Status"
                                                                {{ $order->status_transaksi !== 'Lunas' ? 'disabled' : '' }}>
                                                                <i class="fas fa-check"></i>
                                                            </button>
                                                        </form>

                                                        {{-- Tombol Delete --}}
                                                        <form action="{{ route('orders.delete', $order->id) }}"
                                                            method="POST" class="d-inline"
                                                            onsubmit="return confirm('Yakin ingin menghapus pesanan ini?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                title="Hapus">
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

    @if (session('status_updated'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('status_updated') }}',
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    @endif
@endsection
