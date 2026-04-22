<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PartnershipModel;

class Partnership extends BaseController
{
    protected $partnershipModel;

    public function __construct()
    {
        $this->partnershipModel = new PartnershipModel();
    }

    public function index()
    {
        $data = [
            'title'        => 'Manajemen Pengajuan Mitra',
            'partnerships' => $this->partnershipModel->orderBy('created_at', 'DESC')->findAll()
        ];

        return view('admin/partnership/index', $data);
    }

    public function view($id)
    {
        $partnership = $this->partnershipModel->find($id);

        if (!$partnership) {
            return redirect()->to(base_url('admin/partnerships'))->with('error', 'Data tidak ditemukan.');
        }

        // Update status to read if it was new
        if ($partnership['status'] === 'new') {
            $this->partnershipModel->update($id, ['status' => 'read']);
        }

        $data = [
            'title'       => 'Detail Pengajuan Mitra',
            'partnership' => $partnership
        ];

        return view('admin/partnership/view', $data);
    }

    public function delete($id)
    {
        if ($this->partnershipModel->delete($id)) {
            return redirect()->to(base_url('admin/partnerships'))->with('success', 'Data pengajuan berhasil dihapus.');
        } else {
            return redirect()->to(base_url('admin/partnerships'))->with('error', 'Gagal menghapus data.');
        }
    }
}
