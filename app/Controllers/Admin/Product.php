<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\ProductImageModel;

class Product extends BaseController
{
    protected $productModel;
    protected $categoryModel;
    protected $productImageModel;

    public function __construct()
    {
        $this->productModel      = new ProductModel();
        $this->categoryModel     = new CategoryModel();
        $this->productImageModel = new ProductImageModel();
    }

    // 1. Menampilkan Daftar Produk
    public function index()
    {
        $data = [
            'title'    => 'Kelola Produk',
            'products' => $this->productModel->getProductsWithCategory()->paginate(12, 'product'),
            'pager'    => $this->productModel->pager
        ];
        return view('admin/product/index', $data);
    }

    // 2. Menampilkan Form Tambah Produk
    public function new()
    {
        $data = [
            'title'      => 'Tambah Produk Baru',
            'categories' => $this->categoryModel->findAll() // Ambil kategori untuk dropdown
        ];
        return view('admin/product/create', $data);
    }

    // 3. Proses Simpan Produk & Upload Gambar
    public function store()
{
    $file = $this->request->getFile('main_image');
    $fileName = 'default.jpg';

    if ($file && $file->isValid()) {
        $newName = compress_to_webp($file, FCPATH . 'uploads/products/');
        if ($newName) {
            $fileName = $newName;
        }
    }

    $this->productModel->save([
        'category_id'   => $this->request->getPost('category_id'),
        'name'          => $this->request->getPost('name'),
        'slug'          => url_title($this->request->getPost('name'), '-', true),
        'description'   => $this->request->getPost('description'),
        'specification' => $this->request->getPost('specification'),
        'main_image'    => $fileName, // Simpan nama file cover
        'created_at'    => date('Y-m-d H:i:s'),
        'updated_at'    => date('Y-m-d H:i:s')
    ]);

    $productId = $this->productModel->getInsertID();

    // 2. Ambil semua file dari input 'product_images[]'
    if ($imagefiles = $this->request->getFiles()) {
        // Cek apakah ada file yang diunggah di array product_images
        if (isset($imagefiles['product_images'])) {
            foreach ($imagefiles['product_images'] as $img) {
                // Pastikan file valid
                if ($img->isValid()) {
                    $newName = compress_to_webp($img, FCPATH . 'uploads/products/');
                    
                    if ($newName) {
                        // Simpan ke tabel product_images
                        $this->productImageModel->save([
                            'product_id' => $productId,
                            'image'      => $newName
                        ]);
                    }
                }
            }
        }
    }

    return redirect()->to(base_url('admin/products'))->with('success', 'Produk berhasil ditambah');
}

    // 4. Proses Hapus Produk & Hapus File Gambar Fisik
    public function delete($id = null)
    {
        $product = $this->productModel->find($id);
        if (!$product) {
            return redirect()->to(base_url('admin/products'))->with('error', 'Produk tidak ditemukan');
        }

        $basePath = rtrim(FCPATH, DIRECTORY_SEPARATOR . '/') . '/uploads/products/';

        // 1. Hapus main_image dari server
        if ($product['main_image'] != 'default.jpg' && file_exists($basePath . $product['main_image'])) {
            unlink($basePath . $product['main_image']);
        }

        // 2. Cari gambar-gambar gallery milik produk ini
        $images = $this->productImageModel->where('product_id', $id)->findAll();
        
        // 3. Hapus file fisik gallery dari server
        foreach ($images as $img) {
            if (file_exists($basePath . $img['image'])) {
                unlink($basePath . $img['image']);
            }
        }

        // 4. Hapus data dari database
        $this->productImageModel->where('product_id', $id)->delete();
        $this->productModel->delete($id);

        return redirect()->to(base_url('admin/products'))->with('success', 'Produk beserta semua gambarnya berhasil dihapus!');
    }

    // 5. Menampilkan Form Edit Produk
    public function edit($id = null)
    {
        // Cari produk berdasarkan ID
        $product = $this->productModel->find($id);
        
        if (!$product) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Produk tidak ditemukan');
        }

        $data = [
            'title'      => 'Edit Produk',
            'product'    => $product,
            'categories' => $this->categoryModel->findAll(),
            'images'     => $this->productImageModel->getImagesByProduct($id) // Ambil foto-foto yang sudah ada
        ];

        return view('admin/product/edit', $data);
    }

    // 6. Menyimpan Perubahan Data Produk (Update)
    public function update($id)
{
    $product = $this->productModel->find($id);
    $file = $this->request->getFile('main_image');
    $fileName = $product['main_image']; // Gunakan foto lama sebagai default

    if ($file && $file->isValid()) {
        $basePath = rtrim(FCPATH, DIRECTORY_SEPARATOR . '/') . '/uploads/products/';
        $newName = compress_to_webp($file, $basePath);
        if ($newName) {
            // Hapus foto lama jika bukan default.jpg
            if ($fileName != 'default.jpg' && file_exists($basePath . $fileName)) {
                unlink($basePath . $fileName);
            }
            $fileName = $newName;
        }
    }

    $this->productModel->update($id, [
        'category_id'   => $this->request->getPost('category_id'),
        'name'          => $this->request->getPost('name'),
        'description'   => $this->request->getPost('description'),
        'specification' => $this->request->getPost('specification'),
        'main_image'    => $fileName,
        'created_at'    => date('Y-m-d H:i:s'),
        'updated_at'    => date('Y-m-d H:i:s')
    ]);

    if ($imagefiles = $this->request->getFiles()) {
        if (isset($imagefiles['product_images'])) {
            foreach ($imagefiles['product_images'] as $img) {
                if ($img->isValid()) {
                    $newName = compress_to_webp($img, FCPATH . 'uploads/products/');
                    
                    if ($newName) {
                        $this->productImageModel->save([
                            'product_id' => $id, // Gunakan $id yang sedang diedit
                            'image'      => $newName
                        ]);
                    }
                }
            }
        }
    }

    return redirect()->to(base_url('admin/products'))->with('success', 'Produk berhasil diupdate');
}

    // 7. Menghapus 1 Foto Spesifik (Via tombol hapus di halaman edit)
    public function deleteImage($id)
{
    // 1. Cari data gambar berdasarkan ID gambar
    $image = $this->productImageModel->find($id);

    if ($image) {
        $productId = $image['product_id'];
        $basePath = rtrim(FCPATH, DIRECTORY_SEPARATOR . '/') . '/uploads/products/';

        // 2. Hapus file fisik di folder uploads/products/
        if (file_exists($basePath . $image['image'])) {
            unlink($basePath . $image['image']);
        }

        // 3. Hapus data dari database
        $this->productImageModel->delete($id);

        // 4. REDIRECT BALIK ke halaman edit produk tersebut
        return redirect()->to(base_url('admin/products/' . $productId . '/edit'))
                         ->with('success', 'Foto berhasil dihapus.');
    } else {
        // Jika ID gambarnya tidak ada
        return redirect()->back()->with('error', 'Foto tidak ditemukan.');
    }
}

    // 8. Menampilkan Detail Produk (Read-Only Khusus Admin)
    public function show($id = null)
    {
        $product = $this->productModel->find($id);
        
        if (!$product) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Produk tidak ditemukan');
        }

        // Ambil nama kategori
        $category = $this->categoryModel->find($product['category_id']);

        $data = [
            'title'    => 'Detail Produk (Admin View)',
            'product'  => $product,
            'category' => $category,
            'images'   => $this->productImageModel->getImagesByProduct($id)
        ];

        return view('admin/product/show', $data);
    }
}