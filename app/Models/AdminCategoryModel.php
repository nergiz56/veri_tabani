<?php
namespace App\Models;

use CodeIgniter\Model;

class AdminCategoryModel extends Model
{
    protected $table = 'category'; // Veritabanındaki tablo adı
    protected $primaryKey = 'id'; // Primary Key
    protected $allowedFields = ['category']; // Güncellenebilir alanlar
}