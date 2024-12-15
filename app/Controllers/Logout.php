<?php

namespace App\Controllers;

class Logout extends BaseController
{
    public function index()
    {
        // Oturumdaki tüm verileri siler
        session()->destroy(); // Tüm oturum verilerini temizle
        return redirect()->to('/login'); // L

        // Logout işlemi sonrası view sayfasını gösterir
        return view('logout');
    }
}