<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\LeadModel;

class Dashboard extends BaseController
{
    public function index()
    {
        // Proteksi Halaman: Jika belum login, lempar kembali ke halaman login
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('admin/login'))->with('error', 'Silakan login terlebih dahulu.');
        }

        $productModel = new ProductModel();
        $categoryModel = new CategoryModel();
        $leadModel = new LeadModel();

        $data = [
            'title'          => 'Dashboard Admin - Fulki Hasya',
            'total_products' => $productModel->countAllResults(),
            'total_category' => $categoryModel->countAllResults(),
            'total_leads'    => $leadModel->countAllResults(),
            // Mengambil 5 leads terbaru menggunakan fungsi helper di LeadModel
            'recent_leads'   => $leadModel->getLatestLeads(5) 
        ];

        return view('admin/dashboard/index', $data);
    }
}