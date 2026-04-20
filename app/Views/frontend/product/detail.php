<?= $this->extend('frontend/layout/template') ?>
<?= $this->section('content') ?>

<?php
$p_name   = is_array($product) ? $product['name']          : $product->name;
$p_desc   = is_array($product) ? $product['description']   : $product->description;
$p_spec   = is_array($product) ? $product['specification'] : $product->specification;
$cat_name = is_array($category) ? $category['name']        : $category->name;
$waNumber = $settings['wa_number'] ?? '628123456789';
$textMsg  = urlencode("Halo Fulki Hasya, saya tertarik dengan produk: *" . $p_name . "*. Apakah stok ready?");
$waURL    = "https://wa.me/" . $waNumber . "?text=" . $textMsg;
?>

<!-- JSON-LD Product Schema -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Product",
  "name": "<?= htmlspecialchars($p_name) ?>",
  "description": "<?= htmlspecialchars(substr(strip_tags($p_desc), 0, 200)) ?>",
  "category": "<?= htmlspecialchars($cat_name) ?>",
  "brand": {
    "@type": "Brand",
    "name": "Fulki Hasya"
  },
  "offers": {
    "@type": "Offer",
    "availability": "https://schema.org/InStock",
    "seller": {
      "@type": "Organization",
      "name": "Toko Alat Kesehatan Fulki Hasya"
    }
  }
}
</script>

<!-- JSON-LD BreadcrumbList -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    {"@type":"ListItem","position":1,"name":"Home","item":"<?= base_url() ?>"},
    {"@type":"ListItem","position":2,"name":"Katalog","item":"<?= base_url('katalog') ?>"},
    {"@type":"ListItem","position":3,"name":"<?= htmlspecialchars($p_name) ?>","item":"<?= current_url() ?>"}
  ]
}
</script>

