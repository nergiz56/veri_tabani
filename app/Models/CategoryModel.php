<?php
namespace App\Models;
use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'id';
   protected $allowedFields = ['category'];
    public function getAllCategories()
    {
        return $this->findAll(); // tüm kategorileri almak için
    }
}
