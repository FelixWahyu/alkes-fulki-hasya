<nav id="sidebar">
    <div class="sidebar-brand">
        <i class="fas fa-heartbeat me-3"></i>
        <span>Fulki Hasya</span>
    </div>
    
    <div class="nav flex-column mt-3">
        <div class="px-4 mb-2">
            <small class="text-uppercase fw-bold text-muted" style="font-size: 0.65rem; letter-spacing: 0.05em;">Menu Utama</small>
        </div>
        
        <a href="<?= base_url('admin/dashboard') ?>" class="nav-link <?= (url_is('admin/dashboard*')) ? 'active' : '' ?>">
            <i class="fas fa-chart-pie"></i> 
            <span>Dashboard</span>
        </a>
        
        <a href="<?= base_url('admin/categories') ?>" class="nav-link <?= (url_is('admin/categories*')) ? 'active' : '' ?>">
            <i class="fas fa-layer-group"></i> 
            <span>Kategori</span>
        </a>
        
        <a href="<?= base_url('admin/products') ?>" class="nav-link <?= (url_is('admin/products*')) ? 'active' : '' ?>">
            <i class="fas fa-box"></i> 
            <span>Katalog Produk</span>
        </a>
        
        <div class="px-4 mt-4 mb-2">
            <small class="text-uppercase fw-bold text-muted" style="font-size: 0.65rem; letter-spacing: 0.05em;">Sistem</small>
        </div>

        <a href="<?= base_url('admin/settings') ?>" class="nav-link <?= (url_is('admin/settings*')) ? 'active' : '' ?>">
            <i class="fas fa-sliders-h"></i> 
            <span>Pengaturan Web</span>
        </a>
        
        <hr class="mx-4 my-3 opacity-10">
        
        <a href="<?= base_url('admin/logout') ?>" class="nav-link text-danger mt-auto">
            <i class="fas fa-power-off"></i> 
            <span>Keluar</span>
        </a>
    </div>
</nav>