<?php
namespace App\Models;

use CodeIgniter\Model;

class AdminPostModel extends Model
{
    protected $table = 'post'; // Veritabanındaki tablo adı
    protected $primaryKey = 'post_id'; // Primary Key

    public function getPostsWithCategories()
    {
        return $this->select('post.post_id, post.post_title, category.category AS category_name, post.publish')
            ->join('category', 'category.id = post.category') // Kategorilerle birleştirme
            ->findAll();
    }
}