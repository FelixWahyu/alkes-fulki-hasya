<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\ProductImageModel;
use App\Models\SettingModel;

class Product extends BaseController
{
    protected $productModel;
    protected $categoryModel;
    protected $imageModel;
    protected $settingModel;

    public function __construct() {
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
        $this->imageModel = new ProductImageModel();
        $this->settingModel = new SettingModel();
    }

    // Halaman Daftar Produk (Katalog)
    public function index()
{
    $categorySlug = $this->request->getVar('kategori');
    
    // PASTIKAN BARIS INI ADA: Untuk mengambil semua kategori dari database
    $data['categories'] = $this->categoryModel->findAll();

    if ($categorySlug) {
        $category = $this->categoryModel->where('slug', $categorySlug)->first();
        if ($category) {
            $data['products'] = $this->productModel->getProductsWithCategory($category['id']);
        } else {
            $data['products'] = [];
        }
    } else {
        $data['products'] = $this->productModel->getProductsWithCategory();
    }

    $data['title']       = 'Katalog Alat Kesehatan - Fulki Hasya';
    $data['settings']    = $this->getSettings();
    $data['current_cat'] = $categorySlug;

    return view('frontend/product/index', $data);
}
    // Halaman Detail Produk
    public function detail($slug)
    {
        $product = $this->productModel->where('slug', $slug)->first();
        if (!$product) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        $data = [
            'title'    => $product['name'] . ' - Fulki Hasya',
            'product'  => $product,
            'category' => $this->categoryModel->find($product['category_id']),
            'images'   => $this->imageModel->getImagesByProduct($product['id']),
            'settings' => $this->getSettings(),
            'related'  => $this->productModel->where('category_id', $product['category_id'])
                                             ->where('id !=', $product['id'])
                                             ->findAll(4)
        ];

        return view('frontend/product/detail', $data);
    }

    private function getSettings() {
        $res = $this->settingModel->findAll();
        $settings = [];
        foreach ($res as $row) { $settings[$row['key']] = $row['value']; }
        return $settings;
    }

}