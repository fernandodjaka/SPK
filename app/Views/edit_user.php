<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
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
            <div id="content" class="container-fluid">
                <h2 class="mt-4">Edit User</h2>

                <!-- Tampilkan error jika ada -->
                <?php if (session()->getFlashdata('errors')) : ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <!-- Tampilkan pesan sukses jika ada -->
                <?php if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-success">
                        <?= esc(session()->getFlashdata('success')); ?>
                    </div>
                <?php endif; ?>

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-info">Form Edit User</h6>
                    </div>
                    <div class="card-body">
                        <form action="<?= site_url('user/update/' . $user['id_user']) ?>" method="post">
                            <div class="form-group">
                                <label>Username:</label>
                                <input type="text" name="username" value="<?= esc($user['username']) ?>" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label>Nama:</label>
                                <input type="text" name="nama" value="<?= esc($user['nama']) ?>" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label>Email:</label>
                                <input type="email" name="email" value="<?= esc($user['email']) ?>" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label>Role:</label>
                                <input type="text" name="role" value="<?= esc($user['role']) ?>" class="form-control" required>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?= site_url('user') ?>" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
