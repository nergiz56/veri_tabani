<!-- app/Views/signup.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
echo view('inc/NavBar'); // NavBar'ı view olarak dahil ediyoruz
?>


<div class="d-flex justify-content-center align-items-center vh-100">
    <form class="shadow w-450 p-3" method="post" action="/signup/register">
        <h4 class="display-4 fs-1">SIGN UP</h4><br>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger" role="alert">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <div class="mb-3">
            <label class="form-label">User name</label>
            <input type="text" class="form-control" name="uname" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="pass" required>
        </div>

        <button type="submit" class="btn btn-primary">Sign Up</button>
        <a href="login" class="link-secondary">Already have an account? Login</a>
    </form>
</div>

</body>
</html>