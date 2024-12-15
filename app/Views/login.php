<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/style.css') ?>">
</head>
<body>

<!-- Navbar Dahil Et -->
<?php if (view('inc/NavBar')): ?>
    <?= view('inc/NavBar') ?>
<?php endif; ?>

<div class="d-flex justify-content-center align-items-center vh-100">
    <!-- Login Form -->
    <form class="shadow w-450 p-3" action="<?= site_url('home/loginProcess') ?>" method="post">
        <h4 class="display-4 fs-1">LOGIN</h4><br>

        <!-- Error Message -->
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger" role="alert">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <!-- Username Input -->
        <div class="mb-3">
            <label class="form-label">User name</label>
            <input type="text" class="form-control" name="uname" value="<?= old('uname') ?>" required>
        </div>

        <!-- Password Input -->
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="pass" required>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Login</button>

        <!-- Links -->
        <div class="mt-3">
            <a href="/admin-login" class="link-secondary">Admin Login</a>
            &nbsp;&nbsp;&nbsp;
            <a href="/blog" class="link-secondary">Blog</a>
            &nbsp;&nbsp;&nbsp;
            <a href="/signup" class="link-secondary">Sign Up</a>
        </div>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>