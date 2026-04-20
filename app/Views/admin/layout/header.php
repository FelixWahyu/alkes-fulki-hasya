<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4 py-3 px-4">
    <div class="container-fluid">
        <span class="text-muted small">Halo Admin, Selamat bekerja kembali!</span>
        <div class="dropdown">
    <button class="btn btn-light btn-sm dropdown-toggle border-0" type="button" data-bs-toggle="dropdown">
        <i class="fas fa-user-circle me-1"></i> <?= session()->get('email') ?>
    </button>
    <ul class="dropdown-menu dropdown-menu-end shadow border-0">
        <li>
            <a class="dropdown-item" href="<?= base_url('admin/change-password') ?>">
                <i class="fas fa-key me-2 text-muted"></i> Ubah Password
            </a>
        </li>
        <li><hr class="dropdown-divider"></li>
        <li>
            <a class="dropdown-item text-danger" href="<?= base_url('admin/logout') ?>">
                <i class="fas fa-sign-out-alt me-2"></i> Logout
            </a>
        </li>
    </ul>
</div>
    </div>
</nav>