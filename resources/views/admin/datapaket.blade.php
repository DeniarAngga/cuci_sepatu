@extends('layouts.adminlte')

@section('container')
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Paket</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Paket</li>
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
                <h3 class="card-title">Paket</h3>
              </div>
              <div class="card-body">
                <button class="btn btn-primary" data-toggle="modal" data-target="#addPaymentModal">Tambah Data</button>
                <table id="example2" class="table table-bordered table-hover mt-3">
                  <thead>
                    
                  <tr>
                    <th>NO</th>
                    <th>ID Paket</th>
                    <th>Jenis Layanan</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>1</td>
                    <td>001</td>
                    <td>Fast Cleaning</td>
                    <td>Treatment pencucian untuk membersihkan sepatu pada bagian upper dan midsole</td>
                    <td>20.000</td>
                    <td> </td>
                    <td>
                      <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</button>
                      <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
                    </td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>002</td>
                    <td>Deep Cleaning</td>
                    <td>Treatment pencucian untuk membersihkan sepatu pada bagian upper, midsole, outsole dan parfum</td>
                    <td>20.000</td>
                    <td> </td>
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
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
