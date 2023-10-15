<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-fw fa-solid fa-house-chimney-medical"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Prima Medika</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item <?= $this->uri->segment(2) == 'index' ? 'active' : '' ?>">
        <a href="<?= base_url('admin/index'); ?>" class="nav-link">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <li class="nav-item <?= $this->uri->segment(2) == 'data_pasien' ? 'active' : '' ?>">
        <a href="<?= base_url('admin/data_pasien'); ?>" class="nav-link">
            <i class="fas fa-fw fa-regular fa-hospital-user"></i>
            <span>Data Pasien</span>
        </a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <li class="nav-item <?= $this->uri->segment(2) == 'data_dokter' ? 'active' : '' ?>">
        <a href="<?= base_url('admin/data_dokter'); ?>" class="nav-link">
            <i class="fas fa-fw fa-sharp fa-solid fa-user-doctor"></i>
            <span>Data Dokter</span>
        </a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <li class="nav-item <?= $this->uri->segment(2) == 'data_poli' ? 'active' : '' ?>">
        <a href="<?= base_url('admin/data_poli'); ?>" class="nav-link">
            <i class="fas fa-fwf far fa-hospital"></i>
            <span>Data Poliklinik</span>
        </a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <li class="nav-item <?= $this->uri->segment(2) == 'data_jadwal_dokter' ? 'active' : '' ?>">
        <a href="<?= base_url('admin/data_jadwal_dokter'); ?>" class="nav-link">
            <i class="fas fa-fw fa-solid fa-calendar-days"></i>
            <span>Data Jadwal Dokter</span>
        </a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <li class="nav-item <?= $this->uri->segment(2) == 'data_janji_temu' ? 'active' : '' ?>">
        <a href="<?= base_url('admin/data_janji_temu'); ?>" class="nav-link">
            <i class="fas fa-fw fa-solid fa-calendar-check"></i>
            <span>Data Janji Temu</span>
        </a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <li class="nav-item <?= $this->uri->segment(2) == 'profile' ? 'active' : '' ?>">
        <a href="<?= base_url('admin/profile'); ?>" class="nav-link">
            <i class="fas fa-fw fa-user"></i>
            <span>Profile</span>
        </a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <!-- Logout -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
            <i class="fas fa-fw fa-right-from-bracket"></i>
            <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->