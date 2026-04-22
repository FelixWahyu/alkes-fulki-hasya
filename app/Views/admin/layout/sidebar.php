<nav id="sidebar">
    <div class="sidebar-brand">
        <i class="fas fa-heartbeat me-3"></i>
        <span>Fulki Hasya</span>
    </div>

    <div class="nav flex-column mt-3">
        <div class="px-4 mb-2">
            <small class="text-uppercase fw-bold text-muted" style="font-size: 0.65rem; letter-spacing: 0.05em;">Menu
                Utama</small>
        </div>

        <a href="<?= base_url('admin/dashboard') ?>"
            class="nav-link <?= (url_is('admin/dashboard*')) ? 'active' : '' ?>">
            <i class="fas fa-chart-pie"></i>
            <span>Dashboard</span>
        </a>

        <a href="<?= base_url('admin/categories') ?>"
            class="nav-link <?= (url_is('admin/categories*')) ? 'active' : '' ?>">
            <i class="fas fa-layer-group"></i>
            <span>Kategori</span>
        </a>

        <a href="<?= base_url('admin/products') ?>" class="nav-link <?= (url_is('admin/products*')) ? 'active' : '' ?>">
            <i class="fas fa-box"></i>
            <span>Katalog Produk</span>
        </a>

        <?php 
            $newPartnerships = (new \App\Models\PartnershipModel())->where('status', 'new')->countAllResults();
        ?>
        <a href="<?= base_url('admin/partnerships') ?>" class="nav-link <?= (url_is('admin/partnerships*')) ? 'active' : '' ?>">
            <i class="fas fa-handshake"></i>
            <span>Pengajuan Mitra</span>
            <?php if($newPartnerships > 0): ?>
                <span class="badge bg-danger rounded-pill ms-auto" style="font-size: 0.6rem;"><?= $newPartnerships ?></span>
            <?php endif; ?>
        </a>

        <div class="px-4 mt-4 mb-2">
            <small class="text-uppercase fw-bold text-muted"
                style="font-size: 0.65rem; letter-spacing: 0.05em;">Sistem</small>
        </div>

        <a href="<?= base_url('admin/settings') ?>" class="nav-link <?= (url_is('admin/settings*')) ? 'active' : '' ?>">
            <i class="fas fa-sliders-h"></i>
            <span>Pengaturan Web</span>
        </a>
    </div>
</nav>