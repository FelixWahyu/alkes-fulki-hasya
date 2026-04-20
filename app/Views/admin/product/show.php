<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-0">Informasi Detail Produk</h2>
            <p class="text-muted">Mode baca (read-only) untuk panel admin.</p>
        </div>
        <div>
            <a href="<?= base_url('admin/products/' . $product['id'] . '/edit') ?>" class="btn btn-primary shadow-sm me-2">
                <i class="fas fa-edit me-1"></i> Edit Data
            </a>
            <a href="<?= base_url('admin/products') ?>" class="btn btn-secondary shadow-sm">
                <i class="fas fa-arrow-left me-1"></i> Kembali
            </a>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-md-7">
            <div class="card border-0 shadow-sm rounded-3 h-100">
                <div class="card-body p-4">
                    <span class="badge bg-info text-dark mb-2 px-3 py-2 fs-6">
                        <?= esc($category['name']) ?>
                    </span>
                    <h3 class="fw-bold text-dark mb-4"><?= esc($product['name']) ?></h3>

                    <h6 class="fw-bold text-uppercase text-muted mb-2">Deskripsi Produk</h6>
                    <div class="p-3 bg-light rounded mb-4" style="white-space: pre-line;">
                        <?= esc($product['description']) ?: '<span class="text-muted fst-italic">Tidak ada deskripsi.</span>' ?>
                    </div>

                    <h6 class="fw-bold text-uppercase text-muted mb-2">Spesifikasi</h6>
                    <div class="p-3 border rounded" style="white-space: pre-line;">
                        <?= esc($product['specification']) ?: '<span class="text-muted fst-italic">Tidak ada spesifikasi.</span>' ?>
                    </div>
                </div>
                <div class="card-footer bg-white border-top text-muted small p-4">
                    Ditambahkan pada: <?= date('d F Y, H:i', strtotime($product['created_at'])) ?>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="card border-0 shadow-sm rounded-3 h-100">
                <div class="card-header bg-white p-4 border-bottom">
                    <h5 class="fw-bold mb-0">Galeri Foto Produk</h5>
                </div>
                <div class="card-body p-4">
                    <?php if(empty($images)): ?>
                        <div class="text-center py-5 bg-light rounded border text-muted">
                            <i class="fas fa-image fa-3x mb-3 opacity-50"></i>
                            <p class="mb-0">Tidak ada foto untuk produk ini.</p>
                        </div>
                    <?php else: ?>
                        <div class="row g-3">
                            <?php foreach($images as $img): ?>
                                <div class="col-6">
                                    <div class="ratio ratio-1x1 border rounded overflow-hidden shadow-sm">
                                        <img src="<?= base_url('uploads/products/' . $img['image']) ?>" alt="Foto Produk" class="object-fit-cover w-100 h-100">
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>