<div class="detail-page">

    <!-- Breadcrumb Bar -->
    <div class="detail-breadcrumb-bar">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb-fh-light">
                    <li><a href="<?= base_url() ?>"><i class="fas fa-home me-1"></i>Home</a></li>
                    <li><i class="fas fa-chevron-right"></i></li>
                    <li><a href="<?= base_url('katalog') ?>">Katalog</a></li>
                    <li><i class="fas fa-chevron-right"></i></li>
                    <li aria-current="page"><?= htmlspecialchars($p_name) ?></li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Main Detail -->
    <div class="container detail-container">
        <div class="row g-5 align-items-start">

            <!-- Gallery -->
            <div class="col-lg-6">
                <div class="gallery-wrap reveal">
                    <div class="swiper productGallery gallery-main-swiper">
                        <div class="swiper-wrapper">
                            <?php if (!empty($images)): ?>
                                <?php foreach ($images as $img): ?>
                                    <div class="swiper-slide">
                                        <img src="<?= base_url('uploads/products/' . (is_array($img) ? $img['image'] : $img->image)) ?>"
                                             class="gallery-main-img"
                                             alt="<?= htmlspecialchars($p_name) ?>">
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="swiper-slide">
                                    <img src="<?= base_url('uploads/products/default.jpg') ?>"
                                         class="gallery-main-img"
                                         alt="<?= htmlspecialchars($p_name) ?>">
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="swiper-button-next gallery-nav-next"></div>
                        <div class="swiper-button-prev gallery-nav-prev"></div>
                        <div class="swiper-pagination gallery-pagination"></div>
                    </div>

                    <!-- Thumbnails -->
                    <?php if (!empty($images) && count($images) > 1): ?>
                    <div class="swiper thumbSwiper gallery-thumb-swiper">
                        <div class="swiper-wrapper">
                            <?php foreach ($images as $img): ?>
                                <div class="swiper-slide">
                                    <img src="<?= base_url('uploads/products/' . (is_array($img) ? $img['image'] : $img->image)) ?>"
                                         class="gallery-thumb-img"
                                         alt="Thumbnail <?= htmlspecialchars($p_name) ?>"
                                         loading="lazy">
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Product Info -->
            <div class="col-lg-6 reveal reveal-delay-2">
                <div class="detail-info">

                    <!-- Category & Title -->
                    <div class="mb-3">
                        <span class="badge-fh"><?= htmlspecialchars($cat_name) ?></span>
                    </div>
                    <h1 class="detail-title"><?= htmlspecialchars($p_name) ?></h1>

                    <!-- Trust Badges -->
                    <div class="detail-trust-badges">
                        <div class="trust-badge"><i class="fas fa-shield-check"></i> Produk Resmi</div>
                        <div class="trust-badge"><i class="fas fa-truck-fast"></i> Pengiriman Cepat</div>
                        <div class="trust-badge"><i class="fas fa-headset"></i> Dukungan 24/7</div>
                    </div>

                    <hr style="border-color:var(--fh-border); margin:20px 0;">

                    <!-- Tabs -->
                    <div class="detail-tabs">
                        <button class="detail-tab active" data-tab="desc">
                            <i class="fas fa-align-left me-2"></i>Deskripsi
                        </button>
                        <?php if (!empty($p_spec)): ?>
                        <button class="detail-tab" data-tab="spec">
                            <i class="fas fa-list-check me-2"></i>Spesifikasi
                        </button>
                        <?php endif; ?>
                    </div>

                    <!-- Tab Content -->
                    <div class="detail-tab-content active" id="tab-desc">
                        <div class="detail-text" style="white-space:pre-line;">
                            <?= htmlspecialchars($p_desc) ?>
                        </div>
                    </div>

                    <?php if (!empty($p_spec)): ?>
                    <div class="detail-tab-content" id="tab-spec">
                        <div class="spec-box">
                            <?= nl2br(htmlspecialchars($p_spec)) ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- CTA -->
                    <div class="detail-cta">
                        <a href="<?= $waURL ?>" target="_blank" rel="noopener" class="detail-wa-btn" id="detailWaBtn">
                            <i class="fab fa-whatsapp detail-wa-icon"></i>
                            <div>
                                <div class="detail-wa-label">Tanya Stok & Harga</div>
                                <div class="detail-wa-sub">via WhatsApp — Balas Cepat!</div>
                            </div>
                            <i class="fas fa-arrow-right ms-auto"></i>
                        </a>
                    </div>

                    <!-- Share -->
                    <div class="detail-share">
                        <span style="font-size:0.83rem; color:var(--fh-text-muted); font-weight:600;">Bagikan:</span>
                        <a href="https://wa.me/?text=<?= urlencode($p_name . ' — ' . current_url()) ?>"
                           target="_blank" class="share-btn" aria-label="Share via WhatsApp">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(current_url()) ?>"
                           target="_blank" class="share-btn" aria-label="Share on Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url=<?= urlencode(current_url()) ?>&text=<?= urlencode($p_name) ?>"
                           target="_blank" class="share-btn" aria-label="Share on Twitter">
                            <i class="fab fa-x-twitter"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Sticky CTA -->
    <div class="mobile-sticky-cta d-lg-none">
        <a href="<?= $waURL ?>" target="_blank" class="mobile-sticky-wa-btn" id="mobileStickyWa">
            <i class="fab fa-whatsapp me-2 fa-lg"></i> Tanya via WhatsApp
        </a>
    </div>
</div>

<?= $this->include('frontend/layout/_mitra') ?>

