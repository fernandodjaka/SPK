<div class="d-flex flex-column flex-shrink-0 p-3 text-white sidebar-custom">
    <a class="sidebar-brand d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none" href="<?= base_url('/dashboard_admin'); ?>">
        <div class="sidebar-brand-icon">
            <img src="<?= base_url('assets/img/logodb.PNG'); ?>" alt="Logo" style="width: 50px; border-radius: 50%;">
        </div>
        <span class="fs-4 ms-2">Sistem Pendukung Keputusan</span>
    </a>

    <hr class="sidebar-divider">

    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item <?= (isset($page) && $page == 'Dashboard') ? 'active' : ''; ?>">
            <a class="nav-link text-white" href="<?= base_url('dashboard_admin'); ?>" style="background-color: <?= (isset($page) && $page == 'Dashboard') ? '#0056b3' : 'transparent'; ?>">
                <i class="fas fa-fw fa-home"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item <?= (isset($page) && $page == 'Kriteria') ? 'active' : ''; ?>">
            <a class="nav-link text-white" href="<?= base_url('list-kriteria'); ?>">
                <i class="fas fa-fw fa-cube"></i>
                <span>Data Kriteria</span>
            </a>
        </li>
        <li class="nav-item <?= (isset($page) && $page == 'Alternatif') ? 'active' : ''; ?>">
            <a class="nav-link text-white" href="<?= base_url('list-alternatif'); ?>">
                <i class="fas fa-fw fa-users"></i>
                <span>Data Alternatif</span>
            </a>
        </li>
        <li class="nav-item <?= (isset($page) && $page == 'Penilaian') ? 'active' : ''; ?>">
            <a class="nav-link text-white" href="<?= base_url('list-penilaian'); ?>">
                <i class="fas fa-fw fa-edit"></i>
                <span>Data Penilaian</span>
            </a>
        </li>
        <li class="nav-item <?= (isset($page) && $page == 'Perhitungan') ? 'active' : ''; ?>">
            <a class="nav-link text-white" href="<?= base_url('perhitungan'); ?>">
                <i class="fas fa-fw fa-calculator"></i>
                <span>Data Perhitungan</span>
            </a>
        </li>
        <li class="nav-item <?= (isset($page) && $page == 'Hasil') ? 'active' : ''; ?>">
            <a class="nav-link text-white" href="<?= base_url('hasil'); ?>">
                <i class="fas fa-fw fa-chart-bar"></i>
                <span>Data Hasil Akhir</span>
            </a>
        </li>
        <li class="nav-item <?= (isset($page) && $page == 'User') ? 'active' : ''; ?>">
            <a class="nav-link text-white" href="<?= base_url('user'); ?>">
                <i class="fas fa-fw fa-user"></i>
                <span>Data User</span>
            </a>
        </li>
    </ul>

    <hr class="sidebar-divider d-none d-md-block">

    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            User Options
        </button>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownMenuButton">
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
                <a class="dropdown-item" href="<?= base_url('logout'); ?>" onclick="return confirm('Apakah Anda yakin ingin logout?');">Sign out</a>
            </li>
        </ul>
    </div>

    <style>
        /* Sidebar Styling */
        .sidebar-custom {
            background-color: #1f536c; /* Dark teal */
            width: 280px;
            border-right: 2px solid #0056b3;
        }
        .sidebar-brand {
            font-size: 1.4rem;
            font-weight: bold;
            text-align: center;
        }
        .sidebar-divider {
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        }
        .nav-item .nav-link {
            padding: 10px 20px;
            display: flex;
            align-items: center;
            transition: background-color 0.3s;
        }
        .nav-item .nav-link i {
            margin-right: 10px;
        }
        .nav-item.active .nav-link {
            background-color: #0056b3;
            border-left: 4px solid #ffffff;
        }
        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.15);
        }
    </style>
</div>
