<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<div class="row align-items-center mb-4">
    <div class="col-sm-6">
        <h3 class="fw-bold mb-1">Manajemen Kategori</h3>
        <p class="text-muted small mb-0">Kelola kategori produk untuk memudahkan filtrasi di website.</p>
    </div>
    <div class="col-sm-6 text-sm-end mt-3 mt-sm-0">
        <button type="button" class="btn btn-primary px-4 shadow-sm" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
            <i class="fas fa-plus me-2"></i> Tambah Kategori
        </button>
    </div>
</div>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success border-0 shadow-sm alert-dismissible fade show mb-4" role="alert">
        <div class="d-flex align-items-center">
            <i class="fas fa-check-circle me-3 fa-lg"></i>
            <div>
                <strong>Berhasil!</strong> <?= session()->getFlashdata('success') ?>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<div class="card overflow-hidden">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th width="5%" class="text-center ps-4">#</th>
                        <th>Nama Kategori</th>
                        <th>Slug / URL</th>
                        <th width="20%" class="text-end pe-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($categories)): ?>
                        <tr>
                            <td colspan="4" class="text-center py-5 text-muted">Belum ada data kategori.</td>
                        </tr>
                    <?php else: ?>
                        <?php $no = 1; foreach ($categories as $row): ?>
                            <tr>
                                <td class="text-center ps-4 fw-medium text-muted"><?= $no++ ?></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="stat-icon bg-light text-primary me-3" style="width: 35px; height: 35px;">
                                            <i class="fas fa-tag small"></i>
                                        </div>
                                        <span class="fw-bold text-dark"><?= esc($row['name']) ?></span>
                                    </div>
                                </td>
                                <td>
                                    <code class="bg-light px-2 py-1 rounded small text-primary"><?= esc($row['slug']) ?></code>
                                </td>
                                <td class="text-end pe-4">
                                    <button class="btn btn-light btn-sm rounded-pill px-3 me-1" data-bs-toggle="modal" data-bs-target="#editCategoryModal<?= $row['id'] ?>">
                                        <i class="fas fa-edit me-1 text-primary"></i> Edit
                                    </button>
                                    <button class="btn btn-light btn-sm rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#deleteCategoryModal<?= $row['id'] ?>">
                                        <i class="fas fa-trash-alt me-1 text-danger"></i> Hapus
                                    </button>
                                </td>
                            </tr>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="editCategoryModal<?= $row['id'] ?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content border-0 shadow">
                                        <form action="<?= base_url('admin/categories/' . $row['id']) ?>" method="POST">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="_method" value="PUT">
                                            <div class="modal-header border-0 pb-0">
                                                <h5 class="fw-bold">Edit Kategori</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body py-4">
                                                <div class="mb-0">
                                                    <label class="form-label small fw-bold text-muted text-uppercase" style="letter-spacing: 0.05em;">Nama Kategori</label>
                                                    <input type="text" name="name" class="form-control form-control-lg border-light bg-light focus-ring" value="<?= esc($row['name']) ?>" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer border-0 pt-0">
                                                <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary rounded-pill px-4">Simpan Perubahan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteCategoryModal<?= $row['id'] ?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content border-0 shadow">
                                        <form action="<?= base_url('admin/categories/' . $row['id']) ?>" method="POST">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <div class="modal-body text-center py-5">
                                                <div class="bg-danger bg-opacity-10 text-danger rounded-circle d-flex align-items-center justify-content-center mx-auto mb-4" style="width: 80px; height: 80px;">
                                                    <i class="fas fa-exclamation-triangle fa-2x"></i>
                                                </div>
                                                <h4 class="fw-bold mb-2">Hapus Kategori?</h4>
                                                <p class="text-muted mb-0">Kategori <span class="text-dark fw-bold">"<?= esc($row['name']) ?>"</span> akan dihapus permanen. Produk di dalamnya mungkin perlu diperbarui.</p>
                                            </div>
                                            <div class="modal-footer border-0 justify-content-center pt-0 pb-4">
                                                <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-danger rounded-pill px-4">Ya, Hapus Data</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <form action="<?= base_url('admin/categories') ?>" method="POST">
                <?= csrf_field() ?>
                <div class="modal-header border-0 pb-0">
                    <h5 class="fw-bold">Tambah Kategori Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-4">
                    <div class="mb-0">
                        <label class="form-label small fw-bold text-muted text-uppercase" style="letter-spacing: 0.05em;">Nama Kategori</label>
                        <input type="text" name="name" class="form-control form-control-lg border-light bg-light focus-ring" placeholder="Contoh: Alat Terapi Medis" required>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-4">Simpan Kategori</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>