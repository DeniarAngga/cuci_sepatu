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
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Nomor Pesan</th>
                    <th>Nama Pemesan</th>
                    <th>Alamat Pesanan</th>
                    <th>Pilhan Paket</th>
                    <th>Tanggal Pesan</th>
                    <th>Harga Paket</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>1</td>
                    <td>Deniar Angga Widianto</td>
                    <td>Brebes City</td>
                    <td>FAST CLEANING</td>
                    <td>25 Maret 2025</td>
                    <td>25.000</td>
                    <td>
                      <select class="form-control">
                        <option>Dalam pengerjaan</option>
                        <option>Sedang dijemput</option>
                        <option>Selesai</option>
                      </select>
                    </td>
                    <td>
                      <button class="btn btn-success"><i class="fas fa-check"></i></button>
                      <button class="btn btn-danger"><i class="fas fa-times"></i></button>
                    </td>
                 
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
