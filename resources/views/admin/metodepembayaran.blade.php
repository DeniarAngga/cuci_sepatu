@extends('layouts.adminlte')

@section('container')
    @include('sweetalert::alert')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Pembayaran</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Data Pembayaran</li>
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
                                <h3 class="card-title">Metode Pembayaran</h3>
                            </div>
                            <div class="card-body">
                                <button class="btn btn-primary" data-toggle="modal"
                                    data-target="#tambahmetodepembayaran">Tambah
                                    Data</button>
                                <table id="example2" class="table table-bordered table-hover mt-3">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Nama</th>
                                            <th>Jenis Pembayaran</th>
                                            <th>Metode Pembayaran</th>
                                            <th>Nomor Rekening</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pembayaran as $index => $item)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->jenis_bayar }}</td>
                                                <td>{{ $item->metode_bayar }}</td>
                                                <td>{{ $item->nomor_rekening }}</td>

                                                <td style="white-space: nowrap;">
                                                    <button class="btn btn-warning btn-sm" data-toggle="modal"
                                                        data-target="#editModal{{ $item->id }}">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <form id="delete-form-{{ $item->id }}"
                                                        action="{{ route('metodepembayaran.destroy', $item->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                            onclick="hapusPembayaran({{ $item->id }})">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-between" style="margin-top: 20px;">
                                    <span>
                                        Showing {{ $pembayaran->firstItem() ?? 0 }} to {{ $pembayaran->lastItem() ?? 0 }}
                                        of
                                        {{ $pembayaran->total() }} entries
                                    </span>
                                    <nav>
                                        <ul class="pagination pagination-sm mb-0">
                                            {{-- Previous Page Link --}}
                                            @if ($pembayaran->onFirstPage())
                                                <li class="page-item disabled">
                                                    <span class="page-link">Previous</span>
                                                </li>
                                            @else
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $pembayaran->previousPageUrl() }}"
                                                        rel="prev">Previous</a>
                                                </li>
                                            @endif

                                            {{-- Pagination Elements --}}
                                            @foreach ($pembayaran->getUrlRange(1, $pembayaran->lastPage()) as $page => $url)
                                                @if ($page == $pembayaran->currentPage())
                                                    <li class="page-item active">
                                                        <span class="page-link">{{ $page }}</span>
                                                    </li>
                                                @else
                                                    <li class="page-item">
                                                        <a class="page-link"
                                                            href="{{ $url }}">{{ $page }}</a>
                                                    </li>
                                                @endif
                                            @endforeach

                                            {{-- Next Page Link --}}
                                            @if ($pembayaran->hasMorePages())
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $pembayaran->nextPageUrl() }}"
                                                        rel="next">Next</a>
                                                </li>
                                            @else
                                                <li class="page-item disabled">
                                                    <span class="page-link">Next</span>
                                                </li>
                                            @endif
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

    <div class="modal fade" id="tambahmetodepembayaran" tabindex="-1" aria-labelledby="tambahmetodepembayaran"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahmetodepembayaran">Tambah Metode Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('metodepembayaran.tambah') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                required value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <label for="jenis_bayar" class="mt-2">Jenis Pembayaran</label>
                            <input class="form-control @error('jenis_bayar') is-invalid @enderror" name="jenis_bayar"
                                required value="{{ old('jenis_bayar') }}">
                            @error('jenis_bayar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <label for="metode_bayar" class="mt-2">Metode Pembayaran</label>
                            <input class="form-control @error('metode_bayar') is-invalid @enderror" name="metode_bayar"
                                required value="{{ old('metode_bayar') }}">
                            @error('metode_bayar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <label for="nomor_rekening" class="mt-2">Nomor Rekening</label>
                            <input type="number" class="form-control @error('nomor_rekening') is-invalid @enderror"
                                name="nomor_rekening" required value="{{ old('nomor_rekening') }}">
                            @error('nomor_rekening')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @foreach ($pembayaran as $item)
        <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Metode Pembayaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('metodepembayaran.update', $item->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="modal-body">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="name" value="{{ $item->name }}">

                            <label>Jenis Pembayaran</label>
                            <input type="text" class="form-control" name="jenis-bayar"
                                value="{{ $item->jenis_bayar }}">

                            <label>Metode Pembayaran</label>
                            <input type="text" class="form-control" name="metode_bayar"
                                value="{{ $item->metode_bayar }}">

                            <label>Nomor Rekening</label>
                            <input type="number" class="form-control" name="nomor_rekening"
                                value="{{ $item->nomor_rekening }}">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function hapusPembayaran(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data ini akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>
@endsection
