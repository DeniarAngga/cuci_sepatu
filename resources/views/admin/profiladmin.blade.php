@extends('layouts.adminlte')

@section('container')

<div class="container-fluid">
    <div class="row justify-content-end"> <!-- Geser ke kanan -->
        <div class="col-md-8"> <!-- Ubah ukuran kolom agar lebih ke kanan -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Profil</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-4 text-end"> <!-- Foto di kanan -->
                                <img src="{{ asset('storage/profile/' . Auth::user()->photo) }}" 
                                     id="profilePreview" class="profile-img img-thumbnail mb-3">
                                <input type="file" name="photo" class="form-control mt-2" id="photoInput">
                            </div>

                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label class="form-label">Nama</label>
                                    <input type="text" name="name" class="form-control" 
                                           value="{{ old('name', Auth::user()->name) }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" 
                                           value="{{ old('email', Auth::user()->email) }}" readonly>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Password (Opsional)</label>
                                    <input type="password" name="password" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Konfirmasi Password</label>
                                    <input type="password" name="password_confirmation" class="form-control">
                                </div>

                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection