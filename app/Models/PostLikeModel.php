<?php

namespace App\Models;

use CodeIgniter\Model;

class PostLikeModel extends Model
{
    protected $table = 'post_like';
    protected $primaryKey = 'like_id';
    protected $allowedFields = ['post_id', 'user_id'];  // İzin verilen alanlar

    /**
     * Kullanıcı bir gönderiyi beğenmiş mi kontrol eder.
     */
    public function isLikedByUser($postId, $userId)
    {
        return $this->where(['post_id' => $postId, 'liked_by' => $userId])->first() !== null;
    }

    /**
     * Gönderiye ait toplam beğeni sayısını döndürür.
     */
    public function getLikeCount($postId)
    {
        return $this->where('post_id', $postId)->countAllResults();
    }

    /**
     * Beğeni ekler veya kaldırır.
     */
    public function toggleLike($postId, $userId)
    {
        if ($this->isLikedByUser($postId, $userId)) {
            // Beğeni kaldır
            return $this->where(['post_id' => $postId, 'liked_by' => $userId])->delete();
        } else {
            // Beğeni ekle
            return $this->insert(['liked_by' => $userId, 'post_id' => $postId]);
        }
    }
}