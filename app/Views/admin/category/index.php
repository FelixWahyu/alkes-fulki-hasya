<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-md-6">
            <h2 class="fw-bold">Kelola Kategori</h2>
            <p class="text-muted">Manajemen kategori alat kesehatan untuk katalog website.</p>
        </div>
        <div class="col-md-6 text-md-end">
            <button type="button" class="btn btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                <i class="fas fa-plus me-1"></i> Tambah Kategori
            </button>
        </div>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil!</strong> <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="card border-0 shadow-sm rounded-3">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th width="5%" class="text-center py-3">No</th>
                            <th class="py-3">Nama Kategori</th>
                            <th class="py-3">Slug</th>
                            <th width="20%" class="text-center py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($categories)): ?>
                            <tr>
                                <td colspan="3" class="text-center py-4 text-muted">Belum ada data kategori.</td>
                            </tr>
                        <?php else: ?>
                            <?php $no = 1;
                            foreach ($categories as $row): ?>
                                <tr>
                                    <td class="text-center fw-bold text-muted"><?= $no++ ?></td>
                                    <td class="fw-semibold text-dark"><?= esc($row['name']) ?></td>
                                    <td class="fw-semibold text-dark"><?= esc($row['slug']) ?></td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-outline-primary me-1" data-bs-toggle="modal" data-bs-target="#editCategoryModal<?= $row['id'] ?>">
                                            Edit
                                        </button>

                                        <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteCategoryModal<?= $row['id'] ?>">
                                            Hapus
                                        </button>
                                    </td>
                                </tr>

                                <div class="modal fade" id="editCategoryModal<?= $row['id'] ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="<?= base_url('admin/categories/' . $row['id']) ?>" method="POST">
                                                <?= csrf_field() ?>
                                                <input type="hidden" name="_method" value="PUT">

                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Kategori</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label class="form-label">Nama Kategori</label>
                                                        <input type="text" name="name" class="form-control" value="<?= esc($row['name']) ?>" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="deleteCategoryModal<?= $row['id'] ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="<?= base_url('admin/categories/' . $row['id']) ?>" method="POST">
                                                <?= csrf_field() ?>
                                                <input type="hidden" name="_method" value="DELETE">

                                                <div class="modal-header text-bg-danger">
                                                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-center py-4">
                                                    <i class="fas fa-exclamation-triangle fa-3x text-warning mb-3"></i>
                                                    <h5 class="mb-1">Apakah Anda yakin?</h5>
                                                    <p class="text-muted mb-0">Kategori <strong>"<?= esc($row['name']) ?>"</strong> akan dihapus permanen.</p>
                                                </div>
                                                <div class="modal-footer justify-content-center">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-danger px-4">Ya, Hapus</button>
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
</div>

<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url('admin/categories') ?>" method="POST">
                <?= csrf_field() ?>
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Kategori Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label text-dark fw-semibold">Nama Kategori</label>
                        <input type="text" name="name" class="form-control" placeholder="Contoh: Alat Terapi Medis" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Kategori</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>