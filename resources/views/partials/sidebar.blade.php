<div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <!-- Dashboard -->
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}"
                    class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>

            <!-- Data Transaksi -->
            <li class="nav-item">
                <a href="{{ route('admin.transaksi') }}"
                    class="nav-link {{ request()->routeIs('admin.transaksi') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-money-bill"></i>
                    <p>Data Transaksi</p>
                </a>
            </li>

            <!-- Data Pesanan -->
            <li class="nav-item">
                <a href="{{ route('admin.datapesanan') }}"
                    class="nav-link {{ request()->routeIs('admin.datapesanan') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-store"></i>
                    <p>Data Pesanan</p>
                </a>
            </li>

            <!-- Laporan Penjualan -->
            <li class="nav-item">
                <a href="{{ route('admin.laporanpenjualan') }}"
                    class="nav-link {{ request()->routeIs('admin.laporanpenjualan') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-print"></i>
                    <p>Laporan Penjualan</p>
                </a>
            </li>

            <!-- Pelanggan Treeview -->
            <li class="nav-item {{ request()->routeIs('admin.datapelanggan') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ request()->routeIs('admin.datapelanggan') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Pelanggan
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.datapelanggan') }}"
                            class="nav-link {{ request()->routeIs('admin.datapelanggan') ? 'active' : '' }}">
                            <p>Data Pelanggan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.review') }}" class="nav-link">
                            <p>Ratings dan Review</p>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Master Data Treeview -->
            <li class="nav-item {{ request()->routeIs('admin.datapaket', 'admin.jenissepatu') ? 'menu-open' : '' }}">
                <a href="#"
                    class="nav-link {{ request()->routeIs('admin.datapaket', 'admin.jenissepatu') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-clipboard"></i>
                    <p>
                        Master Data
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.datapaket') }}"
                            class="nav-link {{ request()->routeIs('admin.datapaket') ? 'active' : '' }}">
                            <p>Data Layanan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.jenissepatu') }}"
                            class="nav-link {{ request()->routeIs('admin.jenissepatu') ? 'active' : '' }}">
                            <p>Jenis Sepatu</p>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Metode Pembayaran -->
            <li class="nav-item">
                <a href="{{ route('admin.metodepembayaran') }}"
                    class="nav-link {{ request()->routeIs('admin.metodepembayaran') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-credit-card"></i>
                    <p>Metode Pembayaran</p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
