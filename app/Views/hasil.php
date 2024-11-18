<?php
// Cek jika user sudah login dan perannya admin
if (!session()->get('isLoggedIn') || session()->get('role') != 'A') {
    return redirect()->to('/login');
}

// Termasuk Header
echo view('layout/header_admin');
?>

<div id="wrapper" class="d-flex">
    <!-- Sidebar -->
    <div id="sidebar">
        <?= view('layout/sidebar_admin'); ?>
    </div>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="flex-grow-1">
        <div id="content">
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-chart-area"></i> Data Hasil Akhir</h1>
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle my-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-print mr-2"></i>	Cetak Data
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="<?= base_url('cetak') ?>" target="_blank" class="dropdown-item">Semua Data</a>
                            <a href="<?= base_url('cetak_lima_besar') ?>" target="_blank" class="dropdown-item">Data 5 Besar</a>
                        </div>
                    </div>
                </div>

                <?php if (session()->getFlashdata('errors')) : ?>
                    <div class="alert alert-danger">
                        <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                            <?= esc($error); ?><br>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-success">
                        <?= esc(session()->getFlashdata('success')); ?>
                    </div>
                <?php endif; ?>

                <div class="card shadow mb-4">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-info">Data Hasil Akhir</h6>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#all" role="tab" aria-controls="pills-home" aria-selected="true">Semua Data</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#lima_besar" role="tab" aria-controls="pills-profile" aria-selected="false">Data Hasil 5 Besar</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="pills-home-tab">
                                <div class="accordion" id="accordionExample">
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    Data Laki - Laki
                                                </button>
                                            </h2>
                                        </div>

                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered" width="100%" cellspacing="0">
                                                        <thead class="bg-info text-white">
                                                            <tr align="center">
                                                                <th>Nama Alternatif</th>
                                                                <th>Nilai Yi</th>
                                                                <th width="15%">Rank</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $no = 0; ?>
                                                            <?php foreach ($laki_laki as $data): ?>
                                                                <tr align="center">
                                                                    <td align="left"><?= esc($data['nama']) ?></td>
                                                                    <td><?= esc($data['nilai']) ?></td>
                                                                    <td><?= ++$no; ?></td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingTwo">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    Data Perempuan
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered" width="100%" cellspacing="0">
                                                        <thead class="bg-info text-white">
                                                            <tr align="center">
                                                                <th>Nama Alternatif</th>
                                                                <th>Nilai Yi</th>
                                                                <th width="15%">Rank</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $no = 0; ?>
                                                            <?php foreach ($perempuan as $data): ?>
                                                                <tr align="center">
                                                                    <td align="left"><?= esc($data['nama']) ?></td>
                                                                    <td><?= esc($data['nilai']) ?></td>
                                                                    <td><?= ++$no; ?></td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="lima_besar" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <div class="accordion" id="accordionExample">
                                    <div class="card">
                                        <div class="card-header" id="headingThree">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                                    Data Laki - Laki (5 Besar)
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered" width="100%" cellspacing="0">
                                                        <thead class="bg-info text-white">
                                                            <tr align="center">
                                                                <th>Nama Alternatif</th>
                                                                <th>Nilai Yi</th>
                                                                <th width="15%">Rank</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $no = 0; ?>
                                                            <?php foreach ($laki_laki as $data): ?>
                                                                <?php if ($no < 5): ?>
                                                                    <tr align="center">
                                                                        <td align="left"><?= esc($data['nama']) ?></td>
                                                                        <td><?= esc($data['nilai']) ?></td>
                                                                        <td><?= ++$no; ?></td>
                                                                    </tr>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingFour">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                    Data Perempuan (5 Besar)
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered" width="100%" cellspacing="0">
                                                        <thead class="bg-info text-white">
                                                            <tr align="center">
                                                                <th>Nama Alternatif</th>
                                                                <th>Nilai Yi</th>
                                                                <th width="15%">Rank</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $no = 0; ?>
                                                            <?php foreach ($perempuan as $data): ?>
                                                                <?php if ($no < 5): ?>
                                                                    <tr align="center">
                                                                        <td align="left"><?= esc($data['nama']) ?></td>
                                                                        <td><?= esc($data['nilai']) ?></td>
                                                                        <td><?= ++$no; ?></td>
                                                                    </tr>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
