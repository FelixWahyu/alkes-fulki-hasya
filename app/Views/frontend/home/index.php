<?= $this->extend('frontend/layout/template') ?>
<?= $this->section('content') ?>

<section class="hero-section position-relative vh-100 d-flex align-items-center overflow-hidden">
    <video autoplay muted loop playsinline class="position-absolute top-50 start-50 translate-middle min-vw-100 min-vh-100" style="object-fit: cover; z-index: -2;">
        <?php if(!empty($settings['hero_video'])): ?>
            <source src="<?= base_url('uploads/media/' . $settings['hero_video']) ?>" type="video/mp4">
        <?php endif; ?>
    </video>
    <div class="overlay position-absolute w-100 h-100 bg-dark opacity-50" style="z-index: -1;"></div>

    <div class="container text-center text-white">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <h1 class="display-3 fw-bold mb-3"><?= $settings['hero_title'] ?? 'Solusi Alat Kesehatan Terpercaya' ?></h1>
                <p class="lead mb-5 opacity-90"><?= $settings['hero_subtitle'] ?? 'Menyediakan peralatan medis berkualitas untuk kebutuhan rumah sakit dan pribadi.' ?></p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="<?= base_url('katalog') ?>" class="btn btn-primary btn-lg px-5 shadow">Lihat Katalog</a>
                    <a href="#tentang" class="btn btn-outline-light btn-lg px-5">Tentang Kami</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="tentang" class="py-5">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-md-6 mb-4 mb-md-0">
                <img src="https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?auto=format&fit=crop&q=80&w=800" class="img-fluid rounded-4 shadow-lg" alt="Alkes Fulki Hasya">
            </div>
            <div class="col-md-6 ps-lg-5">
                <h6 class="text-primary fw-bold text-uppercase">Tentang Kami</h6>
                <h2 class="fw-bold mb-4">Mitra Terbaik Kesehatan Anda</h2>
                <p class="text-muted fs-5 mb-4"><?= $settings['about_text'] ?? '' ?></p>
                <div class="row g-3">
                    <div class="col-6"><i class="fas fa-check-circle text-success me-2"></i> Barang Lengkap</div>
                    <div class="col-6"><i class="fas fa-check-circle text-success me-2"></i> Harga Kompetitif</div>
                    <div class="col-6"><i class="fas fa-check-circle text-success me-2"></i> Terpercaya</div>
                    <div class="col-6"><i class="fas fa-check-circle text-success me-2"></i> Layanan Cepat</div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-light py-5">
    <div class="container py-5 text-center">
        <h2 class="fw-bold mb-5">Produk Unggulan</h2>
        <div class="row g-4">
    <?php if (!empty($featured_products)): ?>
        <?php foreach ($featured_products as $p): ?>
            <?php 
                // 1. Paksa data menjadi array agar aman
                $item = (array) $p; 
                
                // 2. Logika aman: ambil main_image, kalau kosong pakai default
                $p_img = 'default.jpg';
                if (!empty($item['main_image'])) {
                    $p_img = $item['main_image'];
                }
            ?>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden text-center">
                    
                    <img src="<?= base_url('uploads/products/' . $p_img) ?>" 
                         class="card-img-top w-100" 
                         style="height: 250px; object-fit: cover;"
                         alt="<?= $item['name'] ?? 'Produk' ?>"
                         onerror="this.src='<?= base_url('uploads/products/default.jpg') ?>'">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-2"><?= $item['name'] ?? 'Nama Produk' ?></h5>
                        <p class="text-muted small mb-4">
                            <?= substr(strip_tags($item['description'] ?? ''), 0, 60) ?>...
                        </p>
                        <a href="<?= base_url('produk/' . ($item['slug'] ?? '')) ?>" class="btn btn-outline-primary w-100 rounded-pill">
                            Detail Produk
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="col-12 text-center text-muted py-5">
            Belum ada produk unggulan.
        </div>
    <?php endif; ?>
</div>
        <div class="mt-5">
            <a href="<?= base_url('katalog') ?>" class="text-decoration-none fw-bold">Lihat Semua Produk <i class="fas fa-arrow-right ms-2"></i></a>
        </div>
    </div>
</section>
<?= $this->include('frontend/layout/_mitra') ?>
<?= $this->endSection() ?>