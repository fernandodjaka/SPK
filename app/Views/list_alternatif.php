<?php
// Check if the user is logged in and role is admin
if (!session()->get('isLoggedIn') || session()->get('role') != 'A') {
    return redirect()->to('/login');
}

// Include Header
echo view('layout/header_admin');
?>

<div id="wrapper" class="d-flex">
    <!-- Sidebar -->
    <div id="sidebar">
        <?php echo view('layout/sidebar_admin'); ?>
    </div>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="flex-grow-1">
        <div id="content">
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-users"></i> Daftar Alternatif</h1>
                    <a href="<?= base_url('tambah-alternatif'); ?>" class="btn btn-primary"> <i class="fas fa-plus"></i> Tambah Alternatif </a>
                </div>

                <?php if (isset($errors) && !empty($errors)) : ?>
                    <div class="alert alert-danger">
                        <?php foreach ($errors as $error) : ?>
                            <?= esc($error); ?><br>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-info"><i class="fas fa-fw fa-list"></i> Daftar Alternatif</h6>
                    </div>
                    <div class="card-body">
                        <table id="alternatifTable" class="table table-bordered">
                            <thead>
                                <tr class="table-info">
                                    <th>No</th>
                                    <th>Nama Alternatif</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Aksi</th> <!-- Tambahkan kolom aksi -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($alternatifs)) : ?>
                                    <?php $no = 1; foreach ($alternatifs as $alternatif): ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= esc($alternatif['nama']); ?></td>
                                            <td><?= esc($alternatif['jk']); ?></td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="<?= base_url('edit-alternatif/' . $alternatif['id_alternatif']); ?>" class="btn btn-warning btn-sm mr-2">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <a href="<?= base_url('hapus-alternatif/' . $alternatif['id_alternatif']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus alternatif ini?');">
                                                        <i class="fas fa-trash"></i> Hapus
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="4" class="text-center">Tidak ada alternatif yang ditemukan.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Include Bootstrap JS and DataTables -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/js/sb-admin-2.min.js') ?>"></script>

<script>
    $(document).ready(function() {
        $('#alternatifTable').DataTable({
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
            }
        });
    });
</script>

<style>
    .dataTables_filter {
        display: flex; /* Menggunakan flexbox untuk penataan */
        justify-content: flex-start; /* Menyelaraskan ke kiri */
        margin-left: 90px; /* Menggeser keseluruhan ke kanan */
    }

    .dataTables_filter label {
        margin-right: 10px; /* Jarak antara label "Cari:" dan input */
    }

    .dataTables_filter input {
        margin-left: 0px; /* Menggeser input pencarian sedikit ke kanan */
    }

    .btn {
        margin: 0 5px; /* Jarak antar tombol */
    }

    .btn-warning, .btn-danger {
        min-width: 75px; /* Set lebar minimum tombol */
    }

    /* Warna latar belakang untuk header tabel */
    .table-info th {
        background-color: #17a2b8; /* Sesuaikan dengan warna yang diinginkan */
        color: white; /* Warna teks putih untuk kontras */
    }
</style>
