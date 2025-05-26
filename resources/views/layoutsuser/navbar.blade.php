<nav class="navbar navbar-expand-lg navbar-light custom-navbar">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('user/img/logo3.png') }}" alt="DENSHOES CLEANING" height="80" width="80"
                class="navbar-logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('welcome') }}">Home</a></li>
                {{-- <li class="nav-item"><a class="nav-link" href="{{ route('user.order') }}">Order</a></li> --}}
                <li class="nav-item"><a class="nav-link" href="{{ route('user.layanan') }}">Layanan</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('user.pesanan') }}">Pesanan</a></li>
                {{-- <li class="nav-item"><a class="nav-link" href="{{ route('user.riwayat') }}">Riwayat</a></li> --}}
                <li class="nav-item"><a class="nav-link" href="{{ route('user.review') }}">Review</a></li>
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('user.editprofil') }}">Lihat Profil</a>
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">Logout</button>
                            </form>
                        </div>
                    </li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
