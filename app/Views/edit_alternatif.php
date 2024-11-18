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
                    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-users"></i> Edit Alternatif</h1>
                    <a href="<?= base_url('list-alternatif'); ?>" class="btn btn-secondary"> <i class="fas fa-arrow-left"></i> Kembali ke Daftar Alternatif </a>
                </div>

                <!-- Tampilkan pesan error jika ada -->
                <?php if (isset($errors) && !empty($errors)) : ?>
                    <div class="alert alert-danger">
                        <?php foreach ($errors as $error) : ?>
                            <?= esc($error); ?><br>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <!-- Form Edit Alternatif -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-info"><i class="fas fa-fw fa-edit"></i> Edit Alternatif</h6>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('edit-alternatif/' . $alternatif['id_alternatif']); ?>" method="post">
                            <?= csrf_field(); ?>
                            
                            <div class="form-group">
                                <label for="nama">Nama Alternatif</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= esc($alternatif['nama']); ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="jk">Jenis Kelamin</label>
                                <select name="jk" id="jk" class="form-control" required>
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="Laki-laki" <?= $alternatif['jk'] == 'Laki-laki' ? 'selected' : ''; ?>>Laki-laki</option>
                                    <option value="Perempuan" <?= $alternatif['jk'] == 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Include Bootstrap JS and DataTables -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/js/sb-admin-2.min.js') ?>"></script>

<style>
    .btn {
        margin: 0 5px;
    }
</style>
