<?php
namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{
    public function login()
    {
        return view('login'); // Login sayfasını render et
    }

    public function loginProcess()
    {
        $username = $this->request->getPost('uname');
        $password = $this->request->getPost('pass');

        $userModel = new \App\Models\UserModel();
        $user = $userModel->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            // Kullanıcı adı session'a kaydediliyor
            session()->set('username', $username);
            return redirect()->to('/blog');
        } else {
            return redirect()->to('/login')
                ->with('error', 'Kullanıcı adı veya şifre hatalı!')
                ->withInput();
        }
    }

    public function logout()
    {
        // Oturumu kapat
        session()->destroy();

        // Login sayfasına yönlendir
        return redirect()->to('/login');
    }
}