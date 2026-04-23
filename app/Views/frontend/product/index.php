<?= $this->extend('frontend/layout/template') ?>
<?= $this->section('content') ?>

<!-- Page Hero -->
<section class="page-hero" aria-label="Katalog Produk">
    <div class="container text-center" style="position:relative; z-index:2;">
        <nav aria-label="breadcrumb" class="d-flex justify-content-center mb-4">
            <ol class="breadcrumb-fh">
                <li><a href="<?= base_url() ?>">Home</a></li>
                <li><i class="fas fa-chevron-right"></i></li>
                <li aria-current="page">Katalog</li>
            </ol>
        </nav>
        <span class="section-label"
            style="background:rgba(255,255,255,0.15); color:#fff; border-color:rgba(255,255,255,0.3);">
            <i class="fas fa-boxes-stacked"></i> Katalog Produk
        </span>
        <h1 style="font-size:clamp(1.8rem,5vw,3rem); color:#fff; margin-top:12px; margin-bottom:0;">
            Temukan Alat Kesehatan Terbaik
        </h1>
        <p style="color:rgba(255,255,255,0.8); font-size:1.05rem; margin-top:12px;">
            Pilihan lengkap produk medis berkualitas untuk kebutuhan Anda.
        </p>
    </div>
</section>

<!-- Catalog Body -->
<div class="section-fh">
    <div class="w-full mx-4">
        <div class="row g-4">

            <!-- Sidebar -->
            <aside class="col-lg-3 col-md-4" aria-label="Filter kategori">
                <div class="cat-sidebar card-fh p-0 overflow-hidden">
                    <div class="cat-sidebar-header">
                        <i class="fas fa-filter me-2"></i> Kategori
                    </div>

                    <!-- Search -->
                    <div class="cat-search-wrap">
                        <div class="cat-search-box">
                            <i class="fas fa-search cat-search-icon"></i>
                            <input type="text" id="product-search" class="cat-search-input" placeholder="Cari produk..."
                                value="<?= htmlspecialchars($keyword ?? '') ?>" aria-label="Cari produk"
                                autocomplete="off">
                        </div>
                    </div>

                    <nav class="cat-nav" aria-label="Kategori produk" id="category-nav">
                        <a href="<?= base_url('katalog') ?>" class="cat-nav-item <?= (!$current_cat) ? 'active' : '' ?>"
                            data-category="">
                            <span class="cat-nav-icon"><i class="fas fa-th-large"></i></span>
                            <span>Semua Produk</span>
                        </a>

                        <?php if (!empty($categories)): ?>
                            <?php foreach ($categories as $cat):
                                $c = (array) $cat;
                                if (empty($c['slug']))
                                    continue;
                                ?>
                                <a href="<?= base_url('katalog?kategori=' . $c['slug']) ?>"
                                    class="cat-nav-item <?= ($current_cat == $c['slug']) ? 'active' : '' ?>"
                                    data-category="<?= $c['slug'] ?>">
                                    <span class="cat-nav-icon"><i class="fas fa-tag"></i></span>
                                    <span><?= htmlspecialchars($c['name'] ?? 'Kategori') ?></span>
                                </a>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="text-muted small px-3 pb-3">Belum ada kategori.</p>
                        <?php endif; ?>
                    </nav>

                    <!-- WA CTA -->
                    <div class="cat-wa-cta">
                        <p>Butuh bantuan memilih produk?</p>
                        <a href="https://wa.me/<?= $settings['wa_number'] ?? '' ?>" target="_blank" class="cat-wa-btn">
                            <i class="fab fa-whatsapp me-2"></i> Konsultasi Gratis
                        </a>
                    </div>
                </div>
            </aside>

            <!-- Product Grid -->
            <main class="col-lg-9 col-md-8">
                <div id="product-container">
                    <?php if (!empty($current_cat) || !empty($keyword)): ?>
                        <div class="d-flex align-items-center flex-wrap gap-2 mb-4">
                            <span style="font-size:0.85rem; color:var(--fh-text-muted);">
                                Filter aktif:
                            </span>
                            <?php if (!empty($current_cat)): ?>
                                <span class="badge-fh" style="display:inline-flex; align-items:center; gap:6px;">
                                    Kategori: <?= htmlspecialchars($current_cat) ?>
                                    <a href="#" class="clear-filter" data-type="category"
                                        style="color:inherit; font-size:11px; margin-left:4px; text-decoration:none;">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </span>
                            <?php endif; ?>
                            <?php if (!empty($keyword)): ?>
                                <span class="badge-fh" style="display:inline-flex; align-items:center; gap:6px;">
                                    Cari: "<?= htmlspecialchars($keyword) ?>"
                                    <a href="#" class="clear-filter" data-type="search"
                                        style="color:inherit; font-size:11px; margin-left:4px; text-decoration:none;">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </span>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($products)): ?>
                        <div class="row g-4">
                            <?php foreach ($products as $i => $p):
                                $item = (array) $p;
                                $p_img = $item['main_image'] ?? 'default.jpg';
                                ?>
                                <div class="col-sm-6 col-lg-4 col-xl-3 reveal">
                                    <article class="product-card">
                                        <a href="<?= base_url('produk/' . ($item['slug'] ?? '')) ?>" class="product-img-link">
                                            <div class="product-img-wrap">
                                                <img src="<?= base_url('uploads/products/' . $p_img) ?>" class="product-img"
                                                    alt="<?= htmlspecialchars($item['name'] ?? 'Produk Alkes') ?>"
                                                    loading="lazy"
                                                    onerror="this.src='<?= base_url('uploads/products/default.jpg') ?>'">
                                                <div class="product-overlay">
                                                    <span class="product-overlay-btn">
                                                        <i class="fas fa-eye me-2"></i>Detail
                                                    </span>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="product-body">
                                            <?php if (!empty($item['category_name'])): ?>
                                                <span
                                                    class="badge-fh mb-2 d-inline-block"><?= htmlspecialchars($item['category_name']) ?></span>
                                            <?php endif; ?>
                                            <h2 class="product-title"><?= htmlspecialchars($item['name'] ?? 'Produk') ?></h2>
                                            <p class="product-desc">
                                                <?= htmlspecialchars(substr(strip_tags($item['description'] ?? ''), 0, 75)) ?>...
                                            </p>
                                            <a href="<?= base_url('produk/' . ($item['slug'] ?? '')) ?>"
                                                class="btn-fh-light w-100 text-center d-block">
                                                Lihat Detail
                                            </a>
                                        </div>
                                    </article>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <div class="empty-state reveal">
                            <div class="empty-icon">
                                <i class="fas fa-box-open"></i>
                            </div>
                            <h3>Produk Tidak Ditemukan</h3>
                            <p>Maaf, belum ada produk yang sesuai dengan pencarian Anda.</p>
                            <a href="#" class="btn-fh-primary" id="reset-all-filters">
                                Lihat Semua Produk
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </main>
        </div>
    </div>
