<?php

namespace App\Models;

use CodeIgniter\Model;

class LeadModel extends Model
{
    // Konfigurasi tabel dasar
    protected $table            = 'leads';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    
    // Format pengembalian data
    protected $returnType       = 'array';
    
    // Keamanan: field apa saja yang boleh diisi melalui controller
    protected $protectFields    = true;
    protected $allowedFields    = [
        'product_name', 
        'customer_name', 
        'email', 
        'phone', 
        'address', 
        'created_at'
    ];

    // Karena pada Controller Product.php kita sudah mengatur tanggal secara manual 
    // ('created_at' => date('Y-m-d H:i:s')), kita bisa set ini menjadi false.
    protected $useTimestamps    = false;

    /**
     * FUNGSI HELPER (Opsional)
     * Mengambil data leads terbaru untuk ditampilkan di Dashboard Admin.
     * Mengurutkan data dari yang paling baru masuk (descending).
     */
    public function getLatestLeads($limit = 10)
    {
        return $this->orderBy('created_at', 'DESC')->findAll($limit);
    }
}