<?= $this->extend('frontend/layout/template') ?>
<?= $this->section('content') ?>

<!-- ============================================================
     HERO SECTION
     ============================================================ -->
<section class="hero-section" aria-label="Hero">
    <!-- Video Background -->
    <div class="hero-media">
        <?php if (!empty($settings['hero_video'])): ?>
            <video autoplay muted loop playsinline class="hero-video" aria-hidden="true">
                <source src="<?= base_url('uploads/media/' . $settings['hero_video']) ?>" type="video/mp4">
            </video>
        <?php else: ?>
            <div class="hero-bg-gradient" aria-hidden="true"></div>
        <?php endif; ?>
        <div class="hero-overlay" aria-hidden="true"></div>
    </div>

    <!-- Content -->
    <div class="container hero-content">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="hero-badge">
                    <i class="fas fa-shield-check me-1"></i> Bersertifikat & Terpercaya
                </div>
                <h1 class="hero-title"><?= $settings['hero_title'] ?? 'Solusi Alat Kesehatan Terpercaya' ?></h1>
                <p class="hero-subtitle"><?= $settings['hero_subtitle'] ?? 'Menyediakan peralatan medis berkualitas untuk kebutuhan rumah sakit, klinik, dan pribadi.' ?></p>
                <div class="d-flex flex-wrap justify-content-center gap-3">
                    <a href="<?= base_url('katalog') ?>" class="btn-fh-primary px-4 py-3">
                        <i class="fas fa-boxes-stacked me-2"></i>Lihat Katalog
                    </a>
                    <a href="<?= base_url('tentang-kami') ?>" class="btn-fh-outline px-4 py-3">
                        Tentang Kami <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="hero-scroll-indicator">
            <span>Scroll</span>
            <i class="fas fa-arrow-down"></i>
        </div>
    </div>
</section>

<!-- ============================================================
     STATS SECTION
     ============================================================ -->
<section class="stats-section">
    <div class="container">
        <div class="stats-card reveal">
            <div class="row g-0">
                <div class="col-6 col-md-3 stat-item">
                    <div class="stat-icon"><i class="fas fa-boxes-stacked"></i></div>
                    <div class="stat-number" data-target="200" data-suffix="+">0</div>
                    <div class="stat-label">Jenis Produk</div>
                </div>
                <div class="col-6 col-md-3 stat-item">
                    <div class="stat-icon"><i class="fas fa-handshake"></i></div>
                    <div class="stat-number" data-target="50" data-suffix="+">0</div>
                    <div class="stat-label">Mitra Terpercaya</div>
                </div>
                <div class="col-6 col-md-3 stat-item">
                    <div class="stat-icon"><i class="fas fa-users"></i></div>
                    <div class="stat-number" data-target="1000" data-suffix="+">0</div>
                    <div class="stat-label">Pelanggan Puas</div>
                </div>
                <div class="col-6 col-md-3 stat-item">
                    <div class="stat-icon"><i class="fas fa-calendar-check"></i></div>
                    <div class="stat-number" data-target="5" data-suffix=" Thn">0</div>
                    <div class="stat-label">Pengalaman</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     ABOUT SECTION
     ============================================================ -->
