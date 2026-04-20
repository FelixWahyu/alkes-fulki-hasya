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
    public function getProductsWithCategory($categoryId = null)
{
    // Siapkan query dasar dengan JOIN agar nama kategori tetap terbawa
    $builder = $this->select('products.*, categories.name as category_name')
                    ->join('categories', 'categories.id = products.category_id');

    // Jika ada ID Kategori yang dikirim (saat filter ditekan), tambahkan filter WHERE
    if ($categoryId !== null) {
        $builder->where('products.category_id', $categoryId);
    }

    return $builder->orderBy('products.id', 'DESC')->findAll();
}

    
}