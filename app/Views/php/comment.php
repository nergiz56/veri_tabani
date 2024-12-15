<?php
namespace App\Models;

use CodeIgniter\Model;

class CommentModel extends Model
{
    protected $table = 'comment'; // Tablo adı
    protected $primaryKey = 'comment_id'; // Primary key
    protected $allowedFields = ['comment', 'user_id', 'post_id', 'crated_at']; // İzin verilen sütunlar
}