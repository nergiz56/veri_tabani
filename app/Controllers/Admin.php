<?php
// app/Controllers/Admin.php
namespace App\Controllers;

use App\Models\AdminModel;
use CodeIgniter\Controller;

class Admin extends Controller
{
    public function login()
    {
        return view('admin-login.php'); // Admin login sayfasını döndürüyoruz
    }

    // Admin dashboard sayfası
    public function dashboard()
    {
        if (!session()->has('admin')) {
            return redirect()->to('/admin/login');
        }

        // Admin giriş yaptıysa dashboard sayfasını göster
        return view('admin/dashboard');
    }

    // Admin çıkış işlemi
    public function logout()
    {
        session()->remove('admin');
        return redirect()->to('/admin/login'); // Admin çıkışı yaptıktan sonra login sayfasına yönlendir
    }
    public function loginProcess()
    {
        $model = new AdminModel();

        // Formdan gelen veriler
        $uname = $this->request->getPost('uname');
        $pass = $this->request->getPost('pass');

        // Debugging
        if (!$uname || !$pass) {
            die('Kullanıcı adı veya şifre gönderilmedi!'); // Gelen verileri kontrol edin
        }

        // Admin bilgilerini doğrula
        $admin = $model->validateAdmin($uname, $pass);

        if ($admin) {
            session()->set('admin', $admin['username']);
            return redirect()->to('/users');
        } else {
            session()->setFlashdata('error', 'Geçersiz kullanıcı adı veya şifre!');
            return redirect()->to('/admin-login');
        }
    }

}