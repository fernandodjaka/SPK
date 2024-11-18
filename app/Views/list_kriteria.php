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
                    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-cube"></i> Data Kriteria</h1>
                    <a href="<?= base_url('tambah-kriteria'); ?>" class="btn btn-success"> <i class="fa fa-plus"></i> Tambah Data </a>
                </div>

                <!-- Tampilkan Pesan Sukses -->
                <?php if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-info"><?= session()->getFlashdata('success'); ?></div>
                <?php endif; ?>

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-info"><i class="fa fa-table"></i> Daftar Data Kriteria</h6>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="kriteriaTable" class="table table-bordered">
                                <thead class="table-info">
                                    <tr align="center">
                                        <th>No</th>
                                        <th>Kode Kriteria</th>
                                        <th>Nama Kriteria</th>
                                        <th>Type</th>
                                        <th>Bobot</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($kriteria as $data) : ?>
                                        <tr align="center">
                                            <td><?= $no++; ?></td>
                                            <td><?= esc($data['kode_kriteria']); ?></td>
                                            <td align="left"><?= esc($data['nama']); ?></td>
                                            <td><?= esc($data['type']); ?></td>
                                            <td><?= esc($data['bobot']); ?></td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="<?= base_url('edit-kriteria/' . $data['id_kriteria']); ?>" class="btn btn-warning btn-sm mr-2">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </a>
                                                    <a href="<?= base_url('hapus-kriteria/' . $data['id_kriteria']); ?>" onclick="return confirm('Apakah anda yakin untuk menghapus data ini?')" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i> Hapus
                                                    </a>
                                                </div>
                                            </td>
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
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/js/sb-admin-2.min.js') ?>"></script>

<script>
    $(document).ready(function() {
        $('#kriteriaTable').DataTable({
            "lengthMenu": [5, 10, 25, 50],
            "language": {
                "lengthMenu": "Tampilkan _MENU_",
                "search": "Cari:",
                "zeroRecords": "Tidak ada data yang ditemukan",
                "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
                "infoEmpty": "Tidak ada entri tersedia",
                "infoFiltered": "(difilter dari _MAX_ total entri)",
                "paginate": {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "Selanjutnya",
                    "previous": "Sebelumnya"
                }
            },
        });
    });
</script>

<style>
    .table-info th {
        background-color: #17a2b8;
        color: white;
    }

    .btn {
        margin: 0 5px;
    }

    .btn-warning, .btn-danger {
        min-width: 75px;
    }
</style>