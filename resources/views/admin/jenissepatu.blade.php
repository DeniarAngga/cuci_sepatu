@extends('layouts.adminlte')

@section('container')
    @include('sweetalert::alert')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Jenis Sepatu</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Jenis Sepatu</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Jenis Sepatu</h3>
                            </div>
                            <div class="card-body">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#tambahJenisSepatu">Tambah
                                    Data</button>
                                <table id="example2" class="table table-bordered table-hover" style="margin-top: 20px">
                                    <thead>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>Jenis Sepatu</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jenis_sepatu as $index => $item)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $item->jenis_sepatu }}</td>
                                                <td>
                                                    <button class="btn btn-warning btn-sm" data-toggle="modal"
                                                        data-target="#editModal{{ $item->id }}">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <form id="delete-form-{{ $item->id }}"
                                                        action="{{ route('jenissepatu.destroy', $item->id) }}"
                                                        method="POST" style="display:inline;">
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
                                        Showing {{ $jenis_sepatu->firstItem() ?? 0 }} to
                                        {{ $jenis_sepatu->lastItem() ?? 0 }} of
                                        {{ $jenis_sepatu->total() }} entries
                                    </span>
                                    <nav>
                                        <ul class="pagination pagination-sm mb-0">
                                            {{-- Previous Page Link --}}
                                            @if ($jenis_sepatu->onFirstPage())
                                                <li class="page-item disabled">
                                                    <span class="page-link">Previous</span>
                                                </li>
                                            @else
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $jenis_sepatu->previousPageUrl() }}"
                                                        rel="prev">Previous</a>
                                                </li>
                                            @endif

                                            {{-- Pagination Elements --}}
                                            @foreach ($jenis_sepatu->getUrlRange(1, $jenis_sepatu->lastPage()) as $page => $url)
                                                @if ($page == $jenis_sepatu->currentPage())
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
                                            @if ($jenis_sepatu->hasMorePages())
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $jenis_sepatu->nextPageUrl() }}"
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
        </section>
    </div>

    <!-- Modal Tambah Data -->
    <div class="modal fade" id="tambahJenisSepatu" tabindex="-1">
        <div class="modal-dialog">
            <form action="{{ route('jenissepatu.tambah') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>Tambah Jenis Sepatu</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="jenisSepatu">Jenis Sepatu</label>
                            <input type="text" class="form-control" id="jenisSepatu" name="jenis_sepatu"
                                placeholder="Masukkan Jenis Sepatu" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit -->
    @foreach ($jenis_sepatu as $item)
        <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1">
            <div class="modal-dialog">
                <form action="{{ route('jenissepatu.update', $item->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5>Edit Jenis Sepatu</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="jenisSepatu{{ $item->id }}">Jenis Sepatu</label>
                                <input type="text" name="jenis_sepatu" value="{{ $item->jenis_sepatu }}"
                                    id="jenisSepatu{{ $item->id }}" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
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
