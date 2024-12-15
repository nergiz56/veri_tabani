<?php
$hashedPassword = '$2y$10$kggeKkIs6rEWf.p/6muJCOepa8zY4DcDU3CBZua8iNc9SBM3MMGym'; // Veritabanındaki hash
$inputPassword = '565656'; // Test edilen şifre

if (password_verify($inputPassword, $hashedPassword)) {
    echo 'Şifreler eşleşiyor.';
} else {
    echo 'Şifreler eşleşmiyor.';
}
