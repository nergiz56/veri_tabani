<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Home extends Controller
{
    public function index()
    {
        // index.php view dosyasını yükle
        return view('index');
    }

    public function about()
    {
        // about.php view dosyasını yükle
        return view('about');
    }

    public function marketing()
    {
        // marketing.php view dosyasını yükle
        return view('marketing');
    }

    public function blog()
    {
        // blog.php view dosyasını yükle
        return view('blog');
    }

    public function contact()
    {
        // contact.php view dosyasını yükle
        return view('contact');
    }
    public function register()
    {
        // about.php view dosyasını yükle
        return view('register');
    }
    public function login()
    {
        // about.php view dosyasını yükle
        return view('login');
    }
}