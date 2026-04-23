<?php
$db = \Config\Database::connect();
$settingsRaw = $db->table('settings')->get()->getResultArray();
$sidebarSettings = [];
foreach ($settingsRaw as $row) {
    $sidebarSettings[$row['key']] = $row['value'];
}
$businessName = $sidebarSettings['business_name'] ?? 'Fulki Hasya';
$webLogo = $sidebarSettings['web_logo'] ?? '';
?>
<nav id="sidebar">
    <div class="sidebar-brand">
        <div class="d-flex flex-column justify-content-center align-items-center text-center px-3">
            <?php if (!empty($webLogo)): ?>
                <img src="<?= base_url('uploads/media/' . $webLogo) ?>" alt="<?= $businessName ?>"
                    style="height: 50px; margin-bottom: 10px;">
            <?php else: ?>
                <i class="fas fa-heartbeat mb-2" style="font-size: 1.5rem;"></i>
            <?php endif; ?>
            <div class="fw-bold small" style="line-height: 1.2;">Admin
                <?= $businessName ?>
            </div>
        </div>
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
        <a href="<?= base_url('admin/partnerships') ?>"
            class="nav-link <?= (url_is('admin/partnerships*')) ? 'active' : '' ?>">
            <i class="fas fa-handshake"></i>
            <span>Pengajuan Mitra</span>
            <?php if ($newPartnerships > 0): ?>
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