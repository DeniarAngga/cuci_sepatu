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
                    <th>Nomor</th>
                    <th>Nama Pesanan</th>
                    <th>Alamat Pesanan</th>
                    <th>Nomor Telepon</th>
                    <th>Paket</th>
                    <th>Jenis Sepatu</th>
                    <th>Tanggal Pesan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>1</td>
                    <td>Denskie</td>
                    <td>JL.K.H Wahid Hasyim NO.48</td>
                    <td>085725221479</td>
                    <td>Fast Cleaning</td>
                    <td>Canvas</td>
                    <td>1 Januari 2025</td>
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
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Grace</td>
                    <td>JL.Imam Bonjol NO.47</td>
                    <td>085725221111</td>
                    <td>Deep Cleaning</td>
                    <td>Canvas</td>
                    <td>2 Februari 2025</td>
                    <td>
                      <select class="form-control">
                        <option>Dalam pengerjaan</option>
                        <option>Sedang dijemput</option>
                        <option selected>Selesai</option>
                      </select>
                    </td>
                    <td>
                      <button class="btn btn-success"><i class="fas fa-check"></i></button>
                      <button class="btn btn-danger"><i class="fas fa-times"></i></button>
                    </td>
                  </tr>
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
