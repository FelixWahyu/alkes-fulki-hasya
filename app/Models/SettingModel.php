<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingModel extends Model
{
    // Konfigurasi tabel dasar
    protected $table            = 'settings';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    
    // Format pengembalian data
    protected $returnType       = 'array';
    
    // Keamanan: field apa saja yang boleh diisi/diubah melalui controller
    protected $protectFields    = true;
    protected $allowedFields    = ['key', 'value'];

    // Timestamps dimatikan karena pada migration tabel settings kita tidak menggunakan created_at/updated_at
    protected $useTimestamps    = false;

    /**
     * FUNGSI HELPER (Opsional tapi sangat berguna)
     * Mengambil satu nilai spesifik berdasarkan 'key'.
     * Sangat membantu jika Anda hanya ingin memanggil 1 data di Controller/View tertentu.
     * * Contoh penggunaan di Controller:
     * $noWa = $settingModel->getValue('wa_number');
     */
    public function getValue($key)
    {
        $result = $this->where('key', $key)->first();
        return $result ? $result['value'] : null;
    }
}