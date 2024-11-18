<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - SPK Pemilihan OSIS</title>

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Include Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/custom_user.css'); ?>">

    <style>
/* Custom Header Styles */
.topbar {
    background: linear-gradient(135deg, #14532d, #0d3e1e); /* Hijau Tua Gradasi */
    padding: 15px 25px;
    color: #ffffff;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    border-bottom-left-radius: 20px;
    border-bottom-right-radius: 20px;
}

/* Navbar Brand */
.navbar-brand {
    font-size: 1.8rem;
    font-weight: bold;
    color: #ffffff;
    display: flex;
    align-items: center;
}

/* Icon */
.navbar-brand i {
    margin-right: 12px;
    color: #f8f9fc;
}

.topbar .navbar-nav .nav-link {
    color: #ffffff !important;
    font-size: 1rem;
    transition: color 0.3s ease, background-color 0.3s ease;
    border-radius: 8px;
    padding: 10px 15px;
}

.topbar .navbar-nav .nav-link:hover {
    color: #d1d3e2 !important;
    background-color: rgba(255, 255, 255, 0.1);
}

.img-profile {
    width: 45px;
    height: 45px;
    object-fit: cover;
    border: 3px solid #f8f9fc;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.15);
    transition: transform 0.3s ease;
}

.img-profile:hover {
    transform: scale(1.1);
}

.dropdown-menu {
    border-radius: 12px;
    border: none;
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.25);
    background-color: #14532d;
}

.dropdown-item {
    color: #f8f9fc;
    font-size: 0.95rem;
}

.dropdown-item:hover {
    background-color: #0d3e1e;
    color: white;
    transition: background-color 0.3s ease;
}

.navbar-nav .nav-item .dropdown-toggle {
    transition: color 0.3s ease;
}

/* Container adjustments */
.container-fluid {
    max-width: 1200px;
    margin: auto;
}

/* Mobile responsiveness */
@media (max-width: 767px) {
    .topbar {
        padding: 12px 20px;
    }
    .navbar-brand {
        font-size: 1.4rem;
    }
    .img-profile {
        width: 35px;
        height: 35px;
    }
    .topbar .navbar-nav .nav-link {
        padding: 8px 12px;
        font-size: 0.9rem;
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
            <i class="fas fa-user"></i> Welcome - User
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
                    <a class="dropdown-item" href="<?= base_url('user_profile'); ?>">
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
