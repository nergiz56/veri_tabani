<?php
namespace App\Controllers;

use App\Models\PostModel;

class AdminPost extends BaseController
{
    public function index()
    {
        $postModel = new PostModel();
        $data['posts'] = $postModel->findAll(); // Tüm postları getir

        return view('admin/posts', $data); // Görünüm dosyasını yükle
    }

    public function add()
    {
        return view('admin/post-add'); // Yeni post ekleme sayfası
    }

    public function save()
    {
        $postModel = new PostModel();
        $file = $this->request->getFile('cover_image'); // Dosyayı al
        $coverUrl = 'default.jpg'; // Varsayılan görsel

        // Dosya yükleme kontrolü
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('upload/blog/', $newName); // Görseli kaydet
            $coverUrl = 'public/upload/blog/' . $newName; // Dosya yolu
        }

        $data = [
            'post_title' => $this->request->getPost('post_title'),
            'post_text'  => $this->request->getPost('post_text'),
            'category'   => $this->request->getPost('category'),
            'publish'    => $this->request->getPost('publish') ? 1 : 0,
            'cover_url'  => $coverUrl, // Yüklenen görselin yolu
        ];

        $postModel->save($data);
        return redirect()->to('/admin/posts')->with('success', 'Post added successfully!');
    }

    public function delete($id)
    {
        $postModel = new PostModel();
        $postModel->delete($id);
        return redirect()->to('/admin/posts')->with('success', 'Post deleted successfully!');
    }
}