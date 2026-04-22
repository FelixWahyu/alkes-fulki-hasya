<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<div class="row align-items-center mb-4">
    <div class="col-sm-6">
        <h3 class="fw-bold mb-1">Pengajuan Mitra</h3>
        <p class="text-muted small mb-0">Daftar perusahaan/mitra yang tertarik menjalin kerjasama.</p>
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

<div class="card overflow-hidden border-0 shadow-sm rounded-3">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th width="5%" class="text-center ps-4 py-3">#</th>
                        <th class="py-3">Nama Perusahaan</th>
                        <th class="py-3">Kontak</th>
                        <th class="py-3">Status</th>
                        <th class="py-3">Tanggal Masuk</th>
                        <th width="15%" class="text-end pe-4 py-3">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($partnerships)): ?>
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <div class="text-muted mb-3">
                                    <i class="fas fa-handshake fa-3x opacity-20"></i>
                                </div>
                                <p class="text-muted">Belum ada pengajuan kerjasama yang masuk.</p>
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php $no = 1; foreach($partnerships as $row): ?>
                        <tr class="<?= $row['status'] === 'new' ? 'bg-primary bg-opacity-10' : '' ?>">
                            <td class="text-center ps-4 fw-medium text-muted"><?= $no++ ?></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-white rounded-circle p-2 me-3 shadow-sm d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                        <i class="fas fa-building text-primary small"></i>
                                    </div>
                                    <div>
                                        <span class="fw-bold text-dark d-block"><?= esc($row['company_name']) ?></span>
                                        <small class="text-muted"><?= esc($row['email']) ?></small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="small">
                                    <span class="text-dark d-block fw-medium"><i class="fab fa-whatsapp me-1 text-success"></i> <?= esc($row['phone']) ?></span>
                                </div>
                            </td>
                            <td>
                                <?php if($row['status'] === 'new'): ?>
                                    <span class="badge bg-primary px-3 py-2 rounded-pill">Baru</span>
                                <?php elseif($row['status'] === 'read'): ?>
                                    <span class="badge bg-light text-dark border px-3 py-2 rounded-pill">Dibaca</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary px-3 py-2 rounded-pill">Arsip</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="small">
                                    <span class="text-dark d-block"><?= date('d M Y', strtotime($row['created_at'])) ?></span>
                                    <span class="text-muted small"><?= date('H:i', strtotime($row['created_at'])) ?> WIB</span>
                                </div>
                            </td>
                            <td class="text-end pe-4">
                                <a href="<?= base_url('admin/partnerships/' . $row['id']) ?>" class="btn btn-light btn-sm rounded-circle p-2 me-1" title="Lihat Detail" style="width: 35px; height: 35px;">
                                    <i class="fas fa-eye text-primary"></i>
                                </a>
                                <form action="<?= base_url('admin/partnerships/delete/' . $row['id']) ?>" method="POST" class="d-inline delete-form">
                                    <?= csrf_field() ?>
                                    <button type="button" class="btn btn-light btn-sm rounded-circle p-2 btn-delete-mitra" title="Hapus" style="width: 35px; height: 35px;">
                                        <i class="fas fa-trash-alt text-danger"></i>
                                    </button>
                                </form>
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
    // Delete Confirmation
    document.querySelectorAll('.btn-delete-mitra').forEach(btn => {
        btn.addEventListener('click', function(e) {
            const form = this.closest('.delete-form');
            const companyName = form.closest('tr').querySelector('.fw-bold.text-dark').textContent;
            
            Swal.fire({
                title: 'Hapus Pengajuan?',
                text: `Anda akan menghapus pengajuan dari "${companyName}".`,
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
