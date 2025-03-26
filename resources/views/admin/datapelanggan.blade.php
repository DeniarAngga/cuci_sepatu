@extends('layouts.adminlte')

@section('container')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Pelanggan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Pelanggan</li>
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
                <h3 class="card-title">Pelanggan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Nomor HandPhone</th>
                    <th>Alamat</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>Deniar Angga W</td>
                    <td>Denskie</td>
                    <td>denskie77@gmail.com</td>
                    <td>085725221479</td>
                    <td>Brebes</td>
                  </tr>
                  <tr>
                  
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
