<?php
namespace App\Models;

use CodeIgniter\Model;

class CommentModel extends Model
{
    protected $table = 'comment';
    protected $primaryKey = 'comment_id';
    protected $allowedFields = ['comment', 'user_id', 'post_id', 'crated_at']; // Düzeltilmiş alan adı
    protected $useTimestamps = false;
    // Otomatik zaman damgası kapatıldı
}