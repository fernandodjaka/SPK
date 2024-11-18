<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pendukung Keputusan Metode MOORA</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: #2bb7b3; /* Sesuaikan warna background dengan gradien */
        }
        .navbar {
            background-color: #ffffff !important; /* Warna navbar putih */
        }
        .navbar-brand {
            font-weight: 900;
            color: #2bb7b3 !important; /* Warna teks navbar */
        }
        .card {
            background: rgba(255, 255, 255, 0.9); /* Latar belakang transparan */
        }
        .card-body {
            color: #000000; /* Warna teks di dalam card */
        }
        .text-white {
            color: #ffffff !important; /* Warna teks putih */
        }
        h4 {
            font-weight: 800;
        }
        .btn-info {
            background-color: #2bb7b3;
            border-color: #2bb7b3;
        }
    </style>
    <link rel="shortcut icon" href="path-to-your-logo.png" type="image/x-icon">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark shadow-lg pb-3 pt-3 font-weight-bold">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="path-to-your-logo.png" alt="Logo" class="mr-2" style="width: 50px;">
                Sistem Pendukung Keputusan Metode MOORA
            </a>
        </div>
    </nav>

    <div class="container">
        <!-- Outer Row -->
        <div class="row d-flex justify-content-between mt-5">
            <!-- Deskripsi MOORA -->
            <div class="col-xl-6 col-lg-6 col-md-6 mt-5">
                <div class="card o-hidden border-0 my-5 text-white" style="background: none;">
                    <div class="card-body p-0">
                        <h4>Sistem Pendukung Keputusan Metode MOORA</h4>
                        <p class="pt-4">
                            Sistem Pendukung Keputusan (SPK) merupakan suatu sistem informasi spesifik yang ditujukan untuk membantu manajemen dalam mengambil keputusan yang berkaitan dengan persoalan yang bersifat semi terstruktur.
                        </p>
                        <p>
                            Metode multi-objective optimization on the basis of ratio analysis (MOORA) adalah metode yang diperkenalkan oleh Brauers dan Zavadkas. Metode yang relatif baru ini pertama kali digunakan oleh Brauers dalam suatu pengambilan dengan multi-kriteria. Metode ini memiliki tingkat selektifitas yang baik dalam menentukan suatu alternatif.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Form Login -->
            <div class="col-xl-5 col-lg-5 col-md-5 mt-5">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login Account</h1>
                                    </div>
                                    <form action="<?= base_url('login/authenticate') ?>" method="post">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="username" placeholder="Username" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" name="password" placeholder="Password" required>
                                    </div>
                                    <button type="submit" class="btn btn-info btn-user btn-block">
                                        <i class="fas fa-fw fa-sign-in-alt mr-1"></i> Masuk
                                    </button>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
    </div>
    <?php endif; ?>


    <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>