<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminPostModel;

class AdminPost extends BaseController
{
    public function index()
    {
        $model = new AdminPostModel();
        $data['posts'] = $model->getPostsWithCategories(); // Verileri alıyoruz

        return view('admin/post', $data); // View'e yönlendirme
    }
}