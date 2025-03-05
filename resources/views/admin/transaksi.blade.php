@extends('layouts.adminlte')

@section('container')

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
                    <th>Nomor Rekening</th>
                    <th>Jumlah Bayar</th>
                    <th>Status Transaksi</th>
                    <th>Bukti Pembayaran</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>1</td>
                    <td>18 Menit yang lalu</td>
                    <td>Denskie</td>
                    <td>BRI</td>
                    <td>3411885</td>
                    <td>20.000</td>
                    <td><span class="badge badge-warning">Pending</span></td>
                    <td>foto.jpg</td>
                    <td>
                      <button class="btn btn-success"><i class="fas fa-check"></i></button>
                      <button class="btn btn-danger"><i class="fas fa-times"></i></button>
                    </td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>2 Februari 2025</td>
                    <td>Grace</td>
                    <td>BCA</td>
                    <td>3331885</td>
                    <td>20.000</td>
                    <td><span class="badge badge-success">Lunas</span></td>
                    <td>foto.jpg</td>
                    <td>
                      <button class="btn btn-success"><i class="fas fa-check"></i></button>
                      <button class="btn btn-danger"><i class="fas fa-times"></i></button>
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
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
