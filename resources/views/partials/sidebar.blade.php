<div class="sidebar">
    
  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

           <li class="nav-item">
              <a href="{{route('admin.dashboard')}}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
    
           
      <li class="nav-item">
        <a href="{{ route ('admin.transaksi') }}" class="nav-link">
          <i class="nav-icon fas fa-money-bill"></i>
          <p>
            Data Transaksi
          </p>
        </a>
      </li>


      <li class="nav-item {{ request()->routeIs('admin.datapelanggan') ? 'menu-open' : '' }}">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
                Pelanggan
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('admin.datapelanggan') }}" class="nav-link {{ request()->routeIs('admin.datapelanggan') ? 'active' : '' }}">
                    <p>Data Pelanggan</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="pages/forms/advanced.html" class="nav-link">
                    <p>Ratings dan Review</p>
                </a>
            </li>
        </ul>
    </li>
    
    <li class="nav-item {{ request()->routeIs('admin.datapaket') ? 'menu-open' : '' }}">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-clipboard"></i>
            <p>
                Master Data
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('admin.datapaket') }}" class="nav-link {{ request()->routeIs('admin.datapaket') ? 'active' : '' }}">
                    <p>Data Layanan</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.jenissepatu') }}" class="nav-link {{ request()->routeIs('admin.jenissepatu') ? 'active' : '' }}">
                    <p>Jenis Sepatu</p>
                </a>
            </li>
        </ul>
    </li>

    <li class="nav-item">
      <a href="{{ route ('admin.metodepembayaran') }}" class="nav-link">
        <i class="nav-icon fas fa-user"></i>
          <p>
              Metode Pembayaran
        </p>
      </a>
    </li>
    
    

    <li class="nav-item">
        <a href="{{ route ('admin.datapesanan') }}" class="nav-link">
          <i class="nav-icon fas fa-store"></i>
            <p>
                Data Pesanan
          </p>
        </a>
      </li>
        
                </a>
            </li>
                </a>
            </li>
        </ul>
    </li>

    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>