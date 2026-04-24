<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table            = 'products';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields = ['category_id', 'name', 'slug', 'description', 'main_image', 'specification'];

    // AKTIFKAN FITUR INI:
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Join dengan kategori untuk katalog
    public function getProductsWithCategory($categoryId = null, $keyword = null)
{
    $this->select('products.*, categories.name as category_name')
         ->join('categories', 'categories.id = products.category_id', 'left');

    if ($categoryId !== null) {
        $this->where('products.category_id', $categoryId);
    }

    if (!empty($keyword)) {
        $this->groupStart()
                ->like('products.name', $keyword)
                ->orLike('products.description', $keyword)
                ->groupEnd();
    }

    return $this->orderBy('products.id', 'DESC');
}

    
}