<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class Users extends BaseController
{
    public function index()
    {
        $model = new UsersModel();
        $data['users'] = $model->findAll(); // Veritabanından tüm kullanıcıları alır.

        return view('admin/users', $data); // View dosyasını çağırır.
    }

    public function add()
    {
        // Yeni kullanıcı ekleme işlemleri burada yapılır.
    }

    public function delete($id)
    {
        $model = new UsersModel();
        $model->delete($id); // Belirtilen kullanıcıyı siler.

        return redirect()->to('/users');
    }
}