<section id="tentang" class="section-fh">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 reveal">
                <div class="about-img-wrap">
                    <img src="https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?auto=format&fit=crop&q=80&w=900"
                         class="about-img-main"
                         alt="Tim Fulki Hasya melayani kebutuhan alat kesehatan"
                         loading="lazy">
                    <div class="about-badge-card">
                        <i class="fas fa-award"></i>
                        <div>
                            <strong>Produk Bersertifikat</strong>
                            <span>ISO & BPOM</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 ps-lg-5 reveal reveal-delay-2">
                <span class="section-label">
                    <i class="fas fa-heartbeat"></i> Tentang Kami
                </span>
                <h2 class="section-title">Mitra Terbaik untuk<br>Kesehatan Anda</h2>
                <div class="divider-fh"></div>
                <p style="color:var(--fh-text-muted); font-size:1.05rem; line-height:1.8; margin-bottom:1.5rem;">
                    <?= $settings['about_text'] ?? 'Fulki Hasya hadir sebagai penyedia alat kesehatan terpercaya yang menjamin kualitas dan keamanan setiap produk untuk mendukung kesehatan masyarakat Indonesia.' ?>
                </p>

                <div class="about-checklist">
                    <?php
                    $checks = [
                        ['icon' => 'fa-check-circle', 'text' => 'Produk Lengkap & Bergaransi'],
                        ['icon' => 'fa-check-circle', 'text' => 'Harga Kompetitif & Transparan'],
                        ['icon' => 'fa-check-circle', 'text' => 'Pengiriman Cepat & Aman'],
                        ['icon' => 'fa-check-circle', 'text' => 'Layanan Purna Jual Profesional'],
                    ];
                    foreach ($checks as $c): ?>
                    <div class="check-item">
                        <i class="fas <?= $c['icon'] ?>"></i>
                        <span><?= $c['text'] ?></span>
                    </div>
                    <?php endforeach; ?>
                </div>

                <a href="<?= base_url('tentang-kami') ?>" class="btn-fh-light mt-4 d-inline-flex align-items-center gap-2">
                    Pelajari Lebih Lanjut <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     FEATURED PRODUCTS
     ============================================================ -->
<section class="section-fh section-bg-light">
    <div class="container">
        <div class="text-center mb-5 reveal">
            <span class="section-label"><i class="fas fa-star"></i> Produk Unggulan</span>
            <h2 class="section-title">Pilihan Terbaik untuk Anda</h2>
            <p style="color:var(--fh-text-muted); max-width:520px; margin:0 auto;">
                Produk alat kesehatan kami dipilih secara ketat untuk memastikan kualitas dan keandalan terbaik.
            </p>
        </div>

        <div class="row g-4">
            <?php if (!empty($featured_products)): ?>
                <?php foreach ($featured_products as $i => $p):
                    $item  = (array) $p;
                    $p_img = $item['main_image'] ?? 'default.jpg';
                ?>
                <div class="col-md-6 col-lg-4 reveal reveal-delay-<?= min($i + 1, 3) ?>">
                    <article class="product-card card-fh">
                        <a href="<?= base_url('produk/' . ($item['slug'] ?? '')) ?>" class="product-img-link">
                            <div class="product-img-wrap">
                                <img src="<?= base_url('uploads/products/' . $p_img) ?>"
                                     class="product-img"
                                     alt="<?= htmlspecialchars($item['name'] ?? 'Produk Alkes') ?>"
                                     loading="lazy"
                                     onerror="this.src='<?= base_url('uploads/products/default.jpg') ?>'">
                                <div class="product-overlay">
                                    <span class="product-overlay-btn">
                                        <i class="fas fa-eye me-2"></i>Lihat Detail
                                    </span>
                                </div>
                            </div>
                        </a>
                        <div class="product-body">
                            <?php if (!empty($item['category_name'])): ?>
                                <span class="badge-fh mb-2 d-inline-block"><?= htmlspecialchars($item['category_name']) ?></span>
                            <?php endif; ?>
                            <h3 class="product-title"><?= htmlspecialchars($item['name'] ?? 'Nama Produk') ?></h3>
                            <p class="product-desc">
                                <?= htmlspecialchars(substr(strip_tags($item['description'] ?? ''), 0, 80)) ?>...
                            </p>
                            <a href="<?= base_url('produk/' . ($item['slug'] ?? '')) ?>" class="btn-fh-light w-100 text-center d-block">
                                Detail Produk
                            </a>
                        </div>
                    </article>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center py-5 reveal">
                    <div style="color:var(--fh-text-muted);">
                        <i class="fas fa-box-open fa-3x mb-3" style="opacity:0.3;"></i>
                        <p>Belum ada produk unggulan.</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div class="text-center mt-5 reveal">
            <a href="<?= base_url('katalog') ?>" class="btn-fh-primary px-5 py-3">
                Lihat Semua Produk <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- ============================================================
     CTA BANNER
     ============================================================ -->
