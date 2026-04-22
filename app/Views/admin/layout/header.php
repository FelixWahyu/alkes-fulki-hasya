<nav class="navbar navbar-expand-lg header-nav mb-4">
    <div class="container-fluid px-0">
        <button class="btn btn-light sidebar-toggle me-3 p-2" onclick="toggleSidebar()">
            <i class="fas fa-bars"></i>
        </button>
        
        <div class="d-none d-md-block">
            <h5 class="mb-0 fw-bold">Admin Panel</h5>
            <small class="text-muted">Selamat datang kembali, <?= session()->get('email') ?></small>
        </div>

        <div class="ms-auto d-flex align-items-center">
            <div class="dropdown">
                <button class="btn btn-white border-0 d-flex align-items-center p-2" type="button" data-bs-toggle="dropdown">
                    <div class="bg-light rounded-circle p-2 me-2 d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;">
                        <i class="fas fa-user text-primary"></i>
                    </div>
                    <span class="d-none d-sm-inline fw-medium"><?= explode('@', session()->get('email'))[0] ?></span>
                    <i class="fas fa-chevron-down ms-2 small text-muted"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 rounded-3 mt-2 py-2" style="min-width: 200px;">
                    <li class="px-3 py-2 border-bottom mb-2 d-block d-sm-none">
                        <small class="text-muted d-block">Terhubung sebagai:</small>
                        <span class="fw-bold"><?= session()->get('email') ?></span>
                    </li>
                    <li>
                        <a class="dropdown-item py-2 px-3" href="<?= base_url('admin/change-password') ?>">
                            <i class="fas fa-key me-2 text-muted"></i> Ubah Password
                        </a>
                    </li>
                    <li><hr class="dropdown-divider opacity-10"></li>
                    <li>
                        <a class="dropdown-item py-2 px-3 text-danger logout-btn" href="<?= base_url('admin/logout') ?>">
                            <i class="fas fa-sign-out-alt me-2"></i> Logout dari Sistem
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>