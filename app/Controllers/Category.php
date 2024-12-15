<?php

namespace App\Controllers;

use App\Models\CategoryModel;

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
}