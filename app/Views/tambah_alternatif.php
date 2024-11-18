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
        <?= view('layout/sidebar_admin'); ?>
    </div>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="flex-grow-1">
        <div id="content">
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-users"></i> Tambah Alternatif</h1>
                    <a href="<?= base_url('list-alternatif'); ?>" class="btn btn-secondary"> <i class="fas fa-arrow-left"></i> Kembali </a>
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
                        <h6 class="m-0 font-weight-bold text-info"><i class="fas fa-fw fa-plus"></i> Form Tambah Alternatif</h6>
                    </div>
                    <form action="<?= base_url('alternatif/tambah'); ?>" method="post">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="font-weight-bold">Nama Alternatif</label>
                                    <input type="text" name="nama" required class="form-control" value="<?= isset($nama) ? esc($nama) : ''; ?>" />
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="font-weight-bold">Jenis Kelamin</label>
                                    <select name="jk" class="form-control" required>
                                        <option value="">--Pilih--</option>
                                        <option value="laki-laki" <?= (isset($jk) && $jk == 'laki-laki') ? 'selected' : ''; ?>>Laki - Laki</option>
                                        <option value="perempuan" <?= (isset($jk) && $jk == 'perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                            <button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/js/sb-admin-2.min.js') ?>"></script>
