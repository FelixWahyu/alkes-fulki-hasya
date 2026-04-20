<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-0">Edit Produk</h2>
            <p class="text-muted">Ubah detail atau kelola foto produk ini.</p>
        </div>
        <a href="<?= base_url('admin/products') ?>" class="btn btn-secondary shadow-sm">
            <i class="fas fa-arrow-left me-1"></i> Kembali
        </a>
    </div>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded-3 mb-4">
                <div class="card-body p-4">
                    <form action="<?= base_url('admin/products/' . $product['id']) ?>" method="POST" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="PUT">
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama Produk</label>
                            <input type="text" name="name" class="form-control" value="<?= esc($product['name']) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Kategori</label>
                            <select name="category_id" class="form-select" required>
                                <?php foreach($categories as $cat): ?>
                                    <option value="<?= $cat['id'] ?>" <?= ($cat['id'] == $product['category_id']) ? 'selected' : '' ?>>
                                        <?= esc($cat['name']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Deskripsi</label>
                            <textarea name="description" class="form-control" rows="5"><?= esc($product['description']) ?></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Spesifikasi</label>
                            <textarea name="specification" class="form-control" rows="4"><?= esc($product['specification']) ?></textarea>
                        </div>

                        <div class="mb-4 p-3 bg-light rounded border">
                            <label class="form-label fw-bold">Tambah Foto Baru (Opsional)</label>
                            <input type="file" name="images[]" class="form-control" multiple accept="image/png, image/jpeg, image/jpg">
                            <small class="text-muted d-block mt-1">Biarkan kosong jika tidak ingin menambah foto baru.</small>
                        </div>

                        <div class="mb-4">
    <label class="form-label fw-bold">Foto Sampul (Katalog)</label>
    <input type="file" name="main_image" class="form-control" accept="image/*">

    <?php if(!empty($product['main_image']) && $product['main_image'] != 'default.jpg'): ?>
        <div class="mt-2">
            <small class="text-muted d-block mb-1">Foto saat ini:</small>
            <img src="<?= base_url('uploads/products/' . $product['main_image']) ?>" alt="Cover" class="img-thumbnail" style="max-height: 150px;">
        </div>
    <?php endif; ?>
</div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary px-4 fw-bold">
                                <i class="fas fa-save me-1"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header bg-white py-3">
                    <h5 class="card-title mb-0 fw-bold">Foto Tersimpan</h5>
                </div>
                <div class="card-body p-3">
                    <?php if(empty($images)): ?>
                        <div class="text-center text-muted p-4 border rounded bg-light">
                            Belum ada foto.
                        </div>
                    <?php else: ?>
                        <div class="row g-2">
                            <?php foreach($images as $img): ?>
                                <div class="col-6">
                                    <div class="position-relative border rounded overflow-hidden shadow-sm group-hover-show">
                                        <img src="<?= base_url('uploads/products/' . $img['image']) ?>" alt="Foto" class="img-fluid w-100 object-fit-cover" style="height: 120px;">
                                        
                                        <a href="<?= base_url('admin/products/delete-image/' . $img['id']) ?>" 
   class="btn btn-danger btn-sm position-absolute top-0 end-0 m-2" 
   onclick="return confirm('Hapus foto ini?')">
   <i class="fas fa-trash"></i>
</a>
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