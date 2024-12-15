<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CommentModel;

class AdminComment extends BaseController
{
    public function index()
    {
        $commentModel = new CommentModel();
        $comments = $commentModel->findAll(); // Tüm yorumları al

        return view('Admin/comment', [ // Admin klasöründeki view dosyasını çağır
            'comments' => $comments,
        ]);
    }

    public function delete($id)
    {
        $commentModel = new CommentModel();
        if ($commentModel->delete($id)) {
            return redirect()->to('/admin/comments')->with('success', 'Comment deleted successfully.');
        }

        return redirect()->to('/admin/comments')->with('error', 'Failed to delete comment.');
    }
}