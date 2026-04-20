<nav id="sidebar" class="shadow-sm">
    <div class="sidebar-brand">
        <i class="fas fa-heartbeat me-2"></i> Fulki Hasya
    </div>
    <div class="nav flex-column mt-3">
        <a href="<?= base_url('admin/dashboard') ?>" class="nav-link <?= (url_is('admin/dashboard*')) ? 'active' : '' ?>">
            <i class="fas fa-chart-line"></i> Dashboard
        </a>
        <a href="<?= base_url('admin/categories') ?>" class="nav-link <?= (url_is('admin/categories*')) ? 'active' : '' ?>">
            <i class="fas fa-tags"></i> Kategori
        </a>
        <a href="<?= base_url('admin/products') ?>" class="nav-link <?= (url_is('admin/products*')) ? 'active' : '' ?>">
            <i class="fas fa-box-open"></i> Katalog Produk
        </a>
        <a href="<?= base_url('admin/settings') ?>" class="nav-link <?= (url_is('admin/settings*')) ? 'active' : '' ?>">
            <i class="fas fa-cog"></i> Pengaturan Web
        </a>
        <hr class="border-light mx-3 opacity-25">
        <a href="<?= base_url('admin/logout') ?>" class="nav-link text-warning">
            <i class="fas fa-sign-out-alt"></i> Keluar
        </a>
    </div>
</nav>