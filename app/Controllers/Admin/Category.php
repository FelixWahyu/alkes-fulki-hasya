<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CategoryModel;

class Category extends BaseController
{
    protected $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
    }

    // 1. Menampilkan Halaman Daftar Kategori
    public function index()
    {
        $data = [
            'title'      => 'Kelola Kategori Produk',
            'categories' => $this->categoryModel->findAll() // Ambil semua data kategori
        ];

        return view('admin/category/index', $data);
    }

// 2. Menyimpan Kategori Baru (Create)
public function create()
{
    // 1. Tangkap dulu nama yang diinput
    $name = $this->request->getPost('name');
    
    // 2. Buat slug dari nama tersebut
    $slug = url_title($name, '-', true);

    // 3. Simpan KEDUANYA ke database
    $this->categoryModel->insert([
        'name' => $name,
        'slug' => $slug // <--- Ini yang tadi tertinggal
    ]);

    return redirect()->to(base_url('admin/categories'))->with('success', 'Kategori baru berhasil ditambahkan!');
}

// 3. Mengubah Kategori (Update)
public function update($id = null)
{
    // Sama seperti create, kita tangkap nama dan buat slug baru
    $name = $this->request->getPost('name');
    $slug = url_title($name, '-', true);

    $this->categoryModel->update($id, [
        'name' => $name,
        'slug' => $slug // <--- Pastikan saat di-edit, slug-nya juga ikut ter-update
    ]);

    return redirect()->to(base_url('admin/categories'))->with('success', 'Data kategori berhasil diperbarui!');
}

    // 4. Menghapus Kategori (Delete)
    public function delete($id = null)
    {
        // Pengecekan opsional: Pastikan kategori tidak sedang dipakai oleh produk sebelum dihapus
        // (Bisa ditambahkan logika pengecekannya di sini nanti jika diperlukan)
        
        $this->categoryModel->delete($id);

        return redirect()->to(base_url('admin/categories'))->with('success', 'Kategori berhasil dihapus!');
    }
}