<style>
/* ---- Detail Page ---- */
.detail-page { padding-bottom: 60px; }
.detail-breadcrumb-bar {
    background: var(--fh-off-white);
    border-bottom: 1px solid var(--fh-border);
    padding: 14px 0;
    margin-top: 74px;
}
.breadcrumb-fh-light {
    display: flex;
    align-items: center;
    gap: 8px;
    list-style: none;
    padding: 0;
    margin: 0;
    font-size: 0.85rem;
    color: var(--fh-text-muted);
}
.breadcrumb-fh-light a { color: var(--fh-primary); text-decoration: none; transition: color var(--fh-transition); }
.breadcrumb-fh-light a:hover { color: var(--fh-primary-dark); }
.breadcrumb-fh-light i { font-size: 10px; opacity: 0.4; }
.breadcrumb-fh-light li[aria-current="page"] { color: var(--fh-text); font-weight: 600; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 200px; }

.detail-container { padding-top: 48px; padding-bottom: 48px; }

/* ---- Gallery ---- */
.gallery-wrap {}
.gallery-main-swiper {
    border-radius: var(--fh-radius-lg);
    overflow: hidden;
    box-shadow: var(--fh-shadow-md);
    margin-bottom: 12px;
    background: var(--fh-off-white);
}
.gallery-main-img {
    width: 100%;
    height: 420px;
    object-fit: contain;
    background: var(--fh-off-white);
    display: block;
    padding: 16px;
}
.gallery-nav-next, .gallery-nav-prev {
    background: rgba(255,255,255,0.9);
    backdrop-filter: blur(8px);
    border-radius: 50%;
    width: 42px;
    height: 42px;
    box-shadow: var(--fh-shadow-sm);
    color: var(--fh-primary) !important;
}
.gallery-nav-next::after, .gallery-nav-prev::after { font-size: 16px !important; font-weight: 900 !important; }
.gallery-pagination .swiper-pagination-bullet { background: var(--fh-primary); }

.gallery-thumb-swiper { padding: 4px 0; }
.gallery-thumb-swiper .swiper-slide {
    width: 72px !important;
    height: 72px;
    border-radius: var(--fh-radius-sm);
    overflow: hidden;
    cursor: pointer;
    border: 2px solid transparent;
    transition: border-color var(--fh-transition);
    opacity: 0.65;
}
.gallery-thumb-swiper .swiper-slide-thumb-active {
    border-color: var(--fh-primary);
    opacity: 1;
}
.gallery-thumb-img { width: 100%; height: 100%; object-fit: cover; }

/* ---- Detail Info ---- */
.detail-info {}
.detail-title {
    font-size: clamp(1.3rem, 3vw, 1.9rem);
    font-weight: 800;
    margin-bottom: 16px;
    color: var(--fh-text);
    line-height: 1.25;
}
.detail-trust-badges {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-bottom: 4px;
}
.trust-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 0.78rem;
    font-weight: 600;
    color: var(--fh-primary);
    background: var(--fh-blue-50);
    border: 1px solid var(--fh-blue-200);
    border-radius: 50px;
    padding: 5px 12px;
}

/* ---- Tabs ---- */
.detail-tabs {
    display: flex;
    gap: 4px;
    border-bottom: 2px solid var(--fh-border);
    margin-bottom: 20px;
}
.detail-tab {
    background: none;
    border: none;
    padding: 10px 18px;
    font-size: 0.88rem;
    font-weight: 600;
    font-family: inherit;
    color: var(--fh-text-muted);
    cursor: pointer;
    position: relative;
    bottom: -2px;
    border-bottom: 2px solid transparent;
    transition: all var(--fh-transition);
}
.detail-tab:hover { color: var(--fh-primary); }
.detail-tab.active { color: var(--fh-primary); border-bottom-color: var(--fh-primary); }

.detail-tab-content { display: none; }
.detail-tab-content.active { display: block; }

.detail-text {
    font-size: 0.95rem;
    color: var(--fh-text-muted);
    line-height: 1.85;
    max-height: 280px;
    overflow-y: auto;
    padding-right: 8px;
}
.detail-text::-webkit-scrollbar { width: 4px; }
.detail-text::-webkit-scrollbar-track { background: var(--fh-off-white); border-radius: 2px; }
.detail-text::-webkit-scrollbar-thumb { background: var(--fh-blue-200); border-radius: 2px; }

