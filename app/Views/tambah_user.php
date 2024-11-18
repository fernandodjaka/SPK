<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah User</title>
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
                    <h1 class="h3 mb-0 text-gray-800">Tambah User</h1>
                    <form action="/user/store" method="post">
                        <div class="form-group">
                            <label>Username:</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Password:</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Nama:</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Role:</label>
                            <input type="text" name="role" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Include jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
