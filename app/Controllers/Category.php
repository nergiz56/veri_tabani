<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use CodeIgniter\Database\Database;

class Category extends BaseController
{
    public function index()
    {
        $categoryModel = new CategoryModel();

        // Kategorileri al
        $categories = $categoryModel->getAllCategories();

        // Verileri View'e gönder
        return view('category', ['categories' => $categories]);
    }
    public function view($id)
    {
        $categoryModel = new \App\Models\CategoryModel();
        $categories = $categoryModel->findAll(); // Tüm kategorileri al

        $postModel = new \App\Models\PostModel();

        // Kategoriye ait postları al
        $posts = $postModel->where('category', $id)->findAll();

        return view('category_view', [
            'categories' => $categories, // Kategorileri view'a gönder
            'posts' => $posts, // Postları view'a gönder
        ]);
    }
    public function posts()
    {
        $category_id = $this->request->getGet('category_id');
        $postModel = new \App\Models\PostModel();

        // Kategoriye ait postları al
        $posts = $postModel->where('category', $category_id)->findAll();

        // Sadece postların listesini döndür
        return view('partials/posts_list', ['posts' => $posts]);
    }
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect(); // Database bağlantısını kurar
    }
}