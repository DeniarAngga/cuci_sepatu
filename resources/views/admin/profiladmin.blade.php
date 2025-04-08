@extends('layouts.adminlte')

@section('container')
    <div class="content-wrapper mt-4 mb-3">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header text-center bg-primary text-white">
                                <h3 class="card-title">Profil Admin</h3>
                            </div>

                            <!-- Card Body -->
                            <div class="card-body">
                                <!-- Pesan Berhasil -->
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <form action="{{ route('profile.admin.update') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <!-- Preview Foto Profil -->
                                    <div class="text-center mb-4">
                                        <img src="{{ asset('uploads/admin/' . (session('admin')->photo ?? 'FOTO.jpg')) }}"
                                            id="profilePreview" class="profile-img img-thumbnail mb-2"
                                            style="max-width: 150px; height: 150px; border-radius: 50%;">
                                        <input type="file" name="photo" class="form-control mt-2" id="photoInput">
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- Nama -->
                                            <div class="mb-3">
                                                <label class="form-label">Nama</label>
                                                <input type="text" name="name" class="form-control"
                                                    value="{{ old('name', session('admin')->name ?? '') }}">
                                            </div>

                                            <!-- Username -->
                                            <div class="mb-3">
                                                <label class="form-label">Username</label>
                                                <input type="text" name="username" class="form-control"
                                                    value="{{ old('username', session('admin')->username ?? '') }}"
                                                    readonly>
                                            </div>

                                            <!-- Password -->
                                            <div class="mb-3">
                                                <label class="form-label">Password (Opsional)</label>
                                                <input type="password" name="password" class="form-control">
                                            </div>

                                            <!-- Konfirmasi Password -->
                                            <div class="mb-3">
                                                <label class="form-label">Konfirmasi Password</label>
                                                <input type="password" name="password_confirmation" class="form-control">
                                            </div>

                                            <!-- Tombol Simpan -->
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Batal</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Auto-Dismiss Flash Message -->
    <script>
        setTimeout(function() {
            document.querySelector('.alert').style.display = 'none';
        }, 2000);
    </script>
@endsection
