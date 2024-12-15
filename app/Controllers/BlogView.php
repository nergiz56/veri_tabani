<?php
namespace App\Controllers;

use App\Models\PostModel;
use App\Models\CommentModel;
use App\Models\CategoryModel;

class Blog extends BaseController
{


    public function view($post_id)
    {
        $postModel = new PostModel();
        $commentModel = new CommentModel();
        $categoryModel = new CategoryModel();
        $session = session(); // Oturum başlat

        $logged = $session->get('isLoggedIn'); // Kullanıcı oturum kontrolü

        $post = $postModel->select('post_id, post_title, post_text, category, crated_at')->find($post_id);
        $comments = $commentModel->where('post_id', $post_id)->findAll();
        $categories = $categoryModel->findAll();

        return view('blog_view', [
            'post' => $post,
            'comments' => $comments,
            'categories' => $categories,
            'logged' => $logged, // View'e aktar
        ]);
    }
}