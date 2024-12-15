<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminCategoryModel;

class AdminCategory extends BaseController
{
    public function index()
    {
        $model = new AdminCategoryModel();
        $data['categories'] = $model->findAll(); // Tüm kategorileri getir

        return view('Admin/category', $data); // Admin/category view'ine yönlendir
    }

    public function delete($id)
    {
        $model = new AdminCategoryModel();
        $model->delete($id); // ID ile kategori sil

        return redirect()->to('/admin/categories')->with('success', 'Category deleted successfully.');
    }
}