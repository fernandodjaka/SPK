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
                    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-calculator"></i> Hasil Perhitungan</h1>
                </div>

                <!-- Tampilkan Pesan Sukses -->
                <?php if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-info"><?= session()->getFlashdata('success'); ?></div>
                <?php endif; ?>

                <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="matrix-keputusan-tab" data-toggle="tab" href="#matrix-keputusan" role="tab">Matriks Keputusan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="matrix-ternormalisasi-tab" data-toggle="tab" href="#matrix-ternormalisasi" role="tab">Matriks Ternormalisasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="matrix-normalisasi-terbobot-tab" data-toggle="tab" href="#matrix-normalisasi-terbobot" role="tab">Matriks Normalisasi Terbobot</a>
                    </li>
                </ul>

                <div class="tab-content" id="pills-tabContent">
                    <!-- Tab Matriks Keputusan -->
                    <div class="tab-pane fade show active" id="matrix-keputusan" role="tabpanel">
                        <h3>Matriks Keputusan</h3>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Alternatif</th>
                                    <?php foreach ($kriterias as $kriteria): ?>
                                        <th><?= esc($kriteria['kode_kriteria']) ?></th>
                                    <?php endforeach; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($alternatifs as $index => $alternatif): ?>
                                    <tr>
                                        <td><?= $index + 1 ?></td>
                                        <td><?= esc($alternatif['nama']) ?></td>
                                        <?php foreach ($kriterias as $kriteria): ?>
                                            <td><?= esc($matriksX[$kriteria['id_kriteria']][$alternatif['id_alternatif']] ?? 0) ?></td>
                                        <?php endforeach; ?>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Tab Matriks Ternormalisasi -->
                    <div class="tab-pane fade" id="matrix-ternormalisasi" role="tabpanel">
                        <h3>Matriks Ternormalisasi</h3>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Alternatif</th>
                                    <?php foreach ($kriterias as $kriteria): ?>
                                        <th><?= esc($kriteria['kode_kriteria']) ?></th>
                                    <?php endforeach; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($alternatifs as $index => $alternatif): ?>
                                    <tr>
                                        <td><?= $index + 1 ?></td>
                                        <td><?= esc($alternatif['nama']) ?></td>
                                        <?php foreach ($kriterias as $kriteria): ?>
                                            <td><?= esc($matriksR[$kriteria['id_kriteria']][$alternatif['id_alternatif']] ?? 0) ?></td>
                                        <?php endforeach; ?>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Tab Matriks Normalisasi Terbobot -->
                    <div class="tab-pane fade" id="matrix-normalisasi-terbobot" role="tabpanel">
                        <h3>Matriks Normalisasi Terbobot</h3>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Alternatif</th>
                                    <?php foreach ($kriterias as $kriteria): ?>
                                        <th><?= esc($kriteria['kode_kriteria']) ?></th>
                                    <?php endforeach; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($alternatifs as $index => $alternatif): ?>
                                    <tr>
                                        <td><?= $index + 1 ?></td>
                                        <td><?= esc($alternatif['nama']) ?></td>
                                        <?php foreach ($kriterias as $kriteria): ?>
                                            <td><?= esc($matriksRb[$kriteria['id_kriteria']][$alternatif['id_alternatif']] ?? 0) ?></td>
                                        <?php endforeach; ?>
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
