<?php

namespace App\Controllers;

class TestController extends BaseController
{
    public function index()
    {
        $hashedPassword = '$2y$10$kggeKkIs6rEWf.p/6muJCOepa8zY4DcDU3CBZua8iNc9SBM3MMGym'; // Veritabanındaki şifre
        $inputPassword = '565656'; // Girişte yazdığınız şifre

        if (password_verify($inputPassword, $hashedPassword)) {
            echo 'Şifreler eşleşiyor.';
        } else {
            echo 'Şifreler eşleşmiyor.';
        }
    }
}