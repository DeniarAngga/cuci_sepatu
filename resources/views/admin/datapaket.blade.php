@extends('layouts.adminlte')

@section('container')
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
                <button class="btn btn-primary" data-toggle="modal" data-target="#tambahpaket">Tambah Data</button>
                <table id="example2" class="table table-bordered table-hover mt-3">
                  <thead>
                      <tr>
                          <th>NO</th>
                          <th>Jenis Layanan</th>
                          <th>Deskripsi</th>
                          <th>Harga</th>
                          <th>Foto</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($layanan as $index => $item)
                      <tr>
                          <td>{{ $index + 1 }}</td>
                          <td>{{ $item->jenis_layanan }}</td>
                          <td>{{ $item->deskripsi }}</td>
                          <td>{{ $item->harga }}</td>
                          <td>
                              @if ($item->gambar)
                                  <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar Layanan" width="80">
                              @else
                                  <span class="text-muted">Tidak ada gambar</span>
                              @endif
                          </td>
                          <td>
                              <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal{{ $item->id }}">
                                  <i class="fas fa-edit"></i>
                              </button>
                              <form action="{{ route('admin.datapaket.destroy', $item->id) }}" method="POST" style="display:inline;">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus layanan ini?')">
                                      <i class="fas fa-trash"></i>
                                  </button>
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
                          <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
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
            <form action="{{ route('admin.datapaket.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="jenis_layanan">Jenis Layanan</label>
                <input type="text" class="form-control" name="jenis_layanan" required>
            
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" name="deskripsi" required></textarea>
            
                <label for="harga">Harga</label>
                <input type="text" class="form-control" name="harga" required>
            
                <label for="gambar">Upload Gambar</label>
                <input type="file" class="form-control" name="gambar">
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
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <label>Jenis Layanan</label>
                    <input type="text" class="form-control" name="jenis_layanan" value="{{ $item->jenis_layanan }}">

                    <label>Deskripsi</label>
                    <textarea class="form-control" name="deskripsi">{{ $item->deskripsi }}</textarea>

                    <label>Harga</label>
                    <input type="text" class="form-control" name="harga" value="{{ $item->harga }}">

                    <label>Gambar</label>
                    <input type="file" class="form-control" name="gambar">
                    @if ($item->gambar)
                        <img src="{{ asset('storage/' . $item->gambar) }}" width="80">
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
        })
    }
</script>


@endsection
