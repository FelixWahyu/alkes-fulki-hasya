<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header bg-white py-3">
                    <h5 class="fw-bold mb-0">Ubah Password Keamanan</h5>
                </div>
                <div class="card-body p-4">
                    
                    <?php if(session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger small"><?= session()->getFlashdata('error') ?></div>
                    <?php endif; ?>

                    <form action="<?= base_url('admin/update-password') ?>" method="POST">
                        <?= csrf_field() ?>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold small text-muted text-uppercase">Password Saat Ini</label>
                            <input type="password" name="current_password" class="form-control" placeholder="Masukkan password lama" required>
                        </div>

                        <hr class="my-4 opacity-25">

                        <div class="mb-3">
                            <label class="form-label fw-bold small text-muted text-uppercase">Password Baru</label>
                            <input type="password" name="new_password" class="form-control" placeholder="Minimal 8 karakter" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold small text-muted text-uppercase">Konfirmasi Password Baru</label>
                            <input type="password" name="confirm_password" class="form-control" placeholder="Ulangi password baru" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary py-2 fw-bold">Update Password Sekarang</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>