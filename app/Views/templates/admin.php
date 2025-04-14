<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - <?= $title ?? 'Dashboard' ?></title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8f9fc;
        }

        /* ======= Sidebar ======= */
        .sidebar {
            height: 100vh;
            width: 260px;
            position: fixed;
            top: 0;
            left: 0;
            background: linear-gradient(135deg, #1c1c2e, #2d2d45);
            transition: all 0.3s;
            padding-top: 20px;
        }

        .sidebar .nav-link {
            color: white;
            padding: 12px 20px;
            font-size: 16px;
            display: flex;
            align-items: center;
            transition: all 0.3s;
        }

        .sidebar .nav-link i {
            margin-right: 10px;
        }

        .sidebar .nav-link:hover {
            background: rgba(255, 215, 0, 0.1);
            border-radius: 5px;
            transform: translateX(5px);
            color: #FFD700;
        }

        .sidebar-brand {
            text-align: center;
            padding: 15px;
            font-size: 22px;
            font-weight: bold;
            color: white;
        }

        .sidebar-brand i {
            font-size: 30px;
            color: #FFD700;
        }

        .sidebar hr {
            border-color: rgba(255, 255, 255, 0.2);
        }

        /* ======= Navbar ======= */
        .navbar {
            height: 60px;
            background: linear-gradient(135deg, #1e1e2d, #2c2c3e);
            color: white;
            padding: 10px 20px;
            transition: all 0.3s;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }

        .navbar .toggle-sidebar {
            color: white;
            font-size: 18px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .navbar .toggle-sidebar:hover {
            color: #f0a500;
            transform: scale(1.1);
        }

        .navbar .user-profile {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }

        .navbar .user-profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 2px solid #f0a500;
            transition: all 0.3s;
        }

        .navbar .user-profile:hover img {
            transform: rotate(5deg) scale(1.1);
        }

        /* ======= Content Wrapper ======= */
        .content-wrapper {
            margin-left: 260px;
            padding: 20px;
            transition: all 0.3s;
        }

        /* ======= Footer ======= */
        .footer {
            background: linear-gradient(135deg, #1e1e2d, #2c2c3e);
            color: white;
            text-align: center;
            padding: 15px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        /* ======= Sidebar Toggle ======= */
        @media (max-width: 768px) {
            .sidebar {
                width: 0;
                overflow: hidden;
            }

            .content-wrapper {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column">
        <div class="sidebar-brand">
            <i class="fas fa-user-shield"></i> Admin Panel
        </div>
        <hr>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/dashboard') ?>">
                    <i class="fa-solid fa-gauge"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/data_pelanggan/index') ?>">
                    <i class="fa fa-user"></i> Data Pelanggan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/pemesanan') ?>">
                    <i class="fa fa-list"></i> Data Pemesanan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/lapangan') ?>">
                    <i class="fa fa-futbol"></i> Kelola Lapangan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-danger" href="<?= base_url('logout') ?>">
                    <i class="fa fa-sign-out-alt"></i> Logout
                </a>
            </li>
        </ul>
    </div>

    <!-- Konten Utama -->
    <div class="content-wrapper">
        <!-- Navbar -->
        <nav class="navbar d-flex justify-content-center">
            <div class="user-profile">
                <span>Selamat Datang Admin</span>
            </div>
        </nav>


        <!-- Halaman Konten -->
        <div class="container-fluid mt-3">
            <?= $this->renderSection('content') ?>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        &copy; <?= date('Y') ?> Admin Panel | All Rights Reserved
    </div>

    <!-- Script Toggle Sidebar -->
    <script>
        document.querySelector('.toggle-sidebar').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('d-none');
            document.querySelector('.content-wrapper').classList.toggle('ml-0');
        });
    </script>

</body>

</html>