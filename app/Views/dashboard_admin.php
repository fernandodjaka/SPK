<?php
// Check if the user is logged in
if (!session()->get('isLoggedIn')) {
    return redirect()->to('/login');
}

$user_role = session()->get('role'); // Retrieve the user role from session
?>

<!-- Include Header -->
<?php echo view('layout/header_admin'); ?>

<div id="wrapper" class="d-flex">
    <!-- Sidebar -->
    <div id="sidebar">
        <?php echo view('layout/sidebar_admin'); ?>
    </div>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="flex-grow-1">
        <div id="content">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800" style="color: black;">
        <i class="fas fa-fw fa-home"></i> Dashboard Admin
    </h1>
</div>


                <!-- Content for Admin Role -->
                <?php if ($user_role == 'A'): ?>
                    <div class="alert alert-success text-center" style="background-color: #add8e6;">
    <marquee scrollamount="5" style="color: black;">
        Selamat datang <span class="text-uppercase"><b><?php echo session()->get('username'); ?>!</b></span> Anda bisa mengoperasikan sistem dengan wewenang tertentu melalui pilihan menu di bawah. Semoga Hari Mu Selalu Bahagia :).
    </marquee>
</div>


                    <div class="row">
                        <!-- Card for Data Kriteria -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2 transition-effect">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <a href="<?= base_url('list-kriteria') ?>" class="text-secondary text-decoration-none">Data Kriteria</a>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-cube fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card for Data Alternatif -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2 transition-effect">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <a href="<?= base_url('list-alternatif') ?>" class="text-secondary text-decoration-none">Data Alternatif</a>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card for Data Penilaian -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2 transition-effect">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <a href="<?= base_url('list-penilaian') ?>" class="text-secondary text-decoration-none">Data Penilaian</a>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-edit fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card for Data Perhitungan -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2 transition-effect">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <a href="<?= base_url('perhitungan') ?>" class="text-secondary text-decoration-none">Data Perhitungan</a>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calculator fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card for Data Hasil Akhir -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2 transition-effect">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <a href="<?= base_url('hasil') ?>" class="text-secondary text-decoration-none">Data Hasil Akhir</a>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-chart-area fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/js/sb-admin-2.min.js') ?>"></script>

    <style>
        .transition-effect {
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .transition-effect:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        #content {
            background: #f8f9fc;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #4e73df; /* Example color for the heading */
        }
    </style>
</body>
</html>
