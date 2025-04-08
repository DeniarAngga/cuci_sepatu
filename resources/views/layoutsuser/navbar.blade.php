<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">
            <strong>DENSHOES CLEANING</strong>
        </a>
        <button aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"
            data-bs-target="#navbarNav" data-bs-toggle="collapse" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('welcome') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.order') }}">Order</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.layanan') }}">Layanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.pesanan') }}">Pesanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.riwayat') }}">Riwayat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.review') }}">Review</a>
                </li>

                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        {{-- <a class="nav-link dropdown-toggle" href="" id="profileDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        </a> --}}
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('user.editprofil') }}">Lihat Profil</a>

                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">Logout</button>
                            </form>
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
