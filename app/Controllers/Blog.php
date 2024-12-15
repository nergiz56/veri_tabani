<?php
namespace App\Controllers;
log_message('debug', 'Session Test: User ID -> ' . session()->get('user_id'));

use App\Models\PostModel;
use App\Models\CommentModel;
use App\Models\CategoryModel;
use App\Models\PostLikeModel;

class Blog extends BaseController
{

    public function view($post_id)
    {
        $postModel = new PostModel();
        $commentModel = new CommentModel();
        $postLikeModel = new PostLikeModel();

        // Gönderiyi al
        $post = $postModel->find($post_id);

        // Gönderiye ait yorumları al
        $comments = $commentModel->where('post_id', $post_id)->findAll() ?? [];

        // Gönderiye ait toplam beğeni sayısını al
        $likeCount = $postLikeModel->where('post_id', $post_id)->countAllResults();

        // Kullanıcı oturum kontrolü
        $logged = session()->get('logged_in') ?? false; // Kullanıcı oturumu kontrol et
        $user_id = session()->get('user_id'); // Oturumdaki kullanıcı ID'si

        // Eğer gönderi bulunamazsa blog sayfasına yönlendir
        if (!$post) {
            return redirect()->to('/blog');
        }

        // View'a veri gönder
        return view('blog_view', [
            'post' => $post,
            'comments' => $comments,
            'likeCount' => $likeCount,
            'logged' => $logged, // Oturum durumunu gönder
            'user_id' => $user_id, // Kullanıcı ID'sini gönder
            'postLikeModel' => $postLikeModel, // Modeli view'a gönderiyoruz
            'post_id' => $post_id, // View için gönderi ID'si
        ]);
    }



    public function index()
    {
        $session = session();
        $logged = $session->has('user_id') && $session->has('username');
        $user_id = $session->get('user_id') ?? null;

        $postModel = new PostModel();
        $categoryModel = new CategoryModel();
        $postLikeModel = new PostLikeModel();

        // Tüm postları ve kategorileri al
        $posts = $postModel->findAll();
        $categories = $categoryModel->findAll();

        return view('blog', [
            'posts' => $posts,
            'categories' => $categories,
            'logged' => $logged,
            'user_id' => $user_id,
            'postLikeModel' => $postLikeModel,
        ]);
    }


    public function toggleLike()
    {
        $postLikeModel = new \App\Models\PostLikeModel();

        $post_id = $this->request->getPost('post_id');
        $user_id = session()->get('user_id'); // Oturumdaki kullanıcı ID'si

        if (!$user_id) {
            return $this->response->setJSON(['success' => false, 'message' => 'Oturum açmanız gerekiyor.']);
        }

        // Kullanıcının gönderiyi beğenip beğenmediğini kontrol et
        $like = $postLikeModel->where('post_id', $post_id)->where('liked_by', $user_id)->first();

        if ($like) {
            // Beğeni varsa kaldır
            $postLikeModel->delete($like['like_id']);
            $likeCount = $postLikeModel->where('post_id', $post_id)->countAllResults();
            return $this->response->setJSON(['success' => true, 'likeCount' => $likeCount]);
        } else {
            // Beğeni yoksa ekle
            $postLikeModel->insert(['liked_by' => $user_id, 'post_id' => $post_id]);
            $likeCount = $postLikeModel->where('post_id', $post_id)->countAllResults();
            return $this->response->setJSON(['success' => true, 'likeCount' => $likeCount]);
        }
    }
    public function addComment()
    {
        $commentModel = new \App\Models\CommentModel();

        // Formdan gelen verileri al
        $post_id = $this->request->getPost('post_id');
        $comment = $this->request->getPost('comment');
        $user_id = session()->get('user_id'); // Kullanıcı ID'si oturumdan alınır

        // Kullanıcı oturumu kontrolü
        if (!$user_id) {
            $user_id = 0; // Anonim kullanıcılar için varsayılan değer
        }

        // Doğrulama
        if (!$post_id || !$comment) {
            return redirect()->back()->with('error', 'Yorum alanı boş bırakılamaz.');
        }

        // Yorum ekle
        $commentModel->save([
            'post_id' => $post_id,
            'user_id' => $user_id,
            'comment' => $comment,
            'crated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->back()->with('success', 'Yorum başarıyla eklendi.');
    }
}