@extends('layouts.adminlte')

@section('container')

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
              <!-- /.card-header -->
              <div class="card-body">
                <button class="btn btn-primary" data-toggle="modal" data-target="#addPaymentModal">Tambah Data</button>
                <table id="example2" class="table table-bordered table-hover" style="margin-top: 20px">
                  <thead>
                  <tr>
                    <th>Nomor</th>
                    <th>Jenis Sepatu</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>1</td>
                    <td>Suede</td>
                    <td>
                      <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</button>
                      <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
                    </td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Canvas</td>
                    <td>
                      <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</button>
                      <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
                    </td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Leather</td>
                    <td>
                      <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</button>
                      <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
                    </td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Nubuck</td>
                    <td>
                      <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</button>
                      <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
                    </td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td>Mesh</td>
                    <td>
                      <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</button>
                      <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
                    </td>
                  </tr>
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
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
<!-- Modal Tambah Data -->
<div class="modal fade" id="addPaymentModal" tabindex="-1" aria-labelledby="addPaymentModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addPaymentModalLabel">Tambah Jenis Sepatu Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="paymentMethod">Jenis Sepatu</label>
            <input type="text" class="form-control" id="paymentMethod" placeholder="Masukkan jenis sepatu">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@endsection
