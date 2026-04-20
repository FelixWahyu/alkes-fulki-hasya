<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-0">Tambah Produk Baru</h2>
            <p class="text-muted">Masukkan detail alat kesehatan dan foto produk.</p>
        </div>
        <a href="<?= base_url('admin/products') ?>" class="btn btn-secondary shadow-sm">
            <i class="fas fa-arrow-left me-1"></i> Kembali ke Daftar
        </a>
    </div>

    <div class="card border-0 shadow-sm rounded-3">
        <div class="card-body p-4">
            <form action="<?= base_url('admin/products/store') ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                
                <div class="row">
                    <div class="col-md-8 pe-md-4">
                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark">Nama Produk <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control form-control-lg" required placeholder="Contoh: Kursi Roda Elektrik FS-123">
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark">Kategori <span class="text-danger">*</span></label>
                            <select name="category_id" class="form-select" required>
                                <option value="">-- Pilih Kategori Alat Kesehatan --</option>
                                <?php foreach($categories as $cat): ?>
                                    <option value="<?= $cat['id'] ?>"><?= esc($cat['name']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark">Deskripsi Produk</label>
                            <textarea name="description" class="form-control" rows="5" placeholder="Jelaskan fungsi dan keunggulan produk ini..."></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark">Spesifikasi Detail</label>
                            <textarea name="specification" class="form-control" rows="4" placeholder="Contoh:&#10;- Berat: 15kg&#10;- Material: Stainless Steel Anti Karat&#10;- Dimensi: 100 x 50 x 80 cm"></textarea>
                        </div>
                    </div>

                    <div class="mb-4">
    <label class="form-label fw-bold">Foto Galeri Tambahan (Bisa lebih dari 1)</label>
    <input type="file" name="product_images[]" class="form-control" multiple accept="image/*">
    <small class="text-muted d-block mt-1">
        <i class="fas fa-info-circle me-1"></i> Tahan tombol <b>Ctrl</b> untuk memilih banyak foto sekaligus.
    </small>
</div>
                    <div class="mb-3">
    <label class="form-label">Foto Sampul (Katalog)</label>
    <input type="file" name="main_image" class="form-control">
    <?php if(isset($product['main_image'])): ?>
        <small class="text-muted">File saat ini: <?= $product['main_image'] ?></small>
    <?php endif; ?>
</div>
                </div>

                <hr class="my-4">
                
                <div class="text-end">
                    <button type="submit" class="btn btn-primary btn-lg px-5 fw-bold shadow-sm">
                        <i class="fas fa-save me-2"></i> Simpan Produk
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>