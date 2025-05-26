<footer class="footer">
    <div class="container">
        <div class="row align-items-center">
            <!-- Gambar di sisi kiri -->
            <div class="col-md-3 text-center mb-4 mb-md-0">
                <img src="{{ asset('user/img/logo3.png') }}" alt="Denshoes Logo" class="footer-logo">
            </div>

            <!-- ABOUT US -->
            <div class="col-md-3">
                <h5>ABOUT US</h5>
                <p>
                    Denshoes merupakan usaha yang bergerak dibidang jasa cuci sepatu berkualitas yang berasal dari kota
                    Tegal. Berbagai layanan seperti pencucian dan pewarnaan ulang pada sepatu.
                </p>
            </div>

            <!-- NAVIGASI -->
            <div class="col-md-3">
                <h5>NAVIGASI</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('welcome') }}">Home</a></li>
                    <li><a href="{{ route('user.order') }}">Order</a></li>
                    <li><a href="{{ route('user.layanan') }}">Layanan</a></li>
                    <li><a href="{{ route('user.pesanan') }}">Pesanan</a></li>
                    <li><a href="{{ route('user.riwayat') }}">Riwayat</a></li>
                    <li><a href="{{ route('user.review') }}">Review</a></li>
                </ul>
            </div>

            <!-- CONTACT -->
            <div class="col-md-3">
                <h5>CONTACT</h5>
                <p><i class="fas fa-phone"></i> WhatsApp: 08XXXXXXXXXX, 08XXXXXXXXXX</p>
                <p><i class="fas fa-map-marker-alt"></i> JL. Dewi Sartika, Pesurungan Kidul, Tegal Barat, Kota Tegal</p>
            </div>
        </div>
    </div>
</footer>
