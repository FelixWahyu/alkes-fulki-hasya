<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-md-6">
            <h2 class="fw-bold">Katalog Produk</h2>
            <p class="text-muted">Kelola alat kesehatan yang ditampilkan di website.</p>
        </div>
        <div class="col-md-6 text-md-end">
            <a href="<?= base_url('admin/products/new') ?>" class="btn btn-primary shadow-sm">
                <i class="fas fa-plus me-1"></i> Tambah Produk
            </a>
        </div>
    </div>

    <?php if(session()->getFlashdata('success')): ?>
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
                            <th class="py-3">Nama Produk</th>
                            <th class="py-3">Kategori</th>
                            <th class="py-3">Tanggal Ditambahkan</th>
                            <th width="15%" class="text-center py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(empty($products)): ?>
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">Belum ada produk di katalog.</td>
                            </tr>
                        <?php else: ?>
                            <?php $no = 1; foreach($products as $row): ?>
                            <tr>
                                <td class="text-center fw-bold text-muted"><?= $no++ ?></td>
                                <td class="fw-semibold text-dark"><?= esc($row['name']) ?></td>
                                <td><span class="badge bg-info text-dark"><?= esc($row['category_name']) ?></span></td>
                                <td><?= date('d M Y', strtotime($row['created_at'])) ?></td>
                                <td class="text-center">
    <div class="btn-group" role="group">
    <a href="<?= base_url('admin/products/' . $row['id']) ?>" class="btn btn-sm btn-outline-info" title="Lihat Detail">
    <i class="fas fa-eye"></i> Detail
</a>

        <a href="<?= base_url('admin/products/' . $row['id'] . '/edit') ?>" class="btn btn-sm btn-outline-primary" title="Edit Data">
            <i class="fas fa-edit"></i> Edit
        </a>

        <form action="<?= base_url('admin/products/' . $row['id']) ?>" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus produk ini beserta foto-fotonya?');">
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus Produk">
                <i class="fas fa-trash"></i> Hapus
            </button>
        </form>
    </div>
</td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>