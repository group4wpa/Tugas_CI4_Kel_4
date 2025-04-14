<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">

    <style>
    </style>
</head>

<body class="d-flex justify-content-center align-items-center">
    <div class="login-container text-white">
        <h3 class="text-center mb-4">Login</h3>

        <!-- Notifikasi sukses registrasi -->
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success text-center fade-in">
                <i class="fa fa-check-circle"></i> <?= session()->getFlashdata('success'); ?>
            </div>
        <?php endif; ?>

        <!-- Notifikasi error login -->
        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger text-center fade-in">
                <i class="fa fa-times-circle"></i> <?= session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('login') ?>" method="post">
            <?= csrf_field() ?> <!-- Tambahan keamanan -->
            <div class="mb-3 input-group">
                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="mb-3 input-group">
                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
        <a href="<?= base_url('register') ?>" class="btn-register mt-3">Belum punya akun? Daftar</a>
    </div>
</body>

</html>