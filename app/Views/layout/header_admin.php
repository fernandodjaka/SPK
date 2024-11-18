<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - SPK Pemilihan OSIS</title>

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Include Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/custom_admin.css'); ?>">

    <style>
        /* Custom Header Styles */
        .topbar {
            background: linear-gradient(90deg, #4e73df, #224abe);
            padding: 12px 20px;
            color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-bottom-left-radius: 15px;
            border-bottom-right-radius: 15px;
        }

        /* Navbar Brand */
        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: #f8f9fc;
        }

        /* Icon */
        .navbar-brand i {
            margin-right: 10px;
        }

        .topbar .navbar-nav .nav-link {
            color: white !important;
            font-size: 16px;
            transition: color 0.3s ease;
        }

        .topbar .navbar-nav .nav-link:hover {
            color: #d1d3e2 !important;
        }

        .img-profile {
            width: 40px;
            height: 40px;
            object-fit: cover;
            border: 2px solid #f8f9fc;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .dropdown-menu {
            border-radius: 10px;
            border: none;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .dropdown-item:hover {
            background-color: #2e59d9;
            color: white;
        }

        .navbar-nav .nav-item .dropdown-toggle {
            transition: color 0.3s ease;
        }

        .container-fluid {
            max-width: 1080px; /* Set a reasonable max-width */
            margin: auto;
        }
        
        /* Mobile responsiveness */
        @media (max-width: 767px) {
            .topbar {
                padding: 10px 15px;
            }
            .navbar-brand {
                font-size: 1.3rem;
            }
            .img-profile {
                width: 35px;
                height: 35px;
            }
        }
    </style>
</head>
<body>

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow">
        <!-- Brand (Logo) -->
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="<?= base_url('assets/logods.png'); ?>" alt="Logo" style="width: 40px; margin-right: 10px;">

            <i class="fas fa-crown"></i> welcome -Admin
        </a>

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-white small">
                        <?= session()->get('username'); ?> <!-- Nama pengguna -->
                    </span>
                    <img class="img-profile rounded-circle" src="<?= base_url('assets/img/default_profile.png'); ?>" alt="User Profile">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="<?= base_url('profile'); ?>">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profil
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= base_url('logout'); ?>" onclick="return confirm('Apakah Anda yakin ingin logout?');">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>
        </ul>
    </nav>
    <!-- End of Topbar -->

    <!-- Content Wrapper -->
    <div class="container-fluid">
        <!-- Your Content Here -->
    </div>

    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
