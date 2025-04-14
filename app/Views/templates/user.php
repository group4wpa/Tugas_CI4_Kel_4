<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Booking Lapangan SOR">
    <meta name="author" content="SOR Team">

    <title>BOOKING | SOR</title>

    <!-- Custom Fonts -->
    <link href="<?= base_url(); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">

    <!-- Custom Styles -->
    <link href="<?= base_url(); ?>/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        /* Warna Background Halaman */
        body {
            background-color: #f8f9fc;
        }

        /* Scroll to Top Button */
        .scroll-to-top {
            background: linear-gradient(45deg, #4e73df, #224abe);
            border: none;
            transition: all 0.3s ease-in-out;
        }

        .scroll-to-top:hover {
            background: #2e59d9;
        }

        /* Footer Styling */
        .sticky-footer {
            background: #4e73df;
            color: white;
            padding: 15px 0;
        }

        .sticky-footer span {
            font-size: 14px;
        }

        /* Modal Logout */
        .modal-content {
            border-radius: 12px;
        }

        .modal-header {
            background: #4e73df;
            color: white;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }

        .modal-footer .btn {
            border-radius: 8px;
        }

        /* Efek Hover Button Logout */
        .btn-primary {
            background: #4e73df;
            border: none;
            transition: all 0.3s ease-in-out;
        }

        .btn-primary:hover {
            background: #2e59d9;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion custom-sidebar" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon rotate">
                    <i class="fas fa-trophy"></i>
                </div>
                <div class="sidebar-brand-text mx-3 fw-bold animated-text">
                    <span class="highlight">SOR</span>
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">Home</div>

            <!-- Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <!-- Pesan Lapangan -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('user/pemesanan') ?>">
                    <i class="fas fa-store"></i>
                    <span>Pesan Lapangan</span>
                </a>
            </li>
            <!-- Riwayat -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('user/history') ?>">
                    <i class="fas fa-history"></i>
                    <span>Riwayat Pemesanan</span>
                </a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0 sidebarToggle"></button>
            </div>

        </ul>

        <!-- CSS Custom -->
        <style>
            /* ======= Sidebar Custom Background ======= */
            .custom-sidebar {
                background: linear-gradient(135deg, #1c1c2e, #2d2d45);
                border-right: 2px solid #444;
                transition: all 0.3s ease;
            }

            .custom-sidebar:hover {
                background: linear-gradient(135deg, #252540, #373759);
            }

            /* ======= Brand Styling ======= */
            .sidebar-brand {
                transition: all 0.3s ease-in-out;
                padding: 15px;
            }

            .rotate {
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 24px;
                transition: transform 0.5s ease-in-out;
                color: #FFD700;
            }

            .rotate:hover {
                transform: rotate(15deg) scale(1.1);
            }

            .sidebar-brand-text {
                font-size: 22px;
                font-weight: bold;
                transition: color 0.3s ease-in-out;
            }

            .highlight {
                background: linear-gradient(45deg, #FFD700, #FF4500);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                font-weight: 700;
            }

            .animated-text {
                animation: flicker 1.5s infinite alternate;
            }

            @keyframes flicker {
                0% {
                    opacity: 1;
                }

                50% {
                    opacity: 0.6;
                }

                100% {
                    opacity: 1;
                }
            }

            /* ======= Hover Effects ======= */
            .sidebar .nav-item .nav-link {
                transition: all 0.3s ease-in-out;
                color: #bbb;
            }

            .sidebar .nav-item .nav-link:hover {
                background-color: rgba(255, 215, 0, 0.1);
                border-radius: 5px;
                transform: translateX(5px);
                color: #FFD700;
            }

            /* ======= Collapse Item Styling ======= */
            .collapse-item {
                display: flex;
                align-items: center;
                padding: 8px 15px;
                transition: all 0.3s;
            }

            .collapse-item:hover {
                background-color: rgba(0, 123, 255, 0.1);
                border-radius: 5px;
                transform: scale(1.05);
            }

            /* ======= Sidebar Toggler ======= */
            .sidebarToggle {
                background-color: transparent;
                border: 1px solid #ccc;
                padding: 6px;
                transition: all 0.3s ease-in-out;
            }

            .sidebarToggle:hover {
                background-color: #FFD700;
                border-color: #FFD700;
            }
        </style>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow-custom">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3 toggle-icon">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle user-profile" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-profile rounded-circle"
                                    src="<?= base_url(session('avatar') ?? 'uploads/avatars/default.png') ?>?t=<?= time(); ?>"
                                    alt="User Avatar">


                            </a>

                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in glow-effect"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= base_url('user/profile'); ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-primary"></i>
                                    My Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item logout-btn" href="<?= base_url('/logout') ?>" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-danger"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>

                <!-- CSS Custom -->
                <style>
                    /* ======= Topbar Styling ======= */
                    .topbar {
                        background: linear-gradient(135deg, #1e1e2d, #2c2c3e);
                        border-radius: 8px;
                        padding: 10px 20px;
                        transition: all 0.3s ease;
                    }

                    .shadow-custom {
                        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
                    }

                    /* ======= Sidebar Toggle Button ======= */
                    .toggle-icon {
                        color: #ccc;
                        font-size: 18px;
                        transition: transform 0.3s ease-in-out, color 0.3s ease;
                    }

                    .toggle-icon:hover {
                        transform: scale(1.2);
                        color: #f0a500;
                    }

                    /* ======= User Profile ======= */
                    .user-profile {
                        display: flex;
                        align-items: center;
                        gap: 8px;
                        transition: all 0.3s ease;
                        color: #ccc;
                    }

                    .user-profile:hover {
                        color: #f0a500;
                        transform: scale(1.05);
                    }

                    .img-profile {
                        width: 40px;
                        height: 40px;
                        border: 2px solid #444;
                        transition: transform 0.3s ease-in-out, border 0.3s ease-in-out;
                    }

                    .user-profile:hover .img-profile {
                        transform: rotate(5deg) scale(1.1);
                        border: 2px solid #f0a500;
                    }

                    /* ======= Dropdown Styling ======= */
                    .dropdown-menu {
                        border-radius: 8px;
                        overflow: hidden;
                        background-color: #2c2c3e;
                    }

                    .glow-effect {
                        box-shadow: 0px 4px 10px rgba(255, 165, 0, 0.3);
                    }

                    .dropdown-item {
                        color: #ccc;
                        transition: background-color 0.3s ease, transform 0.2s ease;
                    }

                    .dropdown-item:hover {
                        background-color: rgba(255, 165, 0, 0.2);
                        color: #f0a500;
                        transform: translateX(5px);
                    }

                    /* ======= Logout Button Hover Effect ======= */
                    .logout-btn {
                        transition: all 0.3s ease-in-out;
                    }

                    .logout-btn:hover {
                        background-color: rgba(255, 0, 0, 0.1);
                        color: #dc3545 !important;
                        transform: translateX(5px);
                    }
                </style>

                <!-- Tambahkan FontAwesome jika belum -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
                <!-- End of Topbar -->

                <!-- Page Content -->
                <div class="container-fluid">
                    <?= $this->renderSection('page-content'); ?>
                </div>

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer text-center">
                <div class="container my-auto">
                    <span>Copyright &copy; SOR Booking <?= date('Y'); ?></span>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" untuk mengakhiri sesi Anda saat ini.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary" href="<?= base_url('/logout') ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="<?= base_url(); ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?= base_url(); ?>/js/sb-admin-2.min.js"></script>

</body>

</html>