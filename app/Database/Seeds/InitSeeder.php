<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InitSeeder extends Seeder
{
    public function run()
    {
        // 1. Data Admin Default
        $adminData = [
            'email'    => 'admin@fulkihasya.com',
            // Kita wajib melakukan hash pada password agar aman dan sesuai dengan verifikasi di Auth.php
            'password' => password_hash('admin123', PASSWORD_BCRYPT), 
        ];

        // Memasukkan data admin ke tabel 'admins'
        $this->db->table('admins')->insert($adminData);

        // 2. Data Pengaturan Default (Settings CMS)
        $settingsData = [
            [
                'key'   => 'wa_number',
                'value' => '6281234567890' // Ganti dengan nomor asli toko nantinya
            ],
            [
                'key'   => 'hero_title',
                'value' => 'Solusi Alat Kesehatan Terpercaya'
            ],
            [
                'key'   => 'hero_subtitle',
                'value' => 'Menyediakan berbagai alat medis dan laboratorium berkualitas untuk kebutuhan personal maupun instansi.'
            ],
            [
                'key'   => 'about_text',
                'value' => 'Toko Alat Kesehatan Fulki Hasya adalah penyedia alat kesehatan dan laboratorium terlengkap. Kami berkomitmen memberikan pelayanan terbaik, barang yang lengkap, dan harga yang terjangkau.'
            ],
            [
                'key'   => 'address',
                'value' => 'Jl. Jend. Sudirman, Mersi, Purwokerto' // Disesuaikan dengan lokasi di Google Maps
            ],
            [
                'key'   => 'hero_video',
                'value' => '' // Dibiarkan kosong dulu, nanti diisi via CMS admin
            ]
        ];

        // Memasukkan data pengaturan ke tabel 'settings'
        $this->db->table('settings')->insertBatch($settingsData);

        // 3. Data Kategori Default (Sebagai contoh agar katalog tidak kosong)
        $categoryData = [
            ['name' => 'Alat Medis Dasar'],
            ['name' => 'Peralatan Laboratorium'],
            ['name' => 'Bahan Habis Pakai'],
            ['name' => 'Alat Terapi & Rehabilitasi']
        ];

        // Memasukkan data kategori ke tabel 'categories'
        $this->db->table('categories')->insertBatch($categoryData);

        // Data password baru yang di-hash
        $data = [
            'password' => password_hash('admin123', PASSWORD_BCRYPT), 
        ];

        // Lakukan update berdasarkan email admin
        $this->db->table('admins')
                 ->where('email', 'admin@fulkihasya.com')
                 ->update($data);

        // Pesan sukses di terminal
        echo "✅ Berhasil! Password untuk admin@fulkihasya.com telah direset menjadi: admin123\n";
    }
}