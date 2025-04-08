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
                            <div class="card-header">
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
                                                <td>Rp {{ number_format($order->layanan->harga ?? 0, 0, ',', '.') }}</td>
                                                <td>
                                                    <select class="form-control">
                                                        <option>Dalam pengerjaan</option>
                                                        <option>Sedang dijemput</option>
                                                        <option>Selesai</option>
                                                    </select>
                                                </td>
                                                <td class="text-center">
                                                    <div class="d-flex justify-content-between">
                                                        <button class="btn btn-success"><i
                                                                class="fas fa-check"></i></button>
                                                        <button class="btn btn-danger"><i class="fas fa-times"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div class="d-flex justify-content-between mt-3">
                                    <span>Showing {{ $orders->firstItem() }} to {{ $orders->lastItem() }} of
                                        {{ $orders->total() }} entries</span>
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
