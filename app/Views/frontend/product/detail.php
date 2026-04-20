<?= $this->extend('frontend/layout/template') ?>
<?= $this->section('content') ?>

<div class="container py-5 mt-5">
    <nav aria-label="breadcrumb" class="mb-4 pt-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>" class="text-decoration-none">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('katalog') ?>" class="text-decoration-none">Katalog</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= is_array($product) ? $product['name'] : $product->name ?></li>
        </ol>
    </nav>

    <div class="row g-5">
        <div class="col-md-6">
            <div class="swiper productGallery rounded-4 overflow-hidden shadow-sm mb-3">
                <div class="swiper-wrapper">
                    <?php if (!empty($images)): ?>
                        <?php foreach ($images as $img): ?>
                            <div class="swiper-slide">
                                <img src="<?= base_url('uploads/products/' . (is_array($img) ? $img['image'] : $img->image)) ?>" class="img-fluid w-100 h-100 object-fit-cover" style="min-height: 400px;">
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="swiper-slide">
                            <img src="<?= base_url('uploads/products/default.jpg') ?>" class="img-fluid w-100">
                        </div>
                    <?php endif; ?>
                </div>
                <div class="swiper-button-next text-white"></div>
                <div class="swiper-button-prev text-white"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>

        <div class="col-md-6">
            <?php
            $p_name = is_array($product) ? $product['name'] : $product->name;
            $p_desc = is_array($product) ? $product['description'] : $product->description;
            $p_spec = is_array($product) ? $product['specification'] : $product->specification;
            $cat_name = is_array($category) ? $category['name'] : $category->name;
            ?>

            <span class="badge bg-primary px-3 py-2 mb-3 shadow-sm"><?= $cat_name ?></span>
            <h1 class="fw-bold mb-3 text-dark"><?= $p_name ?></h1>
            <hr class="my-4 opacity-25">

            <div class="mb-4">
                <h6 class="fw-bold text-dark text-uppercase small mb-2">Deskripsi Produk</h6>
                <div class="text-muted" style="white-space: pre-line; line-height: 1.7;">
                    <?= $p_desc ?>
                </div>
            </div>

            <div class="mb-5">
                <h6 class="fw-bold text-dark text-uppercase small mb-2">Spesifikasi Detail</h6>
                <div class="p-4 bg-light rounded-4 border-start border-primary border-4 shadow-sm">
                    <?= nl2br($p_spec) ?>
                </div>
            </div>

            <?php
            $waNumber = $settings['wa_number'] ?? '628123456789';
            $textMsg = urlencode("Halo Fulki Hasya, saya tertarik dengan produk: *" . $p_name . "*. Apakah stok ready?");
            $waURL = "https://wa.me/" . $waNumber . "?text=" . $textMsg;
            ?>
            <a href="<?= $waURL ?>" target="_blank" class="btn btn-success btn-lg w-100 py-3 rounded-pill fw-bold shadow-lg transform-hover">
                <i class="fab fa-whatsapp me-2 fs-4"></i> Tanya via WhatsApp
            </a>
        </div>
    </div>
</div>

<style>
    .transform-hover {
        transition: all 0.3s ease;
    }

    .transform-hover:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(37, 211, 102, 0.2);
    }

    .swiper-button-next,
    .swiper-button-prev {
        background: rgba(0, 0, 0, 0.2);
        width: 40px;
        height: 40px;
        border-radius: 50%;
    }

    .swiper-button-next:after,
    .swiper-button-prev:after {
        font-size: 18px;
        font-weight: bold;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        new Swiper('.productGallery', {
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
            },
            autoplay: {
                delay: 5000
            },
        });
    });
</script>

<?= $this->endSection() ?>