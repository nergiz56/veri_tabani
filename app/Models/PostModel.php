<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table = 'post';
    protected $primaryKey = 'post_id';
    protected $allowedFields = ['post_title', 'post_text', 'category', 'publish', 'cover_url', 'crated_at'];


    public function getAllPosts()
    {
        return $this->where('publish', 1)->findAll();
    }
}