.spec-box {
    background: var(--fh-off-white);
    border-radius: var(--fh-radius-md);
    border-left: 4px solid var(--fh-primary);
    padding: 20px 24px;
    font-size: 0.9rem;
    color: var(--fh-text);
    line-height: 2;
}

/* ---- CTA ---- */
.detail-cta { margin: 24px 0 16px; }
.detail-wa-btn {
    display: flex;
    align-items: center;
    gap: 14px;
    background: #25D366;
    color: #fff;
    text-decoration: none;
    border-radius: var(--fh-radius-md);
    padding: 18px 24px;
    transition: all var(--fh-transition);
    box-shadow: 0 6px 28px rgba(37,211,102,0.4);
}
.detail-wa-btn:hover { background: #1ebe5d; transform: translateY(-3px); color: #fff; box-shadow: 0 12px 40px rgba(37,211,102,0.5); }
.detail-wa-icon { font-size: 28px; flex-shrink: 0; }
.detail-wa-label { font-weight: 700; font-size: 1rem; }
.detail-wa-sub { font-size: 0.8rem; opacity: 0.85; margin-top: 2px; }

/* ---- Share ---- */
.detail-share {
    display: flex;
    align-items: center;
    gap: 10px;
}
.share-btn {
    width: 36px;
    height: 36px;
    border-radius: 10px;
    background: var(--fh-blue-50);
    color: var(--fh-primary);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 15px;
    text-decoration: none;
    border: 1px solid var(--fh-blue-200);
    transition: all var(--fh-transition);
}
.share-btn:hover { background: var(--fh-primary); color: #fff; border-color: var(--fh-primary); }

/* ---- Mobile Sticky CTA ---- */
.mobile-sticky-cta {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: 990;
    padding: 12px 16px;
    background: rgba(255,255,255,0.95);
    backdrop-filter: blur(10px);
    border-top: 1px solid var(--fh-border);
    box-shadow: 0 -4px 20px rgba(0,0,0,0.1);
}
.mobile-sticky-wa-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    background: #25D366;
    color: #fff;
    text-decoration: none;
    border-radius: var(--fh-radius-pill);
    padding: 14px;
    font-weight: 700;
    font-size: 1rem;
    box-shadow: 0 4px 20px rgba(37,211,102,0.4);
}

@media (max-width: 991.98px) {
    .gallery-main-img { height: 300px; }
    .detail-page { padding-bottom: 90px; }
}
</style>

<?= $this->section('scripts') ?>
<script>
document.addEventListener('DOMContentLoaded', function () {
    /* ---- Swiper Gallery with Thumbs ---- */
    const hasThumb = document.querySelector('.thumbSwiper');
    let thumbSwiper = null;
    if (hasThumb) {
        thumbSwiper = new Swiper('.thumbSwiper', {
            spaceBetween: 10,
            slidesPerView: 'auto',
            freeMode: true,
            watchSlidesProgress: true,
        });
    }

    new Swiper('.productGallery', {
        loop: true,
        spaceBetween: 0,
        pagination: {
            el: '.gallery-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.gallery-nav-next',
            prevEl: '.gallery-nav-prev',
        },
        autoplay: { delay: 5000 },
        thumbs: thumbSwiper ? { swiper: thumbSwiper } : undefined,
    });

    /* ---- Detail Tabs ---- */
    document.querySelectorAll('.detail-tab').forEach(function(tab) {
        tab.addEventListener('click', function () {
            document.querySelectorAll('.detail-tab').forEach(t => t.classList.remove('active'));
            document.querySelectorAll('.detail-tab-content').forEach(c => c.classList.remove('active'));
            tab.classList.add('active');
            document.getElementById('tab-' + tab.dataset.tab).classList.add('active');
        });
    });
});
</script>
<?= $this->endSection() ?>

<?= $this->endSection() ?>