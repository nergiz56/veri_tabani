<?php
// app/Controllers/Signup.php
namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Signup extends Controller
{
    public function index()
    {
        return view('signup'); // signup view dosyasını döndürüyoruz
    }

    public function register()
    {
        $model = new UserModel();

        // Formdan gelen veriler
        $username = $this->request->getPost('uname');
        $password = $this->request->getPost('pass');
        $email = $this->request->getPost('email');

        // Veritabanına kayıt işlemi
        $data = [
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT), // Şifreyi güvenli şekilde şifrele
            'email'    => $email,
        ];

        if ($model->save($data)) {
            return redirect()->to('/login')->with('success', 'Kayıt başarılı! Giriş yapabilirsiniz.');
        } else {
            return redirect()->to('/signup')->with('error', 'Bir hata oluştu, lütfen tekrar deneyin.');
        }
    }
}