
<?php
namespace App\Controllers;

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

        // Fetch post details
        $post = $postModel->find($post_id);
        $comments = $commentModel->where('post_id', $post_id)->findAll();
        $likeCount = $postLikeModel->where('post_id', $post_id)->countAllResults();

        // Session data for logged user
        $logged = session()->get('logged_in') ?? false;
        $user_id = session()->get('user_id');

        if (!$post) {
            return redirect()->to('/blog');
        }

        return view('blog_view', [
            'post' => $post,
            'comments' => $comments,
            'likeCount' => $likeCount,
            'logged' => $logged,
            'user_id' => $user_id,
            'postLikeModel' => $postLikeModel,
            'post_id' => $post_id,
        ]);
    }

    public function toggleLike()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid request']);
        }

        $user_id = session()->get('user_id');
        if (!$user_id) {
            return $this->response->setJSON(['success' => false, 'message' => 'User not logged in']);
        }

        $post_id = $this->request->getPost('post_id');
        if (empty($post_id)) {
            return $this->response->setJSON(['success' => false, 'message' => 'Post ID is required']);
        }

        $postLikeModel = new PostLikeModel();
        $like = $postLikeModel->where('post_id', $post_id)->where('user_id', $user_id)->first();

        if ($like) {
            $postLikeModel->delete($like['like_id']);
        } else {
            $postLikeModel->save(['post_id' => $post_id, 'user_id' => $user_id]);
        }

        $likeCount = $postLikeModel->where('post_id', $post_id)->countAllResults();

        return $this->response->setJSON(['success' => true, 'likeCount' => $likeCount]);
    }
}
