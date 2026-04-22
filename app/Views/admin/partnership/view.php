<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<div class="mb-4">
    <a href="<?= base_url('admin/partnerships') ?>" class="btn btn-light btn-sm px-3 rounded-pill">
        <i class="fas fa-arrow-left me-1"></i> Kembali ke Daftar
    </a>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm rounded-4 mb-4 overflow-hidden">
            <div class="card-header bg-primary text-white p-4">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-white bg-opacity-20 p-3 rounded-3">
                        <i class="fas fa-building fs-4"></i>
                    </div>
                    <div>
                        <h4 class="fw-bold mb-0"><?= esc($partnership['company_name']) ?></h4>
                        <p class="mb-0 opacity-75 small">Dikirim pada <?= date('d M Y, H:i', strtotime($partnership['created_at'])) ?> WIB</p>
                    </div>
                </div>
            </div>
            <div class="card-body p-4">
                <h6 class="fw-bold text-muted text-uppercase small mb-3" style="letter-spacing: 0.1em;">Pesan Kerjasama:</h6>
                <div class="bg-light p-4 rounded-3 mb-0" style="white-space: pre-line; line-height: 1.8; color: #334155;">
                    <?= esc($partnership['message']) ?>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm rounded-4 mb-4">
            <div class="card-body p-4">
                <h6 class="fw-bold text-muted text-uppercase small mb-4" style="letter-spacing: 0.1em;">Informasi Kontak</h6>
                
                <div class="d-flex align-items-center gap-3 mb-4">
                    <div class="bg-light p-3 rounded-circle text-primary">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div>
                        <small class="text-muted d-block">Alamat Email</small>
                        <a href="mailto:<?= esc($partnership['email']) ?>" class="fw-bold text-dark text-decoration-none"><?= esc($partnership['email']) ?></a>
                    </div>
                </div>
                
                <div class="d-flex align-items-center gap-3 mb-4">
                    <div class="bg-light p-3 rounded-circle text-success">
                        <i class="fab fa-whatsapp"></i>
                    </div>
                    <div>
                        <small class="text-muted d-block">Nomor Telepon / WA</small>
                        <a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $partnership['phone']) ?>" target="_blank" class="fw-bold text-dark text-decoration-none"><?= esc($partnership['phone']) ?></a>
                    </div>
                </div>

                <hr class="my-4 opacity-10">

                <div class="d-grid gap-2">
                    <a href="mailto:<?= esc($partnership['email']) ?>" class="btn btn-primary py-2 fw-bold rounded-3">
                        <i class="fas fa-reply me-2"></i> Balas via Email
                    </a>
                    <a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $partnership['phone']) ?>" target="_blank" class="btn btn-success py-2 fw-bold rounded-3">
                        <i class="fab fa-whatsapp me-2"></i> Hubungi via WA
                    </a>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm rounded-4 bg-light">
            <div class="card-body p-4">
                <h6 class="fw-bold text-muted text-uppercase small mb-3" style="letter-spacing: 0.1em;">Tindakan Cepat</h6>
                <form action="<?= base_url('admin/partnerships/delete/' . $partnership['id']) ?>" method="POST" class="delete-form">
                    <?= csrf_field() ?>
                    <button type="button" class="btn btn-outline-danger w-100 py-2 btn-delete-view">
                        <i class="fas fa-trash-alt me-2"></i> Hapus Pengajuan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Delete Confirmation
    document.querySelector('.btn-delete-view').addEventListener('click', function(e) {
        const form = this.closest('.delete-form');
        
        Swal.fire({
            title: 'Hapus Pengajuan?',
            text: "Data ini akan dihapus secara permanen.",
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
</script>

<?= $this->endSection() ?>
