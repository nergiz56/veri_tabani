<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/style.css') ?>">
</head>
<body>
<div class="d-flex justify-content-center align-items-center vh-100">
    <form class="shadow w-450 p-3" action="<?= site_url('admin/loginProcess') ?>" method="post">


    <h4 class="display-4 fs-1">ADMIN LOGIN</h4><br>
        <p>Only for Administrator</p>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger" role="alert">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <div class="mb-3">
            <label class="form-label">User name</label>
            <input type="text"
                   class="form-control"
                   name="uname"
                   value="<?= old('uname') ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password"
                   class="form-control"
                   name="pass">
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
        <a href="<?= site_url('login') ?>" class="link-secondary">User Login</a>
    </form>
</div>
</body>
</html>