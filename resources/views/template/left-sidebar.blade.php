<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
            <i class="fas fa-book"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Perpus<sup>net</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>


    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item ">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Halaman</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Daftar Halaman:</h6>
                <a class="collapse-item" href="{{ route('halaman-buku') }}">Data Buku</a>
                <a class="collapse-item" href="register.html">Data anggota</a>
                <a class="collapse-item mb-1" href="forgot-password.html">Data Petugas</a>
                <div class="dropright">
                    <a class="dropdown-toggle collapse-item" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" href="#"
                        style="text-decoration: none; margin-left: 10px; color: black">Pengarang</a>
                    <div class="dropdown-menu">
                        <a class="collapse-item" href="{{ route('halaman-pengarang') }}">Data Pengarang</a>
                        <a class="collapse-item" href="{{ route('halaman-karya-pengarang') }}">Data Karya Pengarang</a>
                    </div>
                </div>
                <a class="collapse-item mt-1" href="{{ route('halaman-penerbit') }}">Data Penerbit</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-arrow-right"></i>
            <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
