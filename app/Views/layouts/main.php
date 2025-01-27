<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Library</title>

    <!-- Include Tabler CSS -->
    <link href="<?= base_url('assets/css/tabler.min.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/css/tabler-flags.min.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/css/tabler-payments.min.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/css/tabler-vendors.min.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/css/demo.min.css') ?>" rel="stylesheet" />

    <!-- Optional: Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">


    <style>
        .navbar {
            margin-bottom: 20px;
        }
        .footer {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="page">
        <!-- Navbar -->
        <header class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(to right, #4e73df, #3b5998);">
            <div class="container-fluid">
                <a href="/index.php/gamelibrary" class="navbar-brand d-flex align-items-center">
                    <i class="ti ti-library me-2" style="font-size: 1.5rem;"></i> Game Library
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <!-- Ganti bagian navbar -->
                    <ul class="navbar-nav ms-auto">
                        <?php if (session()->get('isLoggedIn')): ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" data-bs-toggle="dropdown">
                                    <i class="ti ti-user me-1"></i> <?= session()->get('username') ?>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <?php if (session()->get('role') === 'admin'): ?>
                                        <li><a class="dropdown-item" href="/dashboard"><i class="ti ti-dashboard me-2"></i>Dashboard</a></li>
                                    <?php else: ?>
                                        <li><a class="dropdown-item" href="/user"><i class="ti ti-dashboard me-2"></i>User Dashboard</a></li>
                                    <?php endif; ?>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item text-danger" href="/auth/logout"><i class="ti ti-logout me-2"></i>Logout</a></li>
                                </ul>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center" href="/login">
                                    <i class="ti ti-login me-1"></i> Login
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </header>

        <!-- Flash Message -->
        <div class="container">
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('success') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php elseif (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('error') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
        </div>

        <!-- Main Content -->
        <div class="content">
            <div class="container">
                <?= $this->renderSection('content') ?>
            </div>
        </div>

        <!-- Footer -->
        <footer class="footer footer-transparent d-print-none">
            <div class="container text-center">
                <p>&copy; <?= date('Y') ?> Game Library. <br>
                <small>Project ini masih dalam tahap pengembangan dan dibuat untuk keperluan tugas.</small>
                </p>
            </div>
        </footer>


    <!-- Include Tabler JS -->
    <script src="<?= base_url('assets/js/tabler.min.js') ?>"></script>

    <!-- Optional: Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>