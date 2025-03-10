@extends('layouts.adminlte')

@section('container')

<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .profile-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h4>Edit Profil</h4>
            </div>
            <div class="card-body">
                <form action="update-profile.php" method="POST" enctype="multipart/form-data">
                    
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <img src="user/img/FOTO.jpg" id="profilePreview" class="profile-img img-thumbnail mb-3">
                            <input type="file" name="photo" class="form-control" id="photoInput">
                        </div>

                        <div class="col-md-8">
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" name="name" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control">
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

    <script>
        document.getElementById('photoInput').addEventListener('change', function(event) {
            const reader = new FileReader();
            reader.onload = function(){
                document.getElementById('profilePreview').src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        });
    </script>
</body>
</html>

@endsection