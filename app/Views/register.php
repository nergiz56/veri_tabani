<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('public/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/css/fontawesome.min.css') ?>"> <!-- AdminLTE 3 iconlar için -->
    <link rel="stylesheet" href="<?= base_url('public/css/adminlte.min.css') ?>"> <!-- AdminLTE 3 tema -->
    <style>
        /* Kayıt sayfasının arka planı */
        .register-page {
            background: #f4f6f9; /* Light gray background */
            height: 100vh;
        }

        /* Register formunun kutusu */
        .register-box {
            width: 400px;
            margin: 7% auto;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Başlık stilini düzenliyoruz */
        .register-box .register-logo a {
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

        /* Register butonu */
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
            margin-bottom: 15px; /* Butonlar arasındaki boşluğu artırdık */
            color: #fff;
        }

        /* Lacivert rengi için butonlar */
        .btn-facebook {
            background-color: #003366; /* Lacivert rengi */
        }

        .btn-facebook:hover {
            background-color: #00224d; /* Koyu lacivert rengi */
        }

        .btn-google {
            background-color: #003366; /* Lacivert rengi */
        }

        .btn-google:hover {
            background-color: #00224d; /* Koyu lacivert rengi */
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
<body class="register-page">

<div class="register-box">
    <div class="register-logo">
        <a href="<?= base_url() ?>"><b>Admin</b>Register</a>
    </div>
    <div class="card">
        <div class="card-body register-card-body">
            <p class="register-box-msg">Register a new membership</p>

            <form action="<?= base_url('register') ?>" method="POST">
                <div class="form-group">
                    <label for="full_name">Full Name:</label>
                    <input type="text" class="form-control" id="full_name" placeholder="Enter your full name" name="full_name" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
                </div>

                <div class="form-group">
                    <label for="confirm_password">Retype Password:</label>
                    <input type="password" class="form-control" id="confirm_password" placeholder="Retype password" name="confirm_password" required>
                </div>

                <div class="form-group">
                    <div class="icheck-primary">
                        <input type="checkbox" id="agree_terms">
                        <label for="agree_terms">I agree to the <a href="#">terms</a></label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-8">
                        <!-- Placeholder for additional options if needed -->
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                </div>
            </form>

            <!-- Facebook ve Google Kayıt Butonları -->
            <a href="#" class="btn btn-facebook"><i class="fab fa-facebook-f"></i> Sign up using Facebook</a>
            <a href="#" class="btn btn-google"><i class="fab fa-google"></i> Sign up using Google+</a>

            <p class="mb-1">
                <a href="#">I already have a membership</a>
            </p>
            <p class="mb-0">
                <a href="#">I forgot my password</a>
            </p>

        </div>
        <!-- /.register-card-body -->
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