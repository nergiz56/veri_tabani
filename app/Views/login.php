<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('public/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/css/fontawesome.min.css') ?>"> <!-- AdminLTE 3 iconlar için -->
    <link rel="stylesheet" href="<?= base_url('public/css/adminlte.min.css') ?>"> <!-- AdminLTE 3 tema -->
    <style>
        /* Giriş sayfasının arka planı */
        .login-page {
            background: #f4f6f9; /* Light gray background */
            height: 100vh;
        }

        /* Login formunun kutusu */
        .login-box {
            width: 400px;
            margin: 7% auto;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Başlık stilini düzenliyoruz */
        .login-box .login-logo a {
            color: #28a745;
            font-size: 30px;
            font-weight: bold;
        }

        .form-control {
            border-radius: 5px;
            height: 45px; /* Giriş alanlarının yükseklikleri aynı */
            font-size: 16px;
            border: 1px solid #28a745; /* Yeşil renk kenarlık */
        }

        .form-control:focus {
            border-color: #218838;
            box-shadow: 0 0 5px rgba(40, 167, 69, 0.5);
        }

        /* Sign In butonu */
        .btn-primary {
            width: 100%;
            padding: 12px;
            font-size: 18px;
            border-radius: 5px;
            background-color: #28a745;
            border: none;
        }

        /* Hover durumunda buton rengi */
        .btn-primary:hover {
            background-color: #218838;
        }

        /* Facebook ve Google butonları */
        .btn-facebook, .btn-google {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border-radius: 5px;
            margin-bottom: 10px;
            color: #fff;
        }

        .btn-facebook {
            background-color: #3b5998;
        }

        .btn-facebook:hover {
            background-color: #2d4373;
        }

        .btn-google {
            background-color: #dd4b39;
        }

        .btn-google:hover {
            background-color: #c1351d;
        }

        /* Footer kısmı */
        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 14px;
            color: #28a745;
        }
    </style>
</head>
<body class="login-page">

<div class="login-box">
    <div class="login-logo">
        <a href="<?= base_url() ?>"><b>Admin</b>Login</a>
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="<?= base_url('login') ?>" method="POST">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
                </div>

                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">Remember Me</label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <!-- Facebook ve Google Giriş Butonları -->
            <a href="#" class="btn btn-facebook"><i class="fab fa-facebook-f"></i> Sign in using Facebook</a>
            <a href="#" class="btn btn-google"><i class="fab fa-google"></i> Sign in using Google+</a>

            <p class="mb-1">
                <a href="#">I forgot my password</a>
            </p>
            <p class="mb-0">
                <a href="#">Register a new membership</a>
            </p>

        </div>
        <!-- /.login-card-body -->
    </div>
</div>

<footer class="footer">
    <p>&copy; 2024 Your Website. All rights reserved.</p>
</footer>

<script src="<?= base_url('public/js/jquery.min.js') ?>"></script>
<script src="<?= base_url('public/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('public/js/adminlte.min.js') ?>"></script>
</body>
</html>