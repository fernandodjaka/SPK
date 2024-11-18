<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Pengguna</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css">
</head>
<body>
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
                        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-list"></i> Daftar Pengguna</h1>
                        <a href="/user/create" class="btn btn-primary">Tambah User</a>
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

                    <!-- Card untuk Tabel Data Pengguna -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-info"><i class="fas fa-table"></i> Daftar Pengguna</h6>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="userTable" width="100%" cellspacing="0">
                                    <thead class="bg-info text-white">
                                        <tr class="text-center">
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($users as $user): ?>
                                        <tr class="text-center">
                                            <td><?= esc($user['id_user']) ?></td>
                                            <td><?= esc($user['username']) ?></td>
                                            <td><?= esc($user['nama']) ?></td>
                                            <td><?= esc($user['email']) ?></td>
                                            <td><?= esc($user['role']) ?></td>
                                            <td>
                                                <a href="/user/edit/<?= esc($user['id_user']) ?>" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="/user/delete/<?= esc($user['id_user']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');">Hapus</a>
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

    <!-- Include jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#userTable').DataTable({
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
</body>
</html>
