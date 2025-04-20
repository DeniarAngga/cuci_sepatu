@extends('layouts.adminlte')

@section('container')
    @include('sweetalert::alert')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Transaksi</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Data Transaksi</li>
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
                                <h3 class="card-title">Transaksi</h3>
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>Tanggal</th>
                                            <th>Nama</th>
                                            <th>Bank</th>
                                            {{-- <th>Nomor Rekening</th> --}}
                                            <th>Jumlah Bayar</th>
                                            <th>Status Transaksi</th>
                                            <th>Bukti Pembayaran</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transaksi as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ \Carbon\Carbon::parse($item->created_at)->locale('id')->diffForHumans() }}
                                                </td>
                                                <td>{{ $item->user->name ?? 'Nama Tidak Ditemukan' }}</td>
                                                <td>{{ $item->metodePembayaran->jenis_bayar ?? 'N/A' }}</td>
                                                <td>Rp {{ number_format($item->total_bayar, 0, ',', '.') }}</td>
                                                <td>
                                                    @if ($item->status_pembayaran === 'Pending')
                                                        <span class="badge badge-warning">Pending</span>
                                                    @elseif ($item->status_pembayaran === 'Lunas')
                                                        <span class="badge badge-success">Lunas</span>
                                                    @else
                                                        <span
                                                            class="badge badge-secondary">{{ $item->status_pembayaran }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->bukti_pembayaran)
                                                        <a href="#" data-toggle="modal"
                                                            data-target="#modalBukti{{ $item->id }}"
                                                            style="color: blue; text-decoration: underline;">
                                                            {{ $item->bukti_pembayaran }}
                                                        </a>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="modalBukti{{ $item->id }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="modalLabel{{ $item->id }}"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-body text-center">
                                                                        <img src="{{ asset('storage/uploads/bukti/' . $item->bukti_pembayaran) }}"
                                                                            alt="Bukti Pembayaran"
                                                                            class="img-fluid rounded">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @else
                                                        Tidak Ada
                                                    @endif
                                                </td>
                                                <td>
                                                    <!-- Tombol Centang -->
                                                    <button type="button" class="btn btn-success btn-approve"
                                                        data-id="{{ $item->id }}">
                                                        <i class="fas fa-check"></i>
                                                    </button>

                                                    <!-- Tombol Silang -->
                                                    <button type="button" class="btn btn-danger btn-delete"
                                                        data-id="{{ $item->id }}">
                                                        <i class="fas fa-times"></i>
                                                    </button>

                                                    <!-- Form Hidden untuk Submit -->
                                                    <form id="approve-form-{{ $item->id }}"
                                                        action="{{ route('transaksi.approve', $item->id) }}" method="POST"
                                                        style="display: none;">
                                                        @csrf
                                                    </form>
                                                    <form id="delete-form-{{ $item->id }}"
                                                        action="{{ route('transaksi.delete', $item->id) }}" method="POST"
                                                        style="display: none;">
                                                        @csrf
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                                <div class="d-flex justify-content-between" style="margin-top: 20px;">
                                    <span>Showing 1 to 8 of 8 entries</span>
                                    <nav>
                                        <ul class="pagination pagination-sm mb-0">
                                            <li class="page-item disabled"><a class="page-link" href="#">Previous</a>
                                            </li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </div>
    </div>
    </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Tombol Approve
        document.querySelectorAll('.btn-approve').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                Swal.fire({
                    title: 'Setujui Pembayaran?',
                    text: "Apakah Anda yakin ingin menyetujui pembayaran ini?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#28a745',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Setujui'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(`approve-form-${id}`).submit();
                    }
                });
            });
        });

        // Tombol Delete
        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                Swal.fire({
                    title: 'Hapus Transaksi?',
                    text: "Tindakan ini tidak bisa dibatalkan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Ya, Hapus'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(`delete-form-${id}`).submit();
                    }
                });
            });
        });
    </script>
@endsection
