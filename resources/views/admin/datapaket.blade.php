@extends('layouts.adminlte')

@section('container')
    @include('sweetalert::alert')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Layanan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Data Layanan</li>
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
                                <h3 class="card-title">Layanan</h3>
                            </div>
                            <div class="card-body">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#tambahpaket">Tambah
                                    Data</button>
                                <table id="example2" class="table table-bordered table-hover mt-3">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Jenis Layanan</th>
                                            <th>Deskripsi</th>
                                            <th>Harga</th>
                                            <th>Gambar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($layanan as $index => $item)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $item->jenis_layanan }}</td>
                                                <td>{{ $item->deskripsi }}</td>
                                                <td style="white-space: nowrap;">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                                                <td>
                                                    @if ($item->gambar)
                                                        <img src="{{ asset('uploads/layanan/' . $item->gambar) }}"
                                                            alt="Gambar Layanan" width="80">
                                                    @else
                                                        <span class="text-muted">Tidak ada gambar</span>
                                                    @endif
                                                </td>
                                                <td style="white-space: nowrap;">
                                                    <button class="btn btn-warning btn-sm" data-toggle="modal"
                                                        data-target="#editModal{{ $item->id }}">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <form id="delete-form-{{ $item->id }}"
                                                        action="{{ route('datapaket.destroy', $item->id) }}" method="POST"
                                                        style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                            onclick="hapusLayanan({{ $item->id }})">
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
                                        Showing {{ $layanan->firstItem() ?? 0 }} to {{ $layanan->lastItem() ?? 0 }} of
                                        {{ $layanan->total() }} entries
                                    </span>
                                    <nav>
                                        <ul class="pagination pagination-sm mb-0">
                                            {{-- Previous Page Link --}}
                                            @if ($layanan->onFirstPage())
                                                <li class="page-item disabled">
                                                    <span class="page-link">Previous</span>
                                                </li>
                                            @else
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $layanan->previousPageUrl() }}"
                                                        rel="prev">Previous</a>
                                                </li>
                                            @endif

                                            {{-- Pagination Elements --}}
                                            @foreach ($layanan->getUrlRange(1, $layanan->lastPage()) as $page => $url)
                                                @if ($page == $layanan->currentPage())
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
                                            @if ($layanan->hasMorePages())
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $layanan->nextPageUrl() }}"
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

    <div class="modal fade" id="tambahpaket" tabindex="-1" aria-labelledby="tambahpaket" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahpaket">Tambah Jenis Layanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('datapaket.tambah') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="jenis_layanan">Jenis Layanan</label>
                            <input type="text" class="form-control @error('jenis_layanan') is-invalid @enderror"
                                name="jenis_layanan" required value="{{ old('jenis_layanan') }}">
                            @error('jenis_layanan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <label for="deskripsi" class="mt-2">Deskripsi</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" required>{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <label for="harga" class="mt-2">Harga</label>
                            <input type="number" class="form-control @error('harga') is-invalid @enderror" name="harga"
                                required value="{{ old('harga') }}">
                            @error('harga')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <label for="gambar" class="mt-2">Upload Gambar</label>
                            <input type="file" class="form-control @error('gambar') is-invalid @enderror"
                                name="gambar" accept="image/*">
                            @error('gambar')
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

    @foreach ($layanan as $item)
        <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Layanan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('datapaket.update', $item->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="modal-body">
                            <label>Jenis Layanan</label>
                            <input type="text" class="form-control" name="jenis_layanan"
                                value="{{ $item->jenis_layanan }}">

                            <label>Deskripsi</label>
                            <textarea class="form-control" name="deskripsi">{{ $item->deskripsi }}</textarea>

                            <label>Harga</label>
                            <input type="text" class="form-control" name="harga" value="{{ $item->harga }}">

                            <label>Gambar</label>
                            <input type="file" class="form-control" name="gambar">
                            @if ($item->gambar)
                                <img src="{{ asset('uploads/layanan/' . $item->gambar) }}" alt="Gambar Layanan"
                                    width="80">
                            @endif
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
        function hapusLayanan(id) {
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
