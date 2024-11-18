<?php
// Check if the user is logged in
if (!session()->get('isLoggedIn')) {
    return redirect()->to('/login');
}

$user_role = session()->get('role'); // Retrieve the user role from session
?>

<!-- Include Header -->
<?php echo view('layout/header_user'); ?>

<div id="wrapper" class="d-flex">
    <!-- Sidebar -->
    <div id="sidebar">
        <?php echo view('layout/sidebar_user'); ?>
    </div>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="flex-grow-1">
        <div id="content">

            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-home"></i> Dashboard User</h1>
                </div>

                <!-- Content for User Role -->
                <?php if ($user_role == 'B'): ?>
                    <div class="alert alert-success">
                        <marquee scrollamount="5">Selamat datang <span class="text-uppercase"><b><?php echo session()->get('username'); ?>!</b></span> Anda dapat melihat informasi yang relevan di bawah ini. Semoga Hari Mu Selalu Bahagia :).</marquee>
                    </div>

                    <div class="row">
                        <!-- Card for Data Hasil Akhir -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <a href="<?= base_url('hasil_akhir') ?>" class="text-secondary text-decoration-none">Data Hasil Akhir</a>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-chart-area fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card for Data Profile -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <a href="<?= base_url('profile') ?>" class="text-secondary text-decoration-none">Data Profile</a>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card for other relevant information can be added here -->
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Include Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/js/sb-admin-2.min.js') ?>"></script>
</body>
</html>
