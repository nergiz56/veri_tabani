<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'admin'; // Tablo adı
    protected $allowedFields = ['username', 'password']; // İzin verilen sütunlar

    public function validateAdmin($username, $password)
    {
        $user = $this->where('username', $username)->first();

        if ($user) {
            log_message('debug', 'Gönderilen şifre: ' . $password);
            log_message('debug', 'Kayıtlı hash: ' . $user['password']);

            if (password_verify($password, $user['password'])) {
                return $user;
            }
        }

        return false;
    }


}