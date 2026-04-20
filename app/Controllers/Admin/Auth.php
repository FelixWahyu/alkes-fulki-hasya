<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class Auth extends BaseController
{
    public function login()
    {
        // Jika sudah login, langsung arahkan ke dashboard
        if (session()->get('isLoggedIn')) {
            return redirect()->to(base_url('admin/dashboard'));
        }
        
        return view('admin/login'); // Halaman form login
    }

    public function process()
    {
        $session = session();
        $adminModel = new AdminModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $admin = $adminModel->where('email', $email)->first();

        if ($admin) {
            // Verifikasi password (pastikan saat insert di database menggunakan password_hash)
            if (password_verify($password, $admin['password'])) {
                $sessionData = [
                    'id'         => $admin['id'],
                    'email'      => $admin['email'],
                    'isLoggedIn' => true
                ];
                $session->set($sessionData);
                return redirect()->to(base_url('admin/dashboard'));
            } else {
                $session->setFlashdata('error', 'Password salah.');
                return redirect()->back();
            }
        } else {
            $session->setFlashdata('error', 'Email tidak ditemukan.');
            return redirect()->back();
        }
    }

    // Menampilkan halaman form ubah password
    public function changePassword()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('admin/login'));
        }

        $data = [
            'title' => 'Ubah Password Admin'
        ];

        return view('admin/auth/change_password', $data);
    }

    // Memproses update password baru
    public function updatePassword()
    {
        $adminModel = new AdminModel();
        $adminId = session()->get('id');
        $admin = $adminModel->find($adminId);

        $currentPassword = $this->request->getPost('current_password');
        $newPassword = $this->request->getPost('new_password');
        $confirmPassword = $this->request->getPost('confirm_password');

        // 1. Validasi: Apakah password lama benar?
        if (!password_verify($currentPassword, $admin['password'])) {
            return redirect()->back()->with('error', 'Password lama Anda salah.');
        }

        // 2. Validasi: Apakah password baru dan konfirmasi cocok?
        if ($newPassword !== $confirmPassword) {
            return redirect()->back()->with('error', 'Konfirmasi password baru tidak cocok.');
        }

        // 3. Update Password
        $adminModel->update($adminId, [
            'password' => password_hash($newPassword, PASSWORD_BCRYPT)
        ]);

        return redirect()->to(base_url('admin/dashboard'))->with('success', 'Password berhasil diperbarui.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('admin/login'));
    }
}