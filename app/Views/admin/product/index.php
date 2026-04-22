<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<div class="row align-items-center mb-4">
    <div class="col-sm-6">
        <h3 class="fw-bold mb-1">Katalog Produk</h3>
        <p class="text-muted small mb-0">Kelola daftar alat kesehatan yang ditampilkan di website.</p>
    </div>
    <div class="col-sm-6 text-sm-end mt-3 mt-sm-0">
        <a href="<?= base_url('admin/products/new') ?>" class="btn btn-primary px-4 shadow-sm">
            <i class="fas fa-plus me-2"></i> Tambah Produk Baru
        </a>
    </div>
</div>

<?php if(session()->getFlashdata('success')): ?>
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
                        <th>Informasi Produk</th>
                        <th>Kategori</th>
                        <th>Tanggal Rilis</th>
                        <th width="20%" class="text-end pe-4">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($products)): ?>
                        <tr>
                            <td colspan="5" class="text-center py-5">
                                <div class="text-muted mb-3">
                                    <i class="fas fa-box-open fa-3x opacity-20"></i>
                                </div>
                                <p class="text-muted">Gudang masih kosong. Silakan tambahkan produk baru.</p>
                                <a href="<?= base_url('admin/products/new') ?>" class="btn btn-sm btn-primary px-3 rounded-pill">
                                    Mulai Menambah
                                </a>
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php $no = 1; foreach($products as $row): ?>
                        <tr>
                            <td class="text-center ps-4 fw-medium text-muted"><?= $no++ ?></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-light rounded me-3 overflow-hidden d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                                        <?php 
                                            $img = !empty($row['main_image']) ? $row['main_image'] : 'default.jpg';
                                        ?>
                                        <img src="<?= base_url('uploads/products/' . $img) ?>" 
                                             alt="Product" 
                                             class="w-100 h-100" 
                                             style="object-fit: cover;"
                                             onerror="this.src='<?= base_url('uploads/products/default.jpg') ?>'">
                                    </div>
                                    <div>
                                        <span class="fw-bold text-dark d-block"><?= esc($row['name']) ?></span>
                                        <small class="text-muted">ID: #<?= $row['id'] ?></small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-light text-primary border border-primary-subtle px-3 py-2 rounded-pill">
                                    <i class="fas fa-tag me-1 small"></i> <?= esc($row['category_name']) ?>
                                </span>
                            </td>
                            <td>
                                <div class="small">
                                    <span class="text-dark d-block"><?= date('d F Y', strtotime($row['created_at'])) ?></span>
                                    <span class="text-muted small">Update: <?= date('H:i', strtotime($row['updated_at'] ?? $row['created_at'])) ?></span>
                                </div>
                            </td>
                            <td class="text-end pe-4">
                                <div class="dropdown">
                                    <button class="btn btn-light btn-sm rounded-circle p-2" type="button" data-bs-toggle="dropdown" style="width: 35px; height: 35px;">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 rounded-3">
                                        <li>
                                            <a class="dropdown-item py-2" href="<?= base_url('admin/products/' . $row['id']) ?>">
                                                <i class="fas fa-eye me-2 text-info"></i> Lihat Detail
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item py-2" href="<?= base_url('admin/products/' . $row['id'] . '/edit') ?>">
                                                <i class="fas fa-pencil-alt me-2 text-primary"></i> Edit Data
                                            </a>
                                        </li>
                                        <li><hr class="dropdown-divider opacity-10"></li>
                                        <li>
                                            <form action="<?= base_url('admin/products/' . $row['id']) ?>" method="POST" class="d-inline delete-form">
                                                <?= csrf_field() ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="button" class="dropdown-item py-2 text-danger btn-delete">
                                                    <i class="fas fa-trash-alt me-2"></i> Hapus Produk
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Product Delete Confirmation
    document.querySelectorAll('.btn-delete').forEach(btn => {
        btn.addEventListener('click', function(e) {
            const form = this.closest('.delete-form');
            const productName = form.closest('tr').querySelector('.fw-bold.text-dark').textContent;
            
            Swal.fire({
                title: 'Hapus Produk?',
                text: `Anda akan menghapus "${productName}". Tindakan ini tidak dapat dibatalkan!`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
});
</script>

<?= $this->endSection() ?>