</div>

<?= $this->include('frontend/layout/_mitra') ?>

<style>
    /* ---- Breadcrumb ---- */
    .breadcrumb-fh {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        list-style: none;
        padding: 0;
        margin: 0;
        font-size: 0.85rem;
        color: rgba(255, 255, 255, 0.7);
    }

    .breadcrumb-fh a {
        color: rgba(255, 255, 255, 0.85);
        text-decoration: none;
    }

    .breadcrumb-fh a:hover {
        color: #fff;
    }

    .breadcrumb-fh i {
        font-size: 10px;
        opacity: 0.5;
    }

    .breadcrumb-fh li[aria-current="page"] {
        color: #fff;
        font-weight: 600;
    }

    /* ---- Category Sidebar ---- */
    .cat-sidebar {
        border-radius: var(--fh-radius-lg);
    }

    .cat-sidebar-header {
        background: var(--fh-gradient-banner);
        color: #fff;
        font-weight: 700;
        font-size: 0.9rem;
        padding: 16px 20px;
    }

    .cat-search-wrap {
        padding: 14px 14px 10px;
        border-bottom: 1px solid var(--fh-border);
    }

    .cat-search-box {
        position: relative;
    }

    .cat-search-icon {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--fh-text-muted);
        font-size: 13px;
    }

    .cat-search-input {
        width: 100%;
        padding: 9px 12px 9px 34px;
        border: 1.5px solid var(--fh-border);
        border-radius: var(--fh-radius-sm);
        font-size: 0.85rem;
        font-family: inherit;
        background: var(--fh-off-white);
        color: var(--fh-text);
        outline: none;
        transition: border-color var(--fh-transition);
    }

    .cat-search-input:focus {
        border-color: var(--fh-primary-light);
        background: #fff;
    }

    .cat-nav {
        padding: 10px 0;
    }

    .cat-nav-item {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 20px;
        font-size: 0.9rem;
        font-weight: 500;
        color: var(--fh-text);
        text-decoration: none;
        transition: all var(--fh-transition);
        border-left: 3px solid transparent;
    }

    .cat-nav-item:hover {
        background: var(--fh-blue-50);
        color: var(--fh-primary);
        border-left-color: var(--fh-blue-200);
    }

    .cat-nav-item.active {
        background: var(--fh-blue-50);
        color: var(--fh-primary);
        font-weight: 700;
        border-left-color: var(--fh-primary);
    }

    .cat-nav-icon {
        width: 30px;
        height: 30px;
        border-radius: 8px;
        background: var(--fh-border);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        flex-shrink: 0;
        transition: background var(--fh-transition);
    }

    .cat-nav-item.active .cat-nav-icon,
    .cat-nav-item:hover .cat-nav-icon {
        background: var(--fh-blue-100);
        color: var(--fh-primary);
    }

    .cat-wa-cta {
        background: var(--fh-blue-50);
        border-top: 1px solid var(--fh-blue-200);
        padding: 20px;
        text-align: center;
    }

    .cat-wa-cta p {
        font-size: 0.83rem;
        color: var(--fh-text-muted);
        margin-bottom: 10px;
    }

    .cat-wa-btn {
        display: inline-flex;
        align-items: center;
        background: #25D366;
        color: #fff;
        border-radius: 50px;
        padding: 8px 18px;
        font-size: 0.85rem;
        font-weight: 700;
        text-decoration: none;
        transition: all var(--fh-transition);
    }

    .cat-wa-btn:hover {
        background: #1ebe5d;
        color: #fff;
        transform: translateY(-2px);
    }

    /* ===========================================
   PRODUCT CARD — Definisi lengkap di sini
   karena halaman ini berdiri sendiri
   =========================================== */
    .product-card {
        display: flex;
        flex-direction: column;
        height: 100%;
        border-radius: var(--fh-radius-lg);
        overflow: hidden;
        /* KUNCI: clip image + overlay */
        background: #fff;
        border: 1px solid var(--fh-border);
        box-shadow: var(--fh-shadow-sm);
        transition: box-shadow var(--fh-transition), transform var(--fh-transition), border-color var(--fh-transition);
    }

    .product-card:hover {
        box-shadow: var(--fh-shadow-lg);
        transform: translateY(-4px);
        border-color: var(--fh-blue-200);
    }

    /* Link wrapper hanya membungkus area gambar */
    .product-img-link {
        display: block;
        text-decoration: none;
        flex-shrink: 0;
        line-height: 0;
        /* hilangkan whitespace bawah <a> */
    }

    /* Kontainer gambar — WAJIB position relative + overflow hidden */
    .product-img-wrap {
        position: relative;
        overflow: hidden;
        width: 100%;
        height: 240px;
        /* Sedikit lebih tinggi untuk kenyamanan visual */
        padding: 15px;
        /* Padding agar gambar tidak menempel ke tepi */
        background: #f8fafc;
        /* Warna background netral yang sangat terang */
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Gambar mengisi kotak secara proporsional tanpa terpotong */
    .product-img {
        max-width: 100%;
        max-height: 100%;
        width: auto;
        height: auto;
        object-fit: contain;
        object-position: center;
        display: block;
        transition: transform 0.5s ease;
    }

    .product-card:hover .product-img {
        transform: scale(1.06);
    }

    /* Overlay hover di atas gambar */
    .product-overlay {
        position: absolute;
        inset: 0;
        background: rgba(30, 64, 175, 0.70);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity var(--fh-transition);
        pointer-events: none;
    }

    .product-card:hover .product-overlay {
        opacity: 1;
    }

    .product-overlay-btn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        color: #fff;
        font-size: 0.88rem;
        font-weight: 700;
        border: 2px solid rgba(255, 255, 255, 0.75);
        border-radius: 50px;
        padding: 8px 22px;
        backdrop-filter: blur(4px);
        pointer-events: auto;
    }

    /* Body kartu */
    .product-body {
        padding: 16px 18px 18px;
        display: flex;
        flex-direction: column;
        flex: 1;
        gap: 0;
    }

    /* Judul produk — font kecil dan konsisten */
    .product-title {
        font-size: 0.95rem;
        font-weight: 700;
        color: var(--fh-text);
        margin: 6px 0 8px;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Deskripsi singkat */
    .product-desc {
        font-size: 0.83rem;
        color: var(--fh-text-muted);
        line-height: 1.65;
        flex: 1;
        margin-bottom: 14px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* ---- Empty State ---- */
    .empty-state {
        text-align: center;
        padding: 72px 24px;
        background: var(--fh-off-white);
        border-radius: var(--fh-radius-xl);
        border: 2px dashed var(--fh-border);
    }

    .empty-icon {
        width: 80px;
        height: 80px;
        background: var(--fh-blue-50);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 32px;
        color: var(--fh-primary-light);
        margin: 0 auto 20px;
        opacity: 0.7;
    }

    .empty-state h3 {
        font-size: 1.3rem;
        margin-bottom: 8px;
    }

    .empty-state p {
        color: var(--fh-text-muted);
        margin-bottom: 24px;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('product-search');
        const categoryLinks = document.querySelectorAll('#category-nav .cat-nav-item');
        const productContainer = document.getElementById('product-container');
        let currentCategory = '<?= $current_cat ?? '' ?>';
        let debounceTimer;

        function updateProducts() {
            const query = searchInput.value;
            const url = new URL(window.location.href);

            if (query) url.searchParams.set('q', query);
            else url.searchParams.delete('q');

            if (currentCategory) url.searchParams.set('kategori', currentCategory);
            else url.searchParams.delete('kategori');

            // Update URL in browser without refresh
            window.history.pushState({}, '', url);

            // Show loading state
            productContainer.style.opacity = '0.5';

            fetch(url, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(response => response.text())
                .then(html => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    const newContentElement = doc.getElementById('product-container');

                    if (newContentElement) {
                        // Hilangkan class 'reveal' pada konten baru agar langsung tampil tanpa menunggu animasi ScrollReveal
                        // Karena ScrollReveal sering bermasalah saat konten diupdate via AJAX
                        const revealElements = newContentElement.querySelectorAll('.reveal');
                        revealElements.forEach(el => {
                            el.classList.remove('reveal');
                            el.style.opacity = '1';
                            el.style.visibility = 'visible';
                        });

                        productContainer.innerHTML = newContentElement.innerHTML;
                    }

                    productContainer.style.opacity = '1';

                    // Re-bind clear filter buttons
                    bindClearFilters();
                })
                .catch(error => {
                    console.error('Error fetching products:', error);
                    productContainer.style.opacity = '1';
                });
        }

        function bindClearFilters() {
            document.querySelectorAll('.clear-filter').forEach(btn => {
                btn.onclick = function (e) {
                    e.preventDefault();
                    const type = this.dataset.type;
                    if (type === 'category') {
                        currentCategory = '';
                        updateActiveCategory();
                    } else {
                        searchInput.value = '';
                    }
                    updateProducts();
                    return false;
                };
            });

            const resetBtn = document.getElementById('reset-all-filters');
            if (resetBtn) {
                resetBtn.onclick = function (e) {
                    e.preventDefault();
                    searchInput.value = '';
                    currentCategory = '';
                    updateActiveCategory();
                    updateProducts();
                    return false;
                };
            }
        }

        function updateActiveCategory() {
            categoryLinks.forEach(link => {
                if (link.dataset.category === currentCategory) {
                    link.classList.add('active');
                } else {
                    link.classList.remove('active');
                }
            });
        }

        // Search Input Event (Debounced)
        searchInput.addEventListener('input', function () {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(updateProducts, 400);
        });

        // Category Click Event
        categoryLinks.forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                currentCategory = this.dataset.category;
                updateActiveCategory();
                updateProducts();
                return false;
            });
        });

        bindClearFilters();
    });
</script>
<?= $this->endSection() ?>