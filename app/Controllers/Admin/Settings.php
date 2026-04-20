<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SettingModel;

class Settings extends BaseController
{
    protected $settingModel;

    public function __construct()
    {
        // Inisialisasi model agar bisa dipakai di semua method dalam controller ini
        $this->settingModel = new SettingModel();
    }

    // 1. Menampilkan Halaman Form Pengaturan
    public function index()
    {
        // Ambil semua data setting dari database
        $settingsRaw = $this->settingModel->findAll();
        
        // Ubah format array agar mudah dipanggil di View (menjadi format key => value)
        $settingsData = [];
        foreach ($settingsRaw as $row) {
            $settingsData[$row['key']] = $row['value'];
        }

        $data = [
            'title'    => 'Pengaturan Website',
            'settings' => $settingsData
        ];

        return view('admin/setting/index', $data);
    }

    // 2. Menyimpan Pengaturan Teks (Judul, Subjudul, No WA)
    public function updateText()
    {
        $postData = $this->request->getPost();

        // Looping data post dan update ke database berdasarkan key
        foreach ($postData as $key => $value) {
            // Cek apakah key tersebut ada di database
            $exist = $this->settingModel->where('key', $key)->first();
            
            if ($exist) {
                // Jika ada, update
                $this->settingModel->update($exist['id'], ['value' => $value]);
            } else {
                // Jika belum ada (opsional), insert baru
                $this->settingModel->insert(['key' => $key, 'value' => $value]);
            }
        }

        return redirect()->to(base_url('admin/settings'))->with('success', 'Pengaturan teks berhasil diperbarui!');
    }

    // 3. Mengunggah dan Mengganti Video Hero
    public function updateHeroVideo()
{
    $file = $this->request->getFile('hero_video');

    // 1. Cek apakah ada file yang dikirim
    if ($file === null || !$file->isValid()) {
        // Jika file kosong atau melebihi limit server (post_max_size)
        return redirect()->back()->with('error', 'Gagal mengunggah. Pastikan file dipilih dan ukurannya tidak melebihi batas server (Maks. 40MB).');
    }

    // 2. Cek Ukuran File secara manual (dalam satuan bytes)
    // 40MB = 40 * 1024 * 1024 = 41.943.040 bytes
    $maxSize = 40 * 1024 * 1024; 
    if ($file->getSize() > $maxSize) {
        return redirect()->back()->with('error', 'Ukuran video terlalu besar! Maksimal yang diperbolehkan adalah 40MB.');
    }

    // 3. Cek Format File (Harus MP4)
    if ($file->getMimeType() !== 'video/mp4') {
        return redirect()->back()->with('error', 'Format file harus MP4.');
    }

    // 4. Proses Simpan jika lolos semua pengecekan
    if (!$file->hasMoved()) {
        $newName = $file->getRandomName();
        $file->move(FCPATH . 'uploads/media', $newName);
        
        $exist = $this->settingModel->where('key', 'hero_video')->first();
        
        if ($exist) {
            if (file_exists(FCPATH . 'uploads/media/' . $exist['value']) && $exist['value'] != '') {
                unlink(FCPATH . 'uploads/media/' . $exist['value']);
            }
            $this->settingModel->update($exist['id'], ['value' => $newName]);
        } else {
            $this->settingModel->insert(['key' => 'hero_video', 'value' => $newName]);
        }
        
        return redirect()->to(base_url('admin/settings'))->with('success', 'Video Hero berhasil diperbarui.');
    }

    return redirect()->back()->with('error', 'Terjadi kesalahan saat memproses video.');
}
}