<section class="section-fh-sm reveal">
    <div class="container">
        <div class="cta-banner">
            <div class="cta-blob" aria-hidden="true"></div>
            <div class="row align-items-center g-4">
                <div class="col-lg-8">
                    <h2 style="font-size:1.75rem; color:#fff; margin-bottom:8px;">Butuh Konsultasi Alat Kesehatan?</h2>
                    <p style="color:rgba(255,255,255,0.8); margin:0;">Tim kami siap membantu Anda menemukan produk yang tepat. Hubungi kami sekarang.</p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="https://wa.me/<?= $settings['wa_number'] ?? '' ?>"
                       target="_blank"
                       class="cta-wa-btn">
                        <i class="fab fa-whatsapp fa-lg"></i>
                        <div>
                            <div style="font-size:0.75rem; opacity:0.85;">Chat Sekarang</div>
                            <div style="font-weight:700;">WhatsApp Kami</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->include('frontend/layout/_mitra') ?>

<style>
/* ---- Hero ---- */
.hero-section {
    position: relative;
    min-height: 100vh;
    display: flex;
    align-items: center;
}
.hero-media, .hero-video {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.hero-bg-gradient { background: var(--fh-gradient-hero); position: absolute; inset: 0; }
.hero-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(to bottom, rgba(10,25,60,0.65) 0%, rgba(10,25,60,0.50) 100%);
}
.hero-content {
    position: relative;
    z-index: 2;
    padding-top: 100px;
    padding-bottom: 120px;
}
.hero-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(255,255,255,0.15);
    backdrop-filter: blur(12px);
    color: #fff;
    border: 1px solid rgba(255,255,255,0.3);
    border-radius: 50px;
    padding: 8px 20px;
    font-size: 0.82rem;
    font-weight: 600;
    margin-bottom: 24px;
}
.hero-title {
    font-size: clamp(2rem, 6vw, 4rem);
    font-weight: 800;
    color: #fff;
    margin-bottom: 20px;
    line-height: 1.15;
    letter-spacing: -0.5px;
}
.hero-subtitle {
    font-size: clamp(1rem, 2vw, 1.2rem);
    color: rgba(255,255,255,0.85);
    max-width: 560px;
    margin: 0 auto 36px;
    line-height: 1.7;
}
.hero-scroll-indicator {
    position: absolute;
    bottom: 36px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 6px;
    color: rgba(255,255,255,0.6);
    font-size: 0.75rem;
    font-weight: 600;
    letter-spacing: 2px;
    text-transform: uppercase;
    animation: heroBounce 2s ease-in-out infinite;
}
@keyframes heroBounce {
    0%, 100% { transform: translateX(-50%) translateY(0); }
    50% { transform: translateX(-50%) translateY(8px); }
}

/* ---- Stats ---- */
.stats-section {
    margin-top: -64px;
    position: relative;
    z-index: 10;
    padding-bottom: 0;
}
.stats-card {
    background: #fff;
    border-radius: var(--fh-radius-xl);
    box-shadow: var(--fh-shadow-lg);
    overflow: hidden;
    border: 1px solid var(--fh-border);
}
.stat-item {
    padding: 36px 24px;
    text-align: center;
    border-right: 1px solid var(--fh-border);
    border-bottom: 1px solid var(--fh-border);
    transition: background var(--fh-transition);
}
.stat-item:nth-child(2n) { border-right: none; }
.stat-item:nth-child(3), .stat-item:nth-child(4) { border-bottom: none; }
@media (min-width: 768px) {
    .stat-item { border-bottom: none; }
    .stat-item:last-child { border-right: none; }
    .stat-item:nth-child(2n) { border-right: 1px solid var(--fh-border); }
    .stat-item:last-child { border-right: none; }
}
.stat-item:hover { background: var(--fh-blue-50); }
.stat-icon {
    width: 48px;
    height: 48px;
    background: var(--fh-blue-50);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--fh-primary);
    font-size: 20px;
    margin: 0 auto 12px;
}
.stat-number {
    font-size: 2rem;
    font-weight: 800;
    color: var(--fh-primary-dark);
    line-height: 1;
    margin-bottom: 6px;
}
.stat-label {
    font-size: 0.85rem;
    color: var(--fh-text-muted);
    font-weight: 500;
}

