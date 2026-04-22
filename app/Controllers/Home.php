<?php

namespace App\Controllers;

use App\Models\SettingModel;
use App\Models\ProductModel;

class Home extends BaseController
{
    public function index()
    {
        $settingModel = new SettingModel();
        $productModel = new ProductModel();

        // Ambil semua settings
        $settingsRaw = $settingModel->findAll();
        $settings = [];
        foreach ($settingsRaw as $row) {
            $settings[$row['key']] = $row['value'];
        }

        $data = [
            'title'    => 'Fulki Hasya - Solusi Alat Kesehatan Terpercaya',
            'settings' => $settings,
            // Ambil 6 produk terbaru untuk ditampilkan di Home
            'featured_products' => $productModel->getProductsWithCategory()
        ];

        return view('frontend/home/index', $data);
    }

    // Tambahkan dua fungsi ini di bawah fungsi index()

public function about()
{
    $settingModel = new SettingModel();
    $data = [
        'title'    => 'Tentang Kami - Fulki Hasya',
        'settings' => $this->getSettings() // Pastikan fungsi getSettings() sudah ada di bawah
    ];
    return view('frontend/pages/about', $data);
}

public function contact()
{
    $data = [
        'title'    => 'Kontak Kami - Fulki Hasya',
        'settings' => $this->getSettings()
    ];
    return view('frontend/pages/contact', $data);
}

// Fungsi pembantu agar tidak repot ambil settings berulang kali
private function getSettings() {
    $settingModel = new SettingModel();
    $res = $settingModel->findAll();
    $settings = [];
    foreach ($res as $row) { $settings[$row['key']] = $row['value']; }
    return $settings;
}

public function submitPartnership()
{
    $partnershipModel = new \App\Models\PartnershipModel();

    $data = [
        'company_name' => $this->request->getPost('company_name'),
        'email'        => $this->request->getPost('email'),
        'phone'        => $this->request->getPost('phone'),
        'message'      => $this->request->getPost('message'),
    ];

    if ($partnershipModel->insert($data)) {
        return redirect()->to(base_url('kontak'))->with('success_partnership', 'Data berhasil dikirim');
    } else {
        return redirect()->to(base_url('kontak'))->withInput()->with('error', 'Gagal mengirim data. Silakan periksa kembali inputan Anda.');
    }
}
}