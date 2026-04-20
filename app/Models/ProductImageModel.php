<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductImageModel extends Model
{
    protected $table            = 'product_images';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $allowedFields    = ['product_id', 'image'];
    protected $useTimestamps    = false;

    // Helper untuk mengambil semua gambar milik 1 produk
    public function getImagesByProduct($productId)
    {
        return $this->where('product_id', $productId)->findAll();
    }
}