/* ---- About ---- */
.about-img-wrap { position: relative; }
.about-img-main {
    width: 100%;
    height: 480px;
    object-fit: cover;
    border-radius: var(--fh-radius-xl);
    box-shadow: var(--fh-shadow-lg);
}
.about-badge-card {
    position: absolute;
    bottom: 28px;
    right: -20px;
    background: #fff;
    border-radius: var(--fh-radius-md);
    box-shadow: var(--fh-shadow-lg);
    padding: 14px 20px;
    display: flex;
    align-items: center;
    gap: 12px;
    font-size: 22px;
    color: var(--fh-primary);
    border: 1px solid var(--fh-border);
}
.about-badge-card strong { display: block; font-size: 0.9rem; color: var(--fh-text); }
.about-badge-card span { font-size: 0.78rem; color: var(--fh-text-muted); }

.about-checklist { display: flex; flex-direction: column; gap: 12px; }
.check-item {
    display: flex;
    align-items: center;
    gap: 12px;
    font-size: 0.95rem;
    font-weight: 500;
    color: var(--fh-text);
}
.check-item i { color: var(--fh-success); font-size: 18px; flex-shrink: 0; }

@media (max-width: 991.98px) {
    .about-badge-card { display: none; }
    .about-img-main { height: 320px; }
}

/* ---- Product Cards ---- */
.product-card { display: flex; flex-direction: column; }
.product-img-link { display: block; text-decoration: none; }
.product-img-wrap { position: relative; overflow: hidden; }
.product-img {
    width: 100%;
    height: 240px;
    object-fit: cover;
    display: block;
    transition: transform 0.5s ease;
}
.product-card:hover .product-img { transform: scale(1.06); }
.product-overlay {
    position: absolute;
    inset: 0;
    background: rgba(30,64,175,0.72);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity var(--fh-transition);
}
.product-card:hover .product-overlay { opacity: 1; }
.product-overlay-btn {
    color: #fff;
    font-size: 0.9rem;
    font-weight: 700;
    border: 2px solid rgba(255,255,255,0.7);
    border-radius: 50px;
    padding: 8px 22px;
    backdrop-filter: blur(4px);
}
.product-body { padding: 20px 22px 22px; flex: 1; display: flex; flex-direction: column; }
.product-title {
    font-size: 1rem;
    font-weight: 700;
    margin-bottom: 8px;
    color: var(--fh-text);
}
.product-desc {
    font-size: 0.855rem;
    color: var(--fh-text-muted);
    line-height: 1.6;
    flex: 1;
    margin-bottom: 16px;
}

/* ---- CTA Banner ---- */
.cta-banner {
    background: var(--fh-gradient-hero);
    border-radius: var(--fh-radius-xl);
    padding: 48px 52px;
    position: relative;
    overflow: hidden;
}
.cta-blob {
    position: absolute;
    top: -60px;
    right: -60px;
    width: 280px;
    height: 280px;
    background: rgba(255,255,255,0.06);
    border-radius: 50%;
}
.cta-wa-btn {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    background: #25D366;
    color: #fff;
    text-decoration: none;
    border-radius: var(--fh-radius-pill);
    padding: 14px 28px;
    font-size: 0.9rem;
    font-weight: 600;
    box-shadow: 0 6px 24px rgba(37,211,102,0.4);
    transition: all var(--fh-transition);
}
.cta-wa-btn:hover { background: #1ebe5d; transform: translateY(-3px); color: #fff; box-shadow: 0 10px 32px rgba(37,211,102,0.5); }
@media (max-width: 767.98px) {
    .cta-banner { padding: 36px 28px; text-align: center; }
    .cta-blob { display: none; }
}
</style>

<?= $this->endSection() ?>