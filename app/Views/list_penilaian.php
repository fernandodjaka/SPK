<?php
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
                    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-list"></i> Daftar Data Penilaian</h1>
                    <!-- Tombol Tambah Penilaian dihapus -->
                </div>

                <!-- Tampilkan error jika ada -->
                <?php if (session()->getFlashdata('errors')) : ?>
                    <div class="alert alert-danger">
                        <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                            <?= esc($error); ?><br>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <!-- Tampilkan pesan sukses jika ada -->
                <?php if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-success">
                        <?= esc(session()->getFlashdata('success')); ?>
                    </div>
                <?php endif; ?>

                <!-- Card untuk Tabel Data Penilaian -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-info"><i class="fas fa-table"></i> Daftar Data Penilaian</h6>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="penilaianTable" width="100%" cellspacing="0">
                                <thead class="bg-info text-white">
                                    <tr class="text-center">
                                        <th width="5%">No</th>
                                        <th>Alternatif</th>
                                        <th width="15%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($alternatif as $dataAlternatif) : ?>
                                        <tr class="text-center">
                                            <td><?= $no ?></td>
                                            <td class="text-left"><?= esc($dataAlternatif['nama']) ?></td>
                                            <td>
                                                <!-- Tombol untuk membuka modal edit -->
                                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal<?= $dataAlternatif['id_alternatif'] ?>">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="editModal<?= $dataAlternatif['id_alternatif'] ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?= $dataAlternatif['id_alternatif'] ?>" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel<?= $dataAlternatif['id_alternatif'] ?>">Edit Penilaian - <?= esc($dataAlternatif['nama']) ?></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?= base_url('penilaian/update'); ?>" method="post">
                                                            <input type="hidden" name="id_alternatif" value="<?= esc($dataAlternatif['id_alternatif']); ?>">
                                                            <?php foreach ($kriteria as $kriteriaItem) : ?>
                                                                <input type="hidden" name="id_kriteria[]" value="<?= esc($kriteriaItem['id_kriteria']); ?>">
                                                                <div class="form-group">
                                                                    <label>(<?= esc($kriteriaItem['kode_kriteria']) ?>) <?= esc($kriteriaItem['nama']) ?></label>
                                                                    <?php
                                                                    // Ambil nilai penilaian untuk kriteria ini
                                                                    $nilai = 0;
                                                                    foreach ($penilaian[$dataAlternatif['id_alternatif']] ?? [] as $p) {
                                                                        if ($p['id_kriteria'] == $kriteriaItem['id_kriteria']) {
                                                                            $nilai = $p['nilai'];
                                                                            break;
                                                                        }
                                                                    }
                                                                    ?>
                                                                    <input type="number" name="nilai[]" class="form-control" step="0.001" value="<?= esc($nilai) ?>" required>
                                                                </div>
                                                            <?php endforeach; ?>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php
                                        $no++;
                                    endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include jQuery, Bootstrap JS, DataTables JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/js/sb-admin-2.min.js') ?>"></script>

<!-- Include DataTables JS -->
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function() {
        $('#penilaianTable').DataTable({
            "lengthMenu": [5, 10, 25, 50],
            "language": {
                "lengthMenu": "Tampilkan _MENU_",
                "search": "Cari:",
                "zeroRecords": "Tidak ada data yang ditemukan",
                "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
                "infoEmpty": "Data tidak tersedia",
                "infoFiltered": "(difilter dari _MAX_ total entri)",
                "paginate": {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "Selanjutnya",
                    "previous": "Sebelumnya"
                }
            }
        });
    });
</script>

