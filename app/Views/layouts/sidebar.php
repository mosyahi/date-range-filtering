<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SI Akademik</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= ($active == 'dashboard' ? 'active' : '') ?>">
        <a class="nav-link" href="<?= base_url('/') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - Charts -->
        <li class="nav-item <?= ($active == 'siswa' ? 'active' : '') ?>">
            <a class="nav-link" href="<?= base_url('data-siswa') ?>">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Data Siswa</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item <?= ($active == 'matpel' ? 'active' : '') ?>">
                <a class="nav-link" href="<?= base_url('data-matpel') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Mata Pelajaran</span></a>
                </li>

                <li class="nav-item <?= ($active == 'peserta' ? 'active' : '') ?>">
                    <a class="nav-link" href="<?= base_url('data-peserta') ?>">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Data Peserta</span></a>
                    </li>

                    <li class="nav-item <?= ($active == 'ujian' ? 'active' : '') ?>">
                        <a class="nav-link" href="<?= base_url('data-ujian') ?>">
                            <i class="fas fa-fw fa-table"></i>
                            <span>Data Ujian</span></a>
                        </li>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <li class="nav-item <?= ($active == 'fibo-1' ? 'active' : '') ?>">
                            <a class="nav-link" href="<?= base_url('fibonacci') ?>">
                                <i class="fas fa-fw fa-table"></i>
                                <span>Tampil Deret Fibonacci</span></a>
                            </li>

                            <!-- Divider -->
                            <hr class="sidebar-divider d-none d-md-block">

                            <!-- Sidebar Toggler (Sidebar) -->
                            <div class="text-center d-none d-md-inline">
                                <button class="rounded-circle border-0" id="sidebarToggle"></button>
                            </div>

                        </ul>