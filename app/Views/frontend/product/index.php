<?= $this->extend('frontend/layout/template') ?>
<?= $this->section('content') ?>

<div class="bg-primary py-5 mt-5"> 
    <div class="container py-5 text-white text-center">
        <h1 class="fw-bold display-5">Katalog Produk</h1>
        <p class="lead opacity-75">Temukan alat kesehatan terbaik untuk kebutuhan Anda.</p>
    </div>
</div>

<div class="container py-5">
    <div class="row">
        <div class="col-lg-3 mb-4">
            <div class="card border-0 shadow-sm p-3 rounded-4">
                <h5 class="fw-bold mb-3 px-2">Kategori</h5>
                <div class="list-group list-group-flush">
    <a href="<?= base_url('katalog') ?>" class="list-group-item list-group-item-action border-0 rounded-3 mb-1 <?= (!$current_cat) ? 'active bg-primary text-white' : '' ?>"> 
        Semua Produk 
    </a>
    
    <?php if(!empty($categories)): ?>
        <?php foreach($categories as $cat): ?>
            <?php 
                // Paksa data jadi array agar aman
                $c = (array) $cat;
                $c_slug = $c['slug'] ?? '';
                $c_name = $c['name'] ?? 'Kategori';
            ?>
            <?php if(!empty($c_slug)): ?>
                <a href="<?= base_url('katalog?kategori=' . $c_slug) ?>" 
                   class="list-group-item list-group-item-action border-0 rounded-3 mb-1 <?= ($current_cat == $c_slug) ? 'active bg-primary text-white' : '' ?>">
                    <?= $c_name ?>
                </a>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="text-muted small px-2 mt-2">Belum ada kategori.</div>
    <?php endif; ?>
</div>
            </div>
        </div>

        <div class="col-lg-9">
            <div class="row g-4">
<?php if (!empty($products)): ?>
    <?php foreach ($products as $p): ?>
        <?php 
            $item = (array) $p; // Paksa jadi array
            
            // Logika aman: cari main_image, kalau kosong pakai default
            $p_img = 'default.jpg';
            if (!empty($item['main_image'])) {
                $p_img = $item['main_image'];
            }
        ?>
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden">
                <div class="position-relative">
                    <img src="<?= base_url('uploads/products/' . $p_img) ?>" 
                         class="card-img-top" 
                         style="height: 200px; object-fit: cover;"
                         onerror="this.src='<?= base_url('uploads/products/default.jpg') ?>'">
                </div>
                <div class="card-body p-4">
                    <h6 class="fw-bold"><?= $item['name'] ?? 'Produk' ?></h6>
                    <p class="text-muted small"><?= substr(strip_tags($item['description'] ?? ''), 0, 50) ?>...</p>
                    <a href="<?= base_url('produk/' . ($item['slug'] ?? '')) ?>" class="btn btn-primary w-100 rounded-pill">Detail</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?= $this->include('frontend/layout/_mitra') ?>
<?= $this->